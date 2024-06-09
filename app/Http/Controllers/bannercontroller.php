<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\banner;

class bannercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = banner::all();
        return view('admin.banner', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tambah-banner');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'banner_name' => 'required|string|max:255',
            'banner_photo' => 'required|image|mimes:jpeg,png,jpg,JPG,JPEG,PNG|max:2048'
        ]);

        // Simpan gambar
        if ($request->hasFile('banner_photo')) {
            $image = $request->file('banner_photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/banner_photos', $imageName);
        }

        // Simpan data ke database
        $banner = new Banner();
        $banner->banner_name = $request->input('banner_name');
        $banner->banner_photo = 'banner_photos/' . $imageName;
        $banner->save();

        return redirect('/Banner')->with('success', 'Banner berhasil ditambahkan!');
    
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
        $banner = banner::find($id);
        return view('admin.edit-banner', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'banner_name' => 'required|string|max:255',
            'banner_photo' => 'required|image|mimes:jpeg,png,jpg,JPG,JPEG,PNG|max:2048'
        ]);

        $banner = banner::findOrFail($id);

        if ($request->hasFile('banner_photo')) {
            // Hapus foto lama
            Storage::disk('public')->delete($banner->banner_photo);
            // Tambah foto baru
            $photoPath = $request->file('banner_photo')->store('banner_photos', 'public');
            $banner->banner_photo = $photoPath;
        }

        $banner->update([
            'banner_name' => $request->banner_name,
            'banner_photo' => $request->banner_photo
        ]);

        return redirect('/Banner')->with('success', 'Banner berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::table('banners')->where('id_banner', $id)->delete();

            return redirect('/Banner')->with('success', 'Data Berhasil Dihapus');
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
