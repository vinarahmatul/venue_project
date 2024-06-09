<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\birthday;

class partycontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partys = birthday::all();
        return view('admin.paket-party', compact('partys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tambah-party');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'title_party' => 'required|string|max:255',
            'party_photo' => 'required|image|mimes:jpeg,png,jpg,JPG,JPEG,PNG|max:2048',
            'description_party' => 'required|string',
        ]);

        // Simpan gambar
        if ($request->hasFile('party_photo')) {
            $image = $request->file('party_photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/party_photos', $imageName);
        }

        // Simpan data ke database
        $birthday = new Birthday();
        $birthday->title_party = $request->input('title_party');
        $birthday->party_photo = 'party_photos/' . $imageName;
        $birthday->description_party = $request->input('description_party');
        $birthday->save();

        return redirect('/Paket-Party')->with('success', 'Paket Party berhasil ditambahkan!');
    
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
        $party = birthday::find($id);
        return view('admin.edit-party', compact('party'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title_party' => 'required|string|max:255',
            'party_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description_party' => 'required|string'
        ]);

        $party = birthday::findOrFail($id);

        if ($request->hasFile('party_photo')) {
            // Hapus foto lama
            Storage::disk('public')->delete($party->party_photo);
            // Tambah foto baru
            $photoPath = $request->file('party_photo')->store('party_photos', 'public');
            $party->party_photo = $photoPath;
        }

        $party->update([
            'title_party' => $request->title_party,
            'description_party' => $request->description_party
        ]);

        return redirect('/Paket-Party')->with('success', 'Paket Party berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::table('birthdays')->where('id_party', $id)->delete();

            return redirect('/Paket-Party')->with('success', 'Data Berhasil Dihapus');
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
