<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Siswa;
use App\Models\Perangkatserver;
use App\Models\Perangkatlab2;
use App\Models\Perangkatlab1;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SiswaExport;
use App\Exports\PeminjamanExport;
use Illuminate\Support\Facades\Storage;

use App\Models\Pengembalian;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Peminjaman;
use App\Exports\PerangkatExport;
use App\Models\PerangkatRusak;
use App\Exports\PengembalianExport;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin; // Pastikan ini ada di bagian atas file AdminController.php


class AdminController extends Controller
{
    // Menampilkan form login admin
    public function showLoginForm()
    {
        return view('auth.loginadmin');
    }

    // Proses login admin
    

    // Proses login admin
    public function login(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
    
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'token'    => 'required',
        ]);
    
        // Debug data input
        \Log::info('Login attempt:', $request->only('username', 'token'));
    
        // Validasi token admin
        $admin = Admin::where('username', $request->username)->first();
        if (!$admin || $admin->token !== $request->token) {
            return back()->withErrors(['token' => 'Token salah atau tidak valid.']);
        }
    
        // Debug password verification
        if (!Hash::check($request->password, $admin->password)) {
            \Log::error('Password mismatch for username: ' . $request->username);
            return back()->withErrors(['username' => 'Username atau password salah.']);
        }
    
        // Proses login
        if (Auth::guard('admin')->attempt([
            'username' => $request->username,
            'password' => $request->password,
        ])) {
            \Log::info('Login successful for username: ' . $request->username);
            return redirect()->route('admin.dashboard');
        }
    
        return back()->withErrors(['username' => 'Username atau password salah.']);
    }
    
    
    
    public function dashboard()
    {
        $pengembalian = Pengembalian::all();
        $peminjamans = Peminjaman::all();
        $totalPeminjaman = $peminjamans->count();
        $totalPengembalian = $pengembalian->count();
          // Hitung jumlah perangkat yang dipinjam
        $totalPerangkatDipinjam = $peminjamans->sum('jumlah_perangkat');

        // Hitung jumlah perangkat yang dikembalikan
        $totalPerangkatDikembalikan = $pengembalian->sum('jumlah_perangkat');
        
        // Hitung total perangkat dari tiga tabel
        $totalPerangkat = Perangkatserver::count() + Perangkatlab2::count() + Perangkatlab1::count();
    
        return view('admin.dashboard', compact(
            'peminjamans',
            'pengembalian',
            'totalPeminjaman',
            'totalPengembalian',
            'totalPerangkat',
            'totalPerangkatDipinjam',
            'totalPerangkatDikembalikan'
        ));
    }
    

    public function peminjaman()
    {
       
        $peminjamans = Peminjaman::all();
        return view('admin.peminjaman.home', compact('peminjamans'));
    }

    public function edit($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        return view('admin.peminjaman.edit', compact('peminjaman'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'persetujuan' => 'required|in:Pending,Disetujui,Ditolak'
        ]);

        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->persetujuan = $request->persetujuan;
        $peminjaman->save();

        return redirect()->route('admin.peminjaman.index')->with('success', 'Status peminjaman berhasil diperbarui!');
    }

    public function destroypeminjaman($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();

        return redirect()->route('admin.peminjaman.index')->with('success', 'Data peminjaman berhasil dihapus!');
    }


    public function pengembalian()
    {
        $pengembalian = Pengembalian::all();
    
        // Kirim data ke view
        return view('admin.pengembalian.home', compact('pengembalian'));
    }

    public function editpengembalian($id)
    {
        $pengembalian = Pengembalian::findOrFail($id);
        return view('admin.pengembalian.edit', compact('pengembalian'));
    }

    public function updatepengembalian(Request $request, $id)
    {
        $request->validate([
            'nama_perangkat' => 'required|string',
            'jumlah_perangkat' => 'required|integer',
            'status_pengembalian' => 'required|in:belum_dikembalikan,sudah_dikembalikan',
        ]);

        $pengembalian = Pengembalian::findOrFail($id);
        $pengembalian->update([
            'nama_perangkat' => $request->nama_perangkat,
            'jumlah_perangkat' => $request->jumlah_perangkat,
            'status_pengembalian' => $request->status_pengembalian,
        ]);

        return redirect()->route('admin.pengembalian.home')->with('success', 'Data pengembalian berhasil diperbarui!');
    }

    public function destroypengembalian($id)
    {
        $pengembalian = Pengembalian::findOrFail($id);
        $pengembalian->delete();

        return redirect()->route('admin.pengembalian.home')->with('success', 'Data pengembalian berhasil dihapus!');
    }

    public function indexSiswa()
    {
        $siswa = Siswa::all(); // Mengambil semua data siswa dari tabel siswa
        return view('admin.user.siswa', compact('siswa'));
    }
    public function datasiswa(Request $request)
    {
        // Ambil tanggal dari request
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
    
        // Query siswa berdasarkan tanggal
        $query = Siswa::query();
    
        if ($start_date && $end_date) {
            $query->whereBetween('created_at', [$start_date, $end_date]);
        }
    
        $siswa = $query->get();
    
        return view('admin.laporan.data-siswa', compact('siswa', 'start_date', 'end_date'));
    }


    public function datapeminjaman(Request $request)
    {
         
        // Ambil tanggal dari request
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
    
        // Query peminjaman  berdasarkan tanggal
        $query = Peminjaman::query();
    
        if ($start_date && $end_date) {
            $query->whereBetween('created_at', [$start_date, $end_date]);
        }
    
        $peminjamans = $query->get();
    
        return view('admin.laporan.data-peminjaman', compact('peminjamans', 'start_date', 'end_date'));
    }
    
    public function exportPdf()
    {
        $siswa = Siswa::all();
        $pdf = Pdf::loadView('admin.user.pdf', compact('siswa'));
        return $pdf->download('laporan-data-siswa_smkn_69_jkt.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new SiswaExport, 'laporan-data-siswa_smkn_69_jkt.xlsx');
    }

    public function exportPdf1()
    {
        $peminjamans = Peminjaman::all();
        $pdf = Pdf::loadView('admin.peminjaman.pdf', compact('peminjamans'));
        return $pdf->download('laporan-data-peminjaman_smkn_69_jkt.pdf');
    }

    public function exportExcel1()
    {
        return Excel::download(new PeminjamanExport, 'laporan-data-peminjaman_smkn_69_jkt.xlsx');
    }  

    public function datapengembalian(Request $request)
    {
       
               // Ambil tanggal dari request
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
    
        // Query pengembalian  berdasarkan tanggal
        $query = Pengembalian::query();
    
        if ($start_date && $end_date) {
            $query->whereBetween('created_at', [$start_date, $end_date]);
        }
    
        $pengembalian = $query->get();
    
        return view('admin.laporan.data-pengembalian', compact('pengembalian', 'start_date', 'end_date'));
    }

    public function exportPdf2()
    {
        $pengembalian = Pengembalian::all();
            $pdf = Pdf::loadView('admin.pengembalian.pdf', compact('pengembalian'));
        return $pdf->download('laporan-data-pengembalian_smkn_69_jkt.pdf');
    }

    public function exportExcel2()
    {
        return Excel::download(new PengembalianExport, 'laporan-data-pengembalian_smkn_69_jkt.xlsx');
    }  


    public function indexPerangkat()
    {
        
        $perangkatRusak = PerangkatRusak::all();
        return view('admin.p_rusak.home', compact('perangkatRusak'));
    
    }

    public function editperangkat(PerangkatRusak $perangkatRusak)
    {
        return view('admin.p_rusak.edit', compact('perangkatRusak'));
    }

    public function updateperangkat(Request $request, PerangkatRusak $perangkatRusak)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'perangkat' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'status' => 'required|in:DI PERIKSA,DI PERBAIKI,SELESAI DI PERBAIKI',
            'bukti_kerusakan' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('bukti_kerusakan')) {
            Storage::delete('public/' . $perangkatRusak->bukti_kerusakan);
            $buktiPath = $request->file('bukti_kerusakan')->store('bukti_kerusakan', 'public');
        } else {
            $buktiPath = $perangkatRusak->bukti_kerusakan;
        }

        $perangkatRusak->update([
            'nama' => $request->nama,
            'perangkat' => $request->perangkat,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
            'bukti_kerusakan' => $buktiPath,
        ]);

        return redirect()->route('admin.rusak')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroyperangkat(PerangkatRusak $perangkatRusak)
    {
        Storage::delete('public/' . $perangkatRusak->bukti_kerusakan);
        $perangkatRusak->delete();

        return redirect()->route('admin.rusak')->with('success', 'Data berhasil dihapus.');
    }




    public function dataperangkat(Request $request)
    {
        // Ambil tanggal dari request
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        // Query perangkat berdasarkan tanggal
        $queryServer = Perangkatserver::query();
        $queryLab1 = Perangkatlab1::query();
        $queryLab2 = Perangkatlab2::query();

        if ($start_date && $end_date) {
            $queryServer->whereBetween('created_at', [$start_date, $end_date]);
            $queryLab1->whereBetween('created_at', [$start_date, $end_date]);
            $queryLab2->whereBetween('created_at', [$start_date, $end_date]);
        }

        // Ambil data perangkat
        $perangkats_server = $queryServer->get();
        $perangkats_lab1 = $queryLab1->get();
        $perangkats_lab2 = $queryLab2->get();

        return view('admin.laporan.data-perangkat', compact('perangkats_server', 'perangkats_lab1', 'perangkats_lab2', 'start_date', 'end_date'));
    }



    public function exportPdf3(Request $request)
    {
        // Get data from request if any filters are applied
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $queryServer = Perangkatserver::query();
        $queryLab1 = Perangkatlab1::query();
        $queryLab2 = Perangkatlab2::query();

        if ($start_date && $end_date) {
            $queryServer->whereBetween('created_at', [$start_date, $end_date]);
            $queryLab1->whereBetween('created_at', [$start_date, $end_date]);
            $queryLab2->whereBetween('created_at', [$start_date, $end_date]);
        }

        // Get the data
        $perangkats_server = $queryServer->get();
        $perangkats_lab1 = $queryLab1->get();
        $perangkats_lab2 = $queryLab2->get();

        // Generate PDF
        $pdf = PDF::loadView('admin.laporan.data-perangkat-pdf', compact('perangkats_server', 'perangkats_lab1', 'perangkats_lab2'));
        return $pdf->download('data_perangkat_report.pdf');
    }

    public function exportExcel3(Request $request)
    {
        return Excel::download(new PerangkatExport, 'data_perangkat_report.xlsx');
    }

       // Menghapus data siswa
       public function destroy($id)
       {
           $siswa = Siswa::findOrFail($id); // Cari siswa berdasarkan ID
           $siswa->delete(); // Hapus data siswa
           return redirect()->route('admin.siswa.index')->with('success', 'Data siswa berhasil dihapus.');
       }


    // Logout admin
    public function logout(Request $request)
    {
        // Logout dari guard 'admin'
        Auth::guard('admin')->logout();
    
        // Invalidasi session
        $request->session()->invalidate();
    
        // Regenerasi token session
        $request->session()->regenerateToken();
    
        // Redirect ke halaman login siswa
        return redirect()->route('login-siswa');
    }
    
}
