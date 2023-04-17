@extends('layouts.user_type.auth')

@section('content')

  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Data Vendor</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0">
                      <thead>
                          <tr>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Vendor</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Bidang</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alamat</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.Telp</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rekening</th>
                              <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($data as $dat)
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <img src="{{ asset ('assets/img/vendor/' . $dat->logo)}}" class="avatar avatar-sm me-3" alt="user1">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{ $dat->name }}</h6>
                                            <p class="text-xs text-secondary mb-0">{{ $dat->email }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $dat->bidang}}</p>
                                    <p class="text-xs text-secondary mb-0">{{ $dat->perusahaan }}</p>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <p class="text-xs font-weight-bold mb-0">{{ $dat->alamat}}</p>
                                    <p class="text-xs text-secondary mb-0">{{ $dat->kota }} - {{ $dat->provinsi}}</p>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{ $dat->phone <> null ? $dat->phone : "-"}}</span>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0">{{ $dat->nama_rekening}}</p>
                            <p class="text-xs text-secondary mb-0">{{ $dat->bank }} :<strong> {{ $dat->no_rekening }} </strong></p>
                        </td>
                        <td class="align-middle">
                            <div class="btn-group">

                                <a href="{{ URL::to ('/admin/master/vendor/' . $dat->id . '/edit') }}">
                                    <button type="button" class="btn btn-warning">Edit</button>
                                </a>&nbsp;

                                <form action="{{ URL::to('/admin/master/vendor/' . $dat->id ) }}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </form>
                            </div>

                        </td>


                    </tr>
                    @endforeach

                </tbody>
            </table>
            <a href="/admin/master/vendor/create" class="btn bg-gradient-dark w-15" style="margin-top: 5px; margin-bottom: 5px; margin-left:20px;">Add New Data</a>
              </div>
            </div>
        </div>
    </div>
</div>

</div>
  </main>

  @endsection
