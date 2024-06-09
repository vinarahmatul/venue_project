<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\birthday;
use App\Models\banner;
use App\Models\wedding;

class homecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data banner dari database
        $banners = banner::all();
        $weddings = wedding::all();
        $partys = birthday::all();

        // Kirim data banner ke view
        return view('halaman-utama', compact('banners', 'weddings', 'partys'));
    }

    public function about()
    {
        return view('tentang');
    }

    public function wedding()
    {
        $wedding = wedding::all();

        return view('pernikahan', compact('wedding'));
    }

    public function detailwedding($id)
    {
        $wedding = wedding::findOrFail($id);

        return view('detail-pernikahan', compact('wedding'));
    }

    public function party()
    {
        $party = birthday::all();

        return view('pesta', compact('party'));
    }

    public function detailparty($id)
    {
        $party = birthday::findOrFail($id);

        return view('detail-pesta', compact('party'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
