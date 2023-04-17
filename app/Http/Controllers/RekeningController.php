<?php

namespace App\Http\Controllers;

use App\Models\Rekening;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RekeningController extends Controller
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

    public function getRekening()
    {
        $rekening = DB::table('rekenings')
                    ->orderBy('bank' , 'DESC')
                    ->get();
        return response()->json($rekening);
    }

    public function saveRekening(Request $request)
    {
        $rekening = Rekening::create([
            "bank" => $request->bank,
            "no_rekening" => $request->no_rekening,
            "nama_rekening" => $request->nama_rekening,

        ]);
        return response()->json("data berhasil disimpan!!");
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
     * @param  \App\Http\Requests\StoreRekeningRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rekening  $rekening
     * @return \Illuminate\Http\Response
     */
    public function show(Rekening $rekening)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rekening  $rekening
     * @return \Illuminate\Http\Response
     */
    public function edit(Rekening $rekening)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRekeningRequest  $request
     * @param  \App\Models\Rekening  $rekening
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rekening $rekening)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rekening  $rekening
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rekening $rekening)
    {
        //
    }
}
