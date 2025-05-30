<?php

namespace App\Http\Controllers;
use App\Models\Peminjaman;
use App\Models\Perangkatserver;
use App\Models\Perangkatlab1;
use App\Models\Perangkatlab2;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Mail\PengingatPengembalianMail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Queue;
use App\Mail\PengingatPeminjamanMail;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    //
    public function index()
    {
        $peminjamans = Peminjaman::where('user_id', auth()->id())->get();
        return view('siswa.peminjaman.index', compact('peminjamans'));
    }
    

    
    public function show($id)
    {
        // Find the specific Peminjaman record
        $peminjaman = Peminjaman::findOrFail($id);
    
        // Return the view for showing the Peminjaman details
    return view('siswa.peminjaman.index', compact('peminjaman'));
    }
    
    

    public function create($id)
    {

        $peminjaman = Peminjaman::all();
        $siswa = auth()->user();
        // Return the form view
        return view('siswa.peminjaman.create', compact('peminjaman', 'siswa'));
    }
    

    // public function store(Request $request)
    // {
    //     // Validasi inputan form
    //     $validated = $request->validate([
    //         'nama' => 'required|string|max:255',
    //         'kelas' => 'required|string|max:50',
    //         'no_telepon' => 'required|string|max:15',
    //         'nama_perangkat' => 'required|string|max:255',
    //         'jumlah_perangkat' => 'required|integer',
    //         'tanggal_peminjaman' => 'required|date',
    //     ]);

    //     // Tambahkan status persetujuan default "pending"
    //     $validated['persetujuan'] = 'pending';

    //     // Tambahkan user_id dari pengguna yang sedang login
    //     $validated['user_id'] = auth()->id();

    //     // Konversi tanggal_peminjaman ke format yang sesuai untuk MySQL
    //     $validated['tanggal_peminjaman'] = Carbon::parse($validated['tanggal_peminjaman'])->format('Y-m-d H:i:s');

    //     // Simpan data peminjaman ke dalam database
    //     Peminjaman::create($validated);

    //     // Redirect dengan pesan sukses
    //     return redirect()->route('siswa.peminjaman.index')->with('success', 'Peminjaman berhasil dibuat');
    // }
     
    // public function store(Request $request)
    // {
    //     // Validasi inputan
    //     $validated = $request->validate([
    //         'nama' => 'required|string|max:255',
    //         'kelas' => 'required|string|max:50',
    //         'no_telepon' => 'required|string|max:15',
    //         'nama_perangkat' => 'required|string|max:255',
    //         'jumlah_perangkat' => 'required|integer|min:1',
    //         'tanggal_peminjaman' => 'required|date',
    //         'tanggal_tenggat' => 'required|date',
    //     ]);
    
    //     $jumlahDipinjam = $validated['jumlah_perangkat'];
    //     $namaPerangkat = $validated['nama_perangkat'];
    
    //     // Cari perangkat dari tiga tabel
    //     $perangkat = Perangkatserver::where('nama', $namaPerangkat)->first()
    //         ?? Perangkatlab1::where('nama', $namaPerangkat)->first()
    //         ?? Perangkatlab2::where('nama', $namaPerangkat)->first();
    
    //     // Jika perangkat ditemukan, kurangi stok
    //     if (!$perangkat) {
    //         return redirect()->back()->with('error', 'Perangkat tidak ditemukan!');
    //     }
    
    //     if ($perangkat->stok < $jumlahDipinjam) {
    //         return redirect()->back()->with('error', 'Stok perangkat tidak mencukupi!');
    //     }
    
    //     // Kurangi stok perangkat
    //     $perangkat->stok -= $jumlahDipinjam;
    //     $perangkat->save();
    
    //     // Simpan data peminjaman
    //     Peminjaman::create([
    //         'user_id' => auth()->id(),
    //         'nama' => $validated['nama'],
    //         'kelas' => $validated['kelas'],
    //         'no_telepon' => $validated['no_telepon'],
    //         'nama_perangkat' => $namaPerangkat,
    //         'jumlah_perangkat' => $jumlahDipinjam,
    //         'tanggal_peminjaman' => Carbon::parse($validated['tanggal_peminjaman'])->format('Y-m-d H:i:s'),
    //         'tanggal_pengembalian' => $request->tanggal_tenggat,
    //         'persetujuan' => 'pending',
    //     ]);
    
    //     return redirect()->route('siswa.peminjaman.index')->with('success', 'Peminjaman berhasil diajukan!');
    // }
    
    public function store(Request $request)
    {
        // Validasi inputan
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'email' => 'required|email', // tambahkan validasi email
            'no_telepon' => 'required|string|max:15',
            'nama_perangkat' => 'required|string|max:255',
            'jumlah_perangkat' => 'required|integer|min:1',
            'tanggal_peminjaman' => 'required|date',
            'tanggal_tenggat' => 'required|date',
        ]);
    
        $jumlahDipinjam = $validated['jumlah_perangkat'];
        $namaPerangkat = $validated['nama_perangkat'];
    
        // Cari perangkat dari tiga tabel
        $perangkat = Perangkatserver::where('nama', $namaPerangkat)->first()
            ?? Perangkatlab1::where('nama', $namaPerangkat)->first()
            ?? Perangkatlab2::where('nama', $namaPerangkat)->first();
    
        // Jika perangkat tidak ditemukan
        if (!$perangkat) {
            return redirect()->back()->with('error', 'Perangkat tidak ditemukan!');
        }
    
        // Jika stok tidak mencukupi
        if ($perangkat->stok < $jumlahDipinjam) {
            return redirect()->back()->with('error', 'Stok perangkat tidak mencukupi!');
        }
    
        // Kurangi stok perangkat
        $perangkat->stok -= $jumlahDipinjam;
        $perangkat->save();
    
        // Simpan data peminjaman
        $peminjaman = Peminjaman::create([
            'user_id' => auth()->id(),
            'nama' => $validated['nama'],
            'kelas' => $validated['kelas'],
            'email' => $validated['email'],
            'no_telepon' => $validated['no_telepon'],
            'nama_perangkat' => $namaPerangkat,
            'jumlah_perangkat' => $jumlahDipinjam,
            'tanggal_peminjaman' => Carbon::parse($validated['tanggal_peminjaman'])->format('Y-m-d H:i:s'),
            'tanggal_pengembalian' => $validated['tanggal_tenggat'],
            'persetujuan' => 'pending',
        ]);
    
        // Kirim email notifikasi
        Mail::to($validated['email'])->send(new PengingatPeminjamanMail($peminjaman));

        // Hitung delay (H-1 dari tanggal pengembalian)
        $pengembalianDate = Carbon::parse($peminjaman->tanggal_pengembalian)->startOfDay();
        $pengingatDate = $pengembalianDate->subDay();
        
        if (now()->lessThan($pengingatDate)) {
           // GANTI SAAT UJI COBA (untuk delay 1 menit)
Mail::to($validated['email'])
->later(now()->addMinutes(1), new PengingatPengembalianMail($peminjaman));

        }
        

    
        return redirect()->route('siswa.peminjaman.index')->with('success', 'Peminjaman berhasil diajukan! Silakan cek email Anda untuk detail peminjaman.');
    }
    
    
    

    public function getAllPerangkat()
    {
        $perangkatLab1 = Perangkatlab1::select('id', 'nama')->get();
        $perangkatLab2 = Perangkatlab2::select('id', 'nama')->get();
        $perangkatServer = Perangkatserver::select('id', 'nama')->get();

        // Gabungkan semua perangkat dari tiga tabel
        $perangkat = $perangkatLab1->merge($perangkatLab2)->merge($perangkatServer);

        return response()->json($perangkat);
    }

    

}
