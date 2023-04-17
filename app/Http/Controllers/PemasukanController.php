<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Event;
use Illuminate\Support\Facades\Validator;
use App\Models\Pemasukan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePemasukanRequest;
use App\Http\Requests\UpdatePemasukanRequest;

class PemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

            $data = DB::table('users AS usr')
                        ->join('kliens AS kln', 'kln.user_id', '=' , 'usr.id')
                        ->join('events AS evn' , 'evn.klien_id', '=' , 'kln.id')
                        ->select('usr.*', 'evn.nama_event')
                        ->get();

        return view('admin.pemasukan.index' , compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = DB::table('users AS usr')
                        ->join('kliens AS kln', 'kln.user_id', '=' , 'usr.id')
                        ->join('events AS evn' , 'evn.klien_id', '=' , 'kln.id')
                        ->select('usr.*', 'evn.nama_event', 'evn.tanggal' , 'evn.dp')
                        ->get();
        return view("admin.pemasukan.create", compact('data') );
    }

    public function autoComplete($id = 0)
    {
        $q = isset($_POST['q']) ? $_POST['q'] : '';
        $data = DB::table('users AS usr')
                    ->join('kliens AS kln', 'kln.user_id', '=' , 'usr.id')
                    ->join('events AS evn' , 'evn.klien_id', '=' , 'kln.id')
                    ->select('usr.*', 'evn.nama_event')

                    ->where('usr.name', $id)->first();
        return response()->json($data);
    }

    public function getPemasukan2(Request $request)
    {
        $data = DB::table('events AS evn')
            ->join('kategoris AS ktg' , 'evn.kategori_id' , '=' , 'ktg.id')
            ->join('kliens AS kln' , 'evn.klien_id' , '=' , 'kln.id')
            ->join('users AS usr' , 'kln.user_id' , '=' , 'usr.id')
            ->join('rekenings AS rek' , 'evn.rekening_id' , '=' , 'rek.id')

            ->select('evn.id' , 'evn.klien_id',
                    'usr.name' ,
                    'evn.nama_event' ,'evn.tanggal' , 'evn.dp' , 'evn.keterangan', 'evn.total_harga',
                    DB::raw("CONCAT(kln.alamat, ', ' , kln.kota, ' - ' , kln.provinsi ) AS alamat" ),
                    DB::raw("CONCAT(rek.bank, ' - ' , rek.no_rekening, ' - ' , rek.nama_rekening ) AS rekening" ),
                    )

            ->get();
        return response()->json($data);
    }

    public function getPemasukan(Request $request )
    {
        // if ($request->ajax() ) {

            // $data = DB::table('events AS evn')
            // ->join('kategoris AS ktg' , 'evn.kategori_id' , '=' , 'ktg.id')
            // ->join('kliens AS kln' , 'evn.klien_id' , '=' , 'kln.id')
            // ->join('users AS usr' , 'kln.user_id' , '=' , 'usr.id')
            // ->join('rekenings AS rek' , 'evn.rekening_id' , '=' , 'rek.id')

            // ->select('evn.id' , 'evn.klien_id',
            //         'usr.name' ,
            //         'evn.nama_event' ,'evn.tanggal' , 'evn.dp' , 'evn.keterangan', 'evn.total_harga',
            //         DB::raw("CONCAT(kln.alamat, ', ' , kln.kota, ' - ' , kln.provinsi ) AS alamat" ),
            //         DB::raw("CONCAT(rek.bank, ' - ' , rek.no_rekening, ' - ' , rek.nama_rekening ) AS rekening" ),
            //         )

            // ->get();

            $data = DB::table('pemasukans AS pmk')
                        ->join('events AS evn', 'pmk.event_id', '=', 'evn.id')
                        ->join('kategoris AS ktg' , 'evn.kategori_id' , '=' , 'ktg.id')
                        ->join('kliens AS kln' , 'evn.klien_id' , '=' , 'kln.id')
                        ->join('users AS usr' , 'kln.user_id' , '=' , 'usr.id')
                        ->join('rekenings AS rek' , 'evn.rekening_id' , '=' , 'rek.id')
                        ->select('pmk.*', 'evn.id' , 'evn.klien_id', 'usr.name' ,
                                'evn.nama_event' ,'evn.tanggal' , 'evn.dp' , 'evn.keterangan', 'evn.total_harga',
                                DB::raw("CONCAT(kln.alamat, ', ' , kln.kota, ' - ' , kln.provinsi ) AS alamat" ),
                                DB::raw("CONCAT(rek.bank, ' - ' , rek.no_rekening, ' - ' , rek.nama_rekening ) AS rekening" ),)

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


            return response()->json($data);

        // }
    }



    public function savePemasukan(Request $request)
    {
        $validated = $request->validate([
            'klien_id' => 'required',
            // 'name' => 'required|string|max:255|regex:/^[A-Za-" "]+$/',
            'nominal' => 'required',
        ],
        ['nominal.required' => 'Nominal harus di isi',
         'klien_id.required' => 'Pilih nama klien'
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        // dd('berhasil');
        $pemasukan = Pemasukan::create([
            "sumber" => $request->sumber,
            "klien_id" => $request->klien_id,
            "event_id" => $request->event_id,
            "nominal" => $request->nominal,
            "keterangan" => $request->keterangan,
        ]);

        return response()->json($pemasukan->id);
        // return response()->json($request->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePemasukanRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function show(Pemasukan $pemasukan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemasukan $pemasukan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePemasukanRequest  $request
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePemasukanRequest $request, Pemasukan $pemasukan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemasukan $pemasukan)
    {
        //
    }
}
