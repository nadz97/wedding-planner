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
                        <h6 class="mb-0"> Daftar Service </h6>
                    </div>
                    <div class="card-body pt-4 p-3">

                        <table id="tblvendorlist" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Vendor</th>
                                    <th>Biaya</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Vendor</th>
                                    <th>Biaya</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>


                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- <!-- Modal --> --}}
    <div class="modal fade mdl-lg" id="mdlvendorlist" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ubah Data Vendor List</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5">
                        <input type="hidden" id="id" name="id">
                        <div class="form-group">
                            <label for="nama" class="form-control-label"> Nama </label>
                            <input id="nama" name="perusahaan" class="form-control">
                        </div>
                    </div>


                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="kategori" class="form-control-label"> Kategori </label>
                            <input id="kategori" name="kategori" class="form-control">
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="harga" class="form-control-label"> Harga </label>
                                <input id="harga" name="harga" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="vendor" class="form-control-label"> Vendor </label>
                                <input id="vendor" name="nama_layanan" class="form-control">
                            </div>
                        </div>


                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="status" class="form-control-label"> Status </label>
                                <input id="status" name="status" class="form-control">
                            </div>
                        </div>

                    </div>

                    <hr>

                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea id="keterangan" name="keterangan" rows="3" class="form-control"></textarea>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="updateEditEvent">Save changes</button>
            </div>
        </div>
        </div>
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



            let tblevent = $('#tblvendorlist').DataTable({
                processing : true,
                serverSide: true,
                ajax: "{{ URL::to('admin/master/getVendorList') }}",
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
                    {data: 'biaya', render: $.fn.DataTable.render.number( '.', ',', 0, 'Rp ' ), name: 'biaya'},
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

            $(document).on('click', '#btnedit', function (e) {
            e.preventDefault();
            // alert ("woi");

            let id = $(this).data("id");

            $.ajax({
                type: "GET",
                url: "/admin/master/findvendorlist/" + id,
                dataType: "JSON",
                success: function (response) {
                    $('#id').val( response.id );
                    $('#nama').val( response.perusahaan );
                    $('#kategori').val( response.kategori );
                    $('#vendor').val( response.nama_layanan );
                    $('#harga').val( response.harga );
                    $('#status').val( response.status );
                    $('#keterangan').val( response.keterangan );
                }
            });

            $('#mdlvendorlist').modal('show');
        });
        });
    </script>
@endsection
