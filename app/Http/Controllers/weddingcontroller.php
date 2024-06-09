<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\wedding;

class weddingcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $weddings = wedding::all();
        return view('admin.paket-wedding', compact('weddings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tambah-wedding');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'title_wedding' => 'required|string|max:255',
            'wedding_photo' => 'required|image|mimes:jpeg,png,jpg,JPG,JPEG,PNG|max:2048',
            'description_wedding' => 'required|string',
        ]);

        // Simpan gambar
        if ($request->hasFile('wedding_photo')) {
            $image = $request->file('wedding_photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/wedding_photos', $imageName);
        }

        // Simpan data ke database
        $wedding = new Wedding();
        $wedding->title_wedding = $request->input('title_wedding');
        $wedding->wedding_photo = 'wedding_photos/' . $imageName;
        $wedding->description_wedding = $request->input('description_wedding');
        $wedding->save();

        return redirect('/Paket-Wedding')->with('success', 'Paket Wedding berhasil ditambahkan!');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $wedding = wedding::find($id);
        return view('admin.edit-wedding', compact('wedding'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title_wedding' => 'required|string|max:255',
            'wedding_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description_wedding' => 'required|string'
        ]);

        $wedding = wedding::findOrFail($id);

        if ($request->hasFile('wedding_photo')) {
            // Hapus foto lama
            Storage::disk('public')->delete($wedding->wedding_photo);
            // Tambah foto baru
            $photoPath = $request->file('wedding_photo')->store('wedding_photos', 'public');
            $wedding->wedding_photo = $photoPath;
        }

        $wedding->update([
            'title_wedding' => $request->title_wedding,
            'description_wedding' => $request->description_wedding
        ]);

        return redirect('/Paket-Wedding')->with('success', 'Paket Wedding berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::table('weddings')->where('id_wedding', $id)->delete();

            return redirect('/Paket-Wedding')->with('success', 'Data Berhasil Dihapus');
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
