<?php

namespace App\Http\Controllers;
use App\Models\Perangkatlab2;
use Illuminate\Http\Request;

class PerangkatLab2Controller extends Controller
{
    // Menampilkan daftar perangkat
    public function index()
    {
        $perangkatlab2s  = Perangkatlab2::all(); // Mengambil semua perangkat
        return view('admin.lab_sija_2.home', compact('perangkatlab2s'));
    }

    // Menampilkan form untuk menambah perangkat baru
    public function create()
    {
        return view('admin.lab_sija_2.create');
    }

    // Menyimpan perangkat baru ke dalam database
    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'status' => 'required|in:aktif,nonaktif',
            'tipe' => 'required|string|max:255',
            'sn' => 'nullable|string|max:255',
            'merek' => 'required|string|max:255',
        ]);
    
        // Menyimpan gambar jika ada
        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('images', 'public');
        }
    
        // Menyimpan perangkat baru ke dalam database
        Perangkatlab2::create([
            'gambar' => $gambarPath,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'lokasi' => $request->lokasi,
            'stok' => $request->stok,
            'status' => $request->status,
            'tipe' => $request->tipe,
            'sn' => $request->sn,
            'merek' => $request->merek,
        ]);
    
        return redirect()->route('admin.lab_sija_2.index')->with('success', 'Perangkat berhasil ditambahkan.');
    }
    

    // Menampilkan detail perangkat
    public function show($id)
    {
        $perangkatlab2 = Perangkatlab2::findOrFail($id);
        return view('admin.lab_sija_2.show', compact('perangkatlab2'));
    }

    // Menampilkan form untuk mengedit perangkat
    public function edit($id)
    {
        $perangkatlab2 = Perangkatlab2::findOrFail($id);
        return view('admin.lab_sija_2.edit', compact('perangkatlab2'));
    }

    // Memperbarui perangkat yang sudah ada
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'lokasi' => 'required|string|max:255',
            'stok' => 'required|integer',
            'status' => 'required|in:aktif,nonaktif',
        ]);
    
        $perangkatlab2 = Perangkatlab2::findOrFail($id);
    
        // Menyimpan gambar jika ada
        $gambarPath = $perangkatlab2->gambar;
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($gambarPath) {
                \Storage::delete('public/' . $gambarPath);
            }
            $gambarPath = $request->file('gambar')->store('images', 'public');
        }
    
        // Memperbarui perangkat
        $perangkatlab2->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambarPath,
            'lokasi' => $request->lokasi,
            'stok' => $request->stok,
            'status' => $request->status,
        ]);
    
        return redirect()->route('admin.lab_sija_2.index')->with('success', 'Perangkat berhasil diperbarui.');
    }
    

    // Menghapus perangkat
    public function destroy($id)
    {
        $perangkatlab2 = Perangkatlab2::findOrFail($id);
        
        // Hapus gambar perangkat jika ada
        if ($perangkatlab2->gambar) {
            \Storage::delete('public/' . $perangkatlab2->gambar);
        }

        $perangkatlab2->delete();

        return redirect()->route('admin.lab_sija_2.index')->with('success', 'Perangkat berhasil dihapus.');
    }
}
