<?php

namespace App\Http\Controllers;

use App\Models\Mhsw;
use Illuminate\Http\Request;

class MhswController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rows = Mhsw::all();
        return view('mhsw.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mhsw.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Mhsw::create([
            'mhsw_nim' => $request->mhsw_nim,
            'mhsw_nama' => $request->mhsw_nama,
            'mhsw_alamat' => $request->mhsw_alamat,
        ]);
        
        return redirect('/mhsw');
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
