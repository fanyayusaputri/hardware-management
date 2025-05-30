<?php

namespace App\Http\Controllers;
use App\Models\Perangkatserver;

use Illuminate\Http\Request;

class PerangkatController extends Controller
{
    // Menampilkan daftar perangkat
    public function index()
    {
        $perangkats = Perangkatserver::all(); // Mengambil semua perangkat
        return view('admin.rserver.home', compact('perangkats'));
    }

    // Menampilkan form untuk menambah perangkat baru
    public function create()
    {
        return view('admin.rserver.create');
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
        ]);

        // Menyimpan gambar jika ada
        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('images', 'public');
        }

        // Menyimpan perangkat baru ke dalam database
        Perangkatserver::create([
            'gambar' => $gambarPath,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'lokasi' => $request->lokasi,
            'stok' => $request->stok,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.rserver.index')->with('success', 'Perangkat berhasil ditambahkan.');
    }

    // Menampilkan detail perangkat
    public function show($id)
    {
        $perangkat = Perangkatserver::findOrFail($id);
        return view('admin.rserver.show', compact('perangkat'));
    }

    // Menampilkan form untuk mengedit perangkat
    public function edit($id)
    {
        $perangkat = Perangkatserver::findOrFail($id);
        return view('admin.rserver.edit', compact('perangkat'));
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
    
        $perangkat = Perangkatserver    ::findOrFail($id);
    
        // Menyimpan gambar jika ada
        $gambarPath = $perangkat->gambar;
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($gambarPath) {
                \Storage::delete('public/' . $gambarPath);
            }
            $gambarPath = $request->file('gambar')->store('images', 'public');
        }
    
        // Memperbarui perangkat
        $perangkat->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambarPath,
            'lokasi' => $request->lokasi,
            'stok' => $request->stok,
            'status' => $request->status,
        ]);
    
        return redirect()->route('admin.rserver.index')->with('success', 'Perangkat berhasil diperbarui.');
    }
    

    // Menghapus perangkat
    public function destroy($id)
    {
        $perangkat = Perangkatserver::findOrFail($id);
        
        // Hapus gambar perangkat jika ada
        if ($perangkat->gambar) {
            \Storage::delete('public/' . $perangkat->gambar);
        }

        $perangkat->delete();

        return redirect()->route('admin.rserver.index')->with('success', 'Perangkat berhasil dihapus.');
    }
}
