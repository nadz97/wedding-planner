<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Klien;
use App\Models\User;
use DataTables;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.event.index');
    }

    public function findevent($id)
    {
        $event = Event::where('id' , '=' , $id)->first();
        return response()->json($event);
    }

    public function getEvent(Request $request )
    {
        if ($request->ajax() ) {
            $data = DB::table('events AS evn')
            ->join('kategoris AS ktg' , 'evn.kategori_id' , '=' , 'ktg.id')
            ->join('kliens AS kln' , 'evn.klien_id' , '=' , 'kln.id')
            ->join('users AS usr' , 'kln.user_id' , '=' , 'usr.id')
            ->join('rekenings AS rek' , 'evn.rekening_id' , '=' , 'rek.id')
            ->join('pemasukans AS pmk', 'pmk.event_id', '=', 'evn.id')
            ->select('evn.id' , 'pmk.sumber', 'pmk.nominal',
                    'usr.name' ,
                    'evn.nama_event' ,'evn.tanggal' , 'evn.dp' , 'evn.keterangan', 'evn.total_harga',
                    DB::raw("CONCAT(kln.alamat, ', ' , kln.kota, ' - ' , kln.provinsi ) AS alamat" ),
                    DB::raw("CONCAT(rek.bank, ' - ' , rek.no_rekening, ' - ' , rek.nama_rekening ) AS rekening" ),
                    )
            ->get();

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $actionBtn = '<a href="javascript:void(0)" id="btnedit" data-id="' .$row->id. '" class="btn btn-success"><i class="fas fa-edit"></i></a>
                <a href="javascript:void(0)" id="deleteProduct" data-id="' . $row->id . '" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);

        // return response()->json($data);

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $klien = DB::table('kliens AS kli')
        //         ->join('users AS usr', 'kli.user_id' , '=' , 'usr.id')
        //         ->select('kli.id', 'usr.name', 'kli.alamat', 'kli.kota', 'kli.provinsi')
        //         ->get();

        // return response()->json($klien);
        return view("admin.event.create" );
    }

    public function getKlien()
    {
        $klien = DB::table('kliens AS kli')
                ->join('users AS usr', 'kli.user_id' , '=' , 'usr.id')
                ->select('kli.id', 'usr.name', 'kli.alamat', 'kli.kota', 'kli.provinsi')
                ->orderBy('kli.id' , 'DESC')
                ->get();

        return response()->json($klien);
    }

    public function getKategori()
    {
        $kategori = DB::table('kategoris')
                    ->orderBy('kategori' , 'DESC')
                    ->get();
        return response()->json($kategori);
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 1. Simpan ke tabel "user"
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
            "phone" => $request->phone
        ]);

        // 2. simpan ke tabel "klien"
        $klien = Klien::create([
            "user_id" => $user->id,
            "tanggal_lahir" => $request->tanggal_lahir,
            "alamat" => $request->alamat,
            "kota" => $request->kota,
            "provinsi" => $request->provinsi,
            "kodepos" => $request->kodepos,
            "keterangan" => $request->keterangan,
            "bank" => $request->bank,
            "no_rekening" => $request->no_rekening,
            "nama_rekening" => $request->nama_rekening,
        ]);




        return response()->json("data berhasil disimpan");
    }

    public function saveEvent(Request $request)
    {
        $event = Event::create([
            "klien_id" => $request->klien_id,
            "kategori_id" => $request->kategori_id,
            "rekening_id" => $request->rekening_id,
            "nama_event" => $request->nama_event,
            "tanggal" => $request->tanggal,
            "dp" => $request->dp,
            "total_harga" => $request->total_harga,
            "keterangan" => $request->keterangan,
        ]);

        return response()->json($event);


    }

    public function updateEditEvent(Request $req)
    {
        $data = Event::where('id' , '=' , $req->id)->first();
        $data->kategori_id = $req->kategori_id;
        $data->klien_id = $req->klien_id;
        $data->rekening_id = $req->rekening_id;
        $data->nama_event = $req->nama_event;
        $data->tanggal = $req->tanggal;
        $data->dp = $req->dp;
        $data->total_harga = $req->total_harga;
        $data->keterangan = $req->keterangan;

        $data->save ();
        return response ()->json ( 'Data Berhasil diupdate' );


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $eventId = Event::find($id);

        $data = DB::table('events AS evn')
                ->join('kategoris AS ktg' , 'evn.kategori_id' , '=' , 'ktg.id')
                ->join('kliens AS kln' , 'evn.klien_id' , '=' , 'kln.id')
                ->join('users AS usr' , 'kln.user_id' , '=' , 'usr.id')
                ->join('rekenings AS rek' , 'evn.rekening_id' , '=' , 'rek.id')
                ->where('evn.id' , '=' , $id)
                ->select('evn.*', 'ktg.kategori' , 'ktg.keterangan AS ket', 'usr.name AS uname' , 'evn.total_harga',
                        'kln.tanggal_lahir', 'rek.bank' , 'rek.no_rekening AS rek_no' , 'rek.nama_rekening AS rek_nama')
                ->get();

        // return response()->json($data);



        return view('admin.event.edit' , compact('data') );
    }

    public function read()
    {
        return view('admin.event.read');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventRequest  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event, Request $request)
    {
        // return response()->json($request->all());
        // dd($request->all());
        $data = Event::findOrFail($request->id);
        $data->delete();
        // return redirect()->route( url('/admin/event/event'))
        //             ->with('success','User deleted successfully');


    }
}
