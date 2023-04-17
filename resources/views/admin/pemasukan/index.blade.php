@extends('layouts.user_type.auth')

@section('content')


<style>
    table {
        table-layout:fixed;
    }
    td {
        overflow:hidden;
        text-overflow: ellipsis;
    }


    td.details-control {
            text-align:center;
            color:forestgreen;
            cursor: pointer;
    }
    tr.shown td.details-control {
        text-align:center;
        color:red;
    }

</style>

<div>
    <div class="container-fluid">
        <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
            <span class="mask bg-gradient-primary opacity-6"></span>
        </div>
        <div class="card card-body blur shadow-blur mx-4 mt-n6">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="{{ asset('assets/img/lm_logo.png') }}" alt="..." class="w-100 border-radius-lg shadow-sm">
                        <a href="javascript:;" class="btn btn-sm btn-icon-only bg-gradient-light position-absolute bottom-0 end-0 mb-n2 me-n2">
                            <i class="fa fa-pen top-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Image"></i>
                        </a>
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{Auth::user()->name }}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            Admin
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                    <div class="nav-wrapper position-relative end-0">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4">

        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0"> Daftar Event </h6>
            </div>
            <div class="card-body pt-4 p-3">

                <table id="tblpemasukan" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nama Klien</th>
                            <th>Event</th>
                            <th>Sumber</th>
                            <th>Nominal</th>



                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th>Nama Klien</th>
                            <th>Event</th>
                            <th>Sumber</th>
                            <th>Nominal</th>


                        </tr>
                    </tfoot>
                </table>
                <a href="/admin/master/pemasukan/create" class="btn bg-gradient-dark w-15" style="margin-top: 5px; margin-bottom: 5px; margin-left:20px;">Add New Data</a>
            </div>
        </div>
    </div>

    {{-- <!-- Modal --> --}}

</div>

<script type="text/javascript" src="{{ asset('js/jquery.easyui.min.js') }}"></script>


<script>
    $(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function format(d) {
            // `d` is the original data object for the row
            return (
                '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +

                '<tr>' +
                '<td>Keterangan :</td>' +
                '<td>' +
                d.keterangan +
                '</td>' +
                '</tr>' +

                // '<tr>' +
                // '<td>Jumlah DP :</td>' +
                // '<td>' +
                // d.dp +
                // '</td>' +
                // '</tr>' +

                '<tr>' +
                '<td>Alamat :</td>' +
                '<td>' +
                d.alamat +
                '</td>' +
                '</tr>' +

                '<tr>' +
                '<td>Rekening :</td>' +
                '<td>' +
                d.rekening +
                '</td>' +
                '</tr>' +

                '</table>'
            );
        }


        let tblpemasukan = $('#tblpemasukan').DataTable({
            processing : true,
            serverSide: true,
            ajax: "{{ URL::to('admin/pemasukan/getPemasukan') }}",
            autoWidth: false,
            columns: [
                {
                    className: 'details-control',
                    orderable: false,
                    data: null,
                    defaultContent: '',
                    render: function () {
                            return '<i class="fa fa-plus-square" aria-hidden="true"></i>';
                    },
                    width:"15px"
                },
                {data: 'name', name: 'name'},
                {data: 'nama_event', name: 'nama_event'},
                {data: 'sumber', name: 'sumber'},
                // {data: 'keterangan', name: 'keterangan'},
                {data: 'nominal' , render: $.fn.DataTable.render.number( '.', ',', 0, 'Rp ' ), name: 'nominal'},
                // {data: 'total_harga', render: $.fn.DataTable.render.number( '.', ',', 0, 'Rp ' ), name: 'total_harga'},
                // {data: 'alamat', name: 'alamat'},
                // {data: 'rekening', name: 'rekening'},
                {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true,
                        "width": "15%"
                },
            ],
            order: [[1, 'asc']],
        });

        // Add event listener for opening and closing details
        $('#tblpemasukan tbody').on('click', 'td.details-control', function () {
                let tr = $(this).closest('tr');
                let tdi = tr.find("i.fa");
                let row = tblpemasukan.row(tr);

                if (row.child.isShown()) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                    tdi.first().removeClass('fa-minus-square');
                    tdi.first().addClass('fa-plus-square');
                }
                else {
                    // Open this row
                    row.child(format(row.data())).show();
                    tr.addClass('shown');
                    tdi.first().removeClass('fa-plus-square');
                    tdi.first().addClass('fa-minus-square');
                }
        });

        $(document).on('click', '#btnpemasukan', function (e) {
            e.preventDefault();
            // alert ("woi");
            // $('#mdlpemasukan').modal('show');
        });

        $(document).ready(function () {
            $('#klien_name').select2({
                    dropdownParent: $('#mdlpemasukan'),
                    theme: 'bootstrap-5'
                });

        });



        $('#sumber_lm').change(function (e) {
            e.preventDefault();
            $('#dvklien').hide();
            console.log();
        });

        $('#sumber_klien').change(function (e) {
            e.preventDefault();
            $('#dvklien').show();
        });

        // $('#klien_id').combogrid({
        // loadFilter:function(data){
        //     if (!data){
        //     return {"total":0,"rows":[]};
        //     } else {
        //     //return other data
        //     }
        // }
        // });

        // ERROR
        // $('#klien_id').combogrid({
        //     panelWidth: 500,
        //     idField: 'itemid',
        //     textField: 'productname',
        //     url: 'datagrid_data1.json',
        //     method: 'get',
        //     columns: [[
        //         {field:'itemid',title:'Item ID',width:80},
        //         {field:'productname',title:'Product',width:120},
        //         {field:'listprice',title:'List Price',width:80,align:'right'},
        //         {field:'unitcost',title:'Unit Cost',width:80,align:'right'},
        //         {field:'attr1',title:'Attribute',width:200},
        //         {field:'status',title:'Status',width:60,align:'center'}
        //     ]],
        //     fitColumns: true,
        //     label: 'Select Item:',
        //     labelPosition: 'top'

        // });
        $('#klien_id').combogrid({
            panelWidth:500,
            url: '{{ URL::to('admin/pemasukan/getEvent')}}',
            idField:'itemid',
            textField:'productid',
            mode:'remote',
            fitColumns:true,
            method: 'GET',
            columns:[[
                {field:'id',title:'ID',width:60},
                {field:'name',title:'nama',align:'right',width:80},
                {field:'tanggal',title:'tanggal',align:'right',width:60},
                {field:'dp',title:'dp',align:'right',width:80},
                {field:'keterangan',title:'keterangan',align:'right',width:50},
                {field:'total_harga',title:'total_harga',align:'right',width:50},
                {field:'alamat',title:'alamat',align:'right',width:50},

            ]]
        });



    });



</script>



@endsection

