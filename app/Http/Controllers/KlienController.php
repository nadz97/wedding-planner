<?php

namespace App\Http\Controllers;

use App\Models\Klien;
use App\Http\Requests\StoreKlienRequest;
use App\Http\Requests\UpdateKlienRequest;

class KlienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKlienRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKlienRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Klien  $klien
     * @return \Illuminate\Http\Response
     */
    public function show(Klien $klien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Klien  $klien
     * @return \Illuminate\Http\Response
     */
    public function edit(Klien $klien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKlienRequest  $request
     * @param  \App\Models\Klien  $klien
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKlienRequest $request, Klien $klien)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Klien  $klien
     * @return \Illuminate\Http\Response
     */
    public function destroy(Klien $klien)
    {
        //
    }
}
