<?php

namespace App\Http\Controllers;

use App\Models\MasterVendor;
use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\VendorDetail;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Validator;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('vendors AS vnd')
                    ->join('users AS usr' , 'vnd.user_id' , '=' , 'usr.id')
                    ->select('vnd.*' , 'usr.name' , 'usr.email' , 'usr.phone' , 'usr.location' , 'usr.about_me')
                    ->get();

        return view('admin.vendor.index'  , compact('data')  );

        // return response()->json( $data );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view("admin.vendor.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVendorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    public function simpan_vendor( Request $request )
    {
      if ( $request->hasFile('logo') ) {
          // 1. simpan ke tabel user

          $namalogo = rand( pow(10, 3 -1) , pow(10 , 3) -1 ) . '_' . $request->file('logo')->getClientOriginalName();

          $request->logo->move(public_path('/assets/img/vendor/') , $namalogo);

          $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt( $request->password ) ,
            "phone" => $request->phone
          ]);

          // 2. simpan ke tabel vendor
          $vendor = Vendor::create([
            "user_id" => $user->id,
            "tanggal_lahir" => $request->tanggal_lahir,
            "logo" => $namalogo,
            "perusahaan" => $request->perusahaan,
            "bidang" => $request->bidang,
            "alamat" => $request->alamat,
            "kota" => $request->kota,
            "provinsi" => $request->provinsi,
            "kodepos" => $request->kodepos,
            "keterangan" => $request->keterangan,
            "bank" => $request->bank,
            "no_rekening" => $request->no_rekening,
            "nama_rekening" => $request->nama_rekening
          ]);
        } else {
            // 1. simpan ke tabel user



          $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt( $request->password ) ,
            "phone" => $request->phone
          ]);

          // 2. simpan ke tabel vendor
          $vendor = Vendor::create([
            "user_id" => $user->id,
            "tanggal_lahir" => $request->tanggal_lahir,
            "perusahaan" => $request->perusahaan,
            "bidang" => $request->bidang,
            "alamat" => $request->alamat,
            "kota" => $request->kota,
            "provinsi" => $request->provinsi,
            "kodepos" => $request->kodepos,
            "keterangan" => $request->keterangan,
            "bank" => $request->bank,
            "no_rekening" => $request->no_rekening,
            "nama_rekening" => $request->nama_rekening
          ]);
        }

      return response()->json( $vendor->id );
    }

    public function vendor_detail(Request $request)
    {

      foreach ($request->all() as $value) {

        for ($i=0; $i < count( $request->data ) ; $i++) {

          $vdet = MasterVendor::create([
            "vendor_id" => $value[$i]["vendor_id"],
            "kategori" => $value[$i]["kategori"],
            "nama_layanan" => $value[$i]["nama_layanan"],
            "biaya" => $value[$i]["biaya"]
          ]);
        }
      }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {
        //
    }

    public function getkategori()
    {
      $data = DB::table('vendor_details AS vdet')
              ->distinct()
              ->get('vdet.kategori');
      return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit( $id )
    {
      $data = DB::table('vendors AS vnd')
                    ->join('users AS usr' , 'vnd.user_id' , '=' , 'usr.id')
                    ->where('vnd.id' , '=' , $id )
                    ->select('vnd.*' , 'usr.name' , 'usr.email' , 'usr.phone' , 'usr.location' , 'usr.about_me')
                    ->first();

      // return response()->json( $data );
      return view('admin.vendor.edit'  , compact('data')  );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVendorRequest  $request
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendor $vendor)
    {
       if ( $request->hasFile('logo')) {
        // 1. upload gambar yg baru

        $namalogo = rand( pow(10, 3 -1) , pow(10 , 3) -1 ) . '_' . $request->file('logo')->getClientOriginalName();

        $request->logo->move(public_path('/assets/img/vendor/') , $namalogo);
       }


        // 2. cari user berdasarkan kolom "user_id" pada tabel vendor
        $user = User::where( "id" , "=", $vendor->user_id )->first();

        // 3. ubah tabel "user" dengan data dari form
        $user->name = $request->name;
        $user->email = $request->email;

        if ( $request->filled("password") ) {
          $user->password = bcrypt ( $request->password) ;
        }
        $user->phone = $request->phone;
        $user->save();

        // 4. unlink/hapus gambar "logo" yang lama
        if ( $request->hasFile('logo')) {
          $logo = public_path('/assets/img/vendor/') . $vendor->logo;
          File::delete( $logo);
        }


        // 5. ubah tabel "vendor" dengan data data form
        $vendor->tanggal_lahir = $request->tanggal_lahir;

        if ( $request->hasFile('logo')) {
          $vendor->logo = $namalogo;
        }

        $vendor->perusahaan = $request->perusahaan;
        $vendor->bidang = $request->bidang;
        $vendor->alamat = $request->alamat;
        $vendor->kota = $request->kota;
        $vendor->provinsi = $request->provinsi;
        $vendor->kodepos = $request->kodepos;
        $vendor->keterangan = $request->keterangan;
        $vendor->bank = $request->bank;
        $vendor->no_rekening = $request->no_rekening;
        $vendor->nama_rekening = $request->nama_rekening;
        $vendor->save();

       return redirect("/admin/master/vendor/");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor)
    {
      $logo = public_path('/assets/img/vendor/') . $vendor->logo;
      File::delete( $logo);

      $vendor->delete();

      return redirect("/admin/master/vendor/");
    }
}
