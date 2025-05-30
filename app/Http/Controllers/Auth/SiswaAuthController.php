<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Siswa;
use App\Models\Peminjaman;
use App\Models\Perangkatlab1;
use App\Models\Perangkatlab2;
use App\Models\Perangkatserver;
use App\Models\PerangkatRusak;


class SiswaAuthController extends Controller
{


    // Tampilkan form login
    public function showLoginForm()
    {
        return view('auth.loginsiswa');
    }

    // Proses login
    public function login(Request $request)
    {
        \Log::info('Proses login dimulai');
    
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Using the custom 'siswa' guard
        if (Auth::guard('siswa')->attempt($credentials)) {
            \Log::info('Login berhasil untuk email:', ['email' => $request->email]);
            $request->session()->regenerate();
            return redirect('/dashboard-siswa');
        }
        
    
        \Log::warning('Login gagal untuk email:', ['email' => $request->email]);
    
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }
    
    

    // Tampilkan form registrasi
    public function showRegisterForm()
    {
        return view('auth.registersiswa');
    }

    // Proses registrasi
    public function register(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:siswa,email',
                'nis' => 'required|unique:siswa,nis',
                'kelas' => 'required|string|max:100',
                    'alamat' => 'required|string|max:255',
                    'kartu_pelajar' => 'required|image|mimes:jpg,jpeg,png|max:2048',    
                'password' => 'required|min:8|confirmed',
            ]);
        
        // Upload kartu pelajar
        if ($request->hasFile('kartu_pelajar')) {
            $kartuPelajarPath = $request->file('kartu_pelajar')->store('kartu_pelajar', 'public');
        } else {
            $kartuPelajarPath = null;
        }
            \Log::info('Validated Data:', $validated);
        
            $user = \App\Models\Siswa::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'nis' => $validated['nis'],
                'kelas' => $validated['kelas'],
                'alamat' => $validated['alamat'],
                'kartu_pelajar' => $kartuPelajarPath,
                'password' => bcrypt($validated['password']),
            ]);
        
            \Log::info('User Created:', $user->toArray());
            \Log::info('Redirecting with success message.');
            
            
            return redirect()->route('login-siswa')->with('success', 'Registrasi berhasil! Silakan login.');
        } catch (\Exception $e) {
            \Log::error('Registration Error:', ['message' => $e->getMessage()]);
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    

    
// public function register(Request $request)
// {
//     try {
//         $validated = $request->validate([
//             'name' => 'required|string|max:255',
//             'email' => 'required|email|unique:siswa,email',
//             'nis' => 'required|unique:siswa,nis',
//             'kelas' => 'required|string|max:100',
//             'alamat' => 'required|string|max:255',
//             'kartu_pelajar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
//             'password' => 'required|min:8|confirmed',
//         ]);

//         // Upload kartu pelajar
//         if ($request->hasFile('kartu_pelajar')) {
//             $kartuPelajarPath = $request->file('kartu_pelajar')->store('kartu_pelajar', 'public');
//         } else {
//             $kartuPelajarPath = null;
//         }

//         // Buat user siswa
//         $user = Siswa::create([
//             'name' => $validated['name'],
//             'email' => $validated['email'],
//             'nis' => $validated['nis'],
//             'kelas' => $validated['kelas'],
//             'alamat' => $validated['alamat'],
//             'kartu_pelajar' => $kartuPelajarPath,
//             'password' => bcrypt($validated['password']),
//         ]);

//         \Log::info('User Created:', $user->toArray());
//         return redirect()->route('login-siswa')->with('success', 'Registrasi berhasil! Silakan login.');
//     } catch (\Exception $e) {
//         \Log::error('Registration Error:', ['message' => $e->getMessage()]);
//         return back()->withErrors(['error' => $e->getMessage()]);
//     }
// }
    


    // Tampilkan dashboard siswa
    public function dashboard()
    {
        return view('siswa.utama.home');
    }

    public function profile()
    {
        // Ambil data siswa yang sedang login
        $siswa = Auth::user(); // Karena Siswa menggunakan Authenticatable
        
        return view('siswa.utama.profile', compact('siswa'));
    }

    public function perangkat()
    {
        $perangkat = Perangkatserver::all(); // Fetch all data from the table
        $perangkat1 = Perangkatlab1::all();
        $perangkat2 = Perangkatlab2::all();
        return view('siswa.utama.perangkat', compact('perangkat','perangkat1', 'perangkat2'));
    }

    public function info($id)
    {
        $perangkat = Perangkatserver::find($id); // Atau model lain sesuai kebutuhan
        if (!$perangkat) {
            abort(404, 'Perangkat tidak ditemukan');
        }
        return view('siswa.utama.info', compact('perangkat'));
    }
    
    public function infoperangkatlab1($id)
    {
        $perangkat = Perangkatlab1::find($id); // Atau model lain sesuai kebutuhan
        if (!$perangkat) {
            abort(404, 'Perangkat tidak ditemukan');
        }
        return view('siswa.utama.info1', compact('perangkat'));
    }

    public function infoperangkatlab2($id)
    {
        $perangkat = Perangkatlab2::find($id); // Atau model lain sesuai kebutuhan
        if (!$perangkat) {
            abort(404, 'Perangkat tidak ditemukan');
        }
        return view('siswa.utama.info2', compact('perangkat'));
    }
    

    public function pinjam($id)
    {
        $perangkat = Perangkatserver::find($id);

        if (!$perangkat) {
            return redirect()->route('perangkat')->with('error', 'Perangkat not found');
        }

        // Logic to borrow the device (e.g., create a record in the borrow table)

        return redirect()->route('perangkat')->with('success', 'Perangkat successfully borrowed');
    }

    public function index()
    {
        $perangkatRusak = PerangkatRusak::all(); // Ambil semua data dari tabel PerangkatRusak
        return view('siswa.p_rusak.index', compact('perangkatRusak'));
    }
    
    public function create()
    {
        return view('siswa.p_rusak.create');
    }

   public function store(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'perangkat' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'tanggal_ajukan' => 'required|date',
        'bukti_kerusakan' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
    ]);

    $buktiKerusakan = null;
    if ($request->hasFile('bukti_kerusakan')) {
        $buktiKerusakan = $request->file('bukti_kerusakan')->store('bukti_kerusakan', 'public');
    }

    PerangkatRusak::create([
        'nama' => $request->nama,
        'perangkat' => $request->perangkat,
        'deskripsi' => $request->deskripsi,
        'tanggal_ajukan' => $request->tanggal_ajukan,
        'status' => 'DI PERIKSA', // Sesuai default di database
        'bukti_kerusakan' => $buktiKerusakan
    ]);
    

    return redirect()->route('ajukan-kerusakan.index')->with('success', 'Pengajuan kerusakan berhasil dikirim.');
}



    public function logout(Request $request)
    {
        Auth::guard('siswa')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login-siswa');
    }

}
