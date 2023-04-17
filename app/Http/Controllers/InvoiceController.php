<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function index()
    {
        return view('admin.invoice.index');
    }

    public function create()
    {
        return view('admin.invoice.create_invoice');
    }

    public function invoicelist()
    {
        return view('admin.invoice.invoice');
    }

    public function getInvoice()
    {
        $data = DB::table('invoices AS inv')
                ->join('vendor_details AS vdt' , 'inv.details_id' , '=' , 'vdt.id')
                ->join('vendors AS vnd' , 'vdt.vendor_id' , '=' , 'vnd.id')
                ->join('users AS usr' , 'vnd.user_id' , '=' , 'usr.id')
                ->select('inv.*', 'vdt.kategori', 'vdt.nama_layanan', 'vdt.biaya', 'usr.name', 'vnd.perusahaan')
                ->get();

        return view('admin.invoice.invoice' , compact('data') );
    }

    public function getInvoiceList(Request $request)
    {
        if ($request->ajax() ) {
            $data = DB::table('invoice AS inv')
                    ->select('inv.*')
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
}
