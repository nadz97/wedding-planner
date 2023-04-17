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

    <div class="container">
        <div class="row">
            <div class="container-fluid py-4">

                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <h6 class="mb-0"> List Invoice </h6>
                    </div>
                    <div class="card-body pt-4 p-3">

                        <table id="tblinvoicelist" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Number</th>
                                    <th>Customer</th>
                                    <th>Total</th>
                                    <th>Tanggal</th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>Number</th>
                                    <th>Customer</th>
                                    <th>Total</th>
                                    <th>Tanggal</th>
                                </tr>
                            </tfoot>
                        </table>


                    </div>
                </div>
            </div>
        </div>

        <a href="/admin/master/invoice/createInvoice" class="btn bg-gradient-dark w-15" style="margin-top: 5px; margin-bottom: 5px; margin-left:20px;">Add New Data</a>
    </div>

    <script>
        $(function () {
                /* Formatting function for row details - modify as you need */
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

                    '<tr>' +
                    '<td>Status :</td>' +
                    '<td>' +
                    d.status +
                    '</td>' +
                    '</tr>' +

                    '</table>'
                );
            }



            let tblevent = $('#tblinvoicelist').DataTable({
                processing : true,
                serverSide: true,
                ajax: "{{ URL::to('admin/master/getInvoiceList') }}",
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
                    {data: 'perusahaan', name: 'nama'},
                    {data: 'kategori', "width": "10%", name: 'kategori'},
                    {data: 'nama_layanan', "width": "20%", name: 'vendor'},
                    {data: 'harga', render: $.fn.DataTable.render.number( '.', ',', 0, 'Rp ' ), name: 'harga'},
                    // {data: 'keterangan', name: 'keterangan'},
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
            $('#tblvendorlist tbody').on('click', 'td.details-control', function () {
                    let tr = $(this).closest('tr');
                    let tdi = tr.find("i.fa");
                    let row = tblevent.row(tr);

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
    </script>


    @endsection
