<?php

namespace App\Http\Controllers;

use App\Models\VendorList;
use Illuminate\Http\Request;
use DataTables;

use Illuminate\Support\Facades\DB;


class MasterVendorController extends Controller
{
    public function index()
    {
        return view('admin.mastervendor.vendorlist');
    }



    public function vendorlist()
    {
        return view('admin.mastervendor.vendorlist');
    }

    public function getVendorList(Request $request)
    {
        if ($request->ajax() ) {
            $data = DB::table('vendor_details AS vnl')
                    ->join('vendors AS vnd', 'vnl.vendor_id', '=', 'vnd.id')
                    ->select('vnl.*', 'vnd.perusahaan')
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
        }
    }

    public function findvendorlist($id)
    {
        $event = VendorList::where('id' , '=' , $id)->first();
        return response()->json($event);
    }
}

