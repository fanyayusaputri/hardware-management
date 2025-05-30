<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use App\Models\Peminjaman;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    
    public function index()
{
    // Ambil hanya data pengembalian milik user yang sedang login
    $pengembalian = Pengembalian::where('user_id', auth()->id())->get();

    // Kirim data ke view
    return view('siswa.pengembalian.index', compact('pengembalian'));
}

    // public function create()
    // {
    //     // Ambil data peminjaman berdasarkan user yang sedang login
    //     $peminjaman = Peminjaman::where('user_id', auth()->id())->get();
    
    //     return view('siswa.pengembalian.create', compact('peminjaman'));
    // }

   

public function create()
{
    // Ambil data user yang sedang login (diasumsikan siswa)
    $siswa = auth()->user(); // pastikan user siswa sudah login

    // Ambil data peminjaman berdasarkan user yang sedang login
    // tetapi hanya tampilkan perangkat yang belum dikembalikan
    $peminjaman = Peminjaman::where('user_id', auth()->id())
        ->whereDoesntHave('pengembalian', function ($query) {
            $query->where('status_pengembalian', 'sudah_dikembalikan');
        })
        ->get();

     $jumlahPerangkat = $peminjaman->sum('jumlah_perangkat');
    // return ke view jika diperlukan, contoh:
    return view('siswa.pengembalian.create', compact('siswa','jumlahPerangkat', 'peminjaman'));
}

public function store(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'peminjaman_id' => 'required|exists:peminjaman,id',
        'nama' => 'required|string|max:255',
        'kelas' => 'required|string|max:255',
        'jumlah_perangkat' => 'required|integer',
        'tanggal_pengembalian' => 'required|date',
        'status_pengembalian' => 'required|in:belum_dikembalikan,sudah_dikembalikan',
        'bukti_pengembalian' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'alasan_belum_dikembalikan' => 'nullable|string|max:1000'
    ]);

    // Pakai guard siswa
    $userId = auth()->guard('siswa')->id();

    // Cek peminjaman terkait user siswa yang login
    $peminjaman = Peminjaman::where('id', $validated['peminjaman_id'])
        ->where('user_id', $userId)
        ->first();

    if (!$peminjaman) {
        return redirect()->back()->withErrors(['peminjaman_id' => 'Peminjaman tidak valid atau tidak terkait dengan akun Anda.']);
    }

    // Simpan bukti pengembalian jika ada
    if ($request->hasFile('bukti_pengembalian')) {
        $validated['bukti_pengembalian'] = $request->file('bukti_pengembalian')->store('bukti_pengembalian', 'public');
    }

    // Status pengembalian dan alasan
    if ($validated['status_pengembalian'] === 'sudah_dikembalikan') {
        $validated['alasan_belum_dikembalikan'] = 'Sudah dikembalikan';
    } elseif ($validated['status_pengembalian'] === 'belum_dikembalikan' && empty($validated['alasan_belum_dikembalikan'])) {
        return redirect()->back()->withErrors(['alasan_belum_dikembalikan' => 'Alasan wajib diisi jika perangkat belum dikembalikan.']);
    }

    // Tambahkan user_id dari guard siswa
    $validated['user_id'] = $userId;

    // Simpan data pengembalian
    Pengembalian::create($validated);

    return redirect()->route('siswa.pengembalian.index')->with('success', 'Pengembalian berhasil ditambahkan.');
}

    
    
}
