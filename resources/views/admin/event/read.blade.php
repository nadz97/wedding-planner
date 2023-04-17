@extends('layouts.user_type.auth')

@section('content')

<div class="container-fluid py-4">

    <div class="card">
        <div class="card-header pb-0 px-3">
            <h6 class="mb-0"> Detail Event </h6>
        </div>
        <div class="card-body pt-4 p-3">
            <div class="row">
                <div class="col">
                    Gambar
                </div>
                <div class="col-9">
                    <div class="row">
                        <div class="col"><strong>Event:</strong> Pernikahan A dan B</div>
                        <div class="col"><strong>Lokasi:</strong> Jombang, jawa timur</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col"><strong>Kategori:</strong> Pernikahan</div>
                        <div class="col"><strong>Keterangan:</strong> Nikahan depan sd </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col"><strong>Start Date :</strong>2022-01-08</div>
                        <div class="col"><strong>End Date :</strong>2022-01-09</div>
                        <div class="w-100"></div>
                        <div class="col"><label for="">Start Time:</label><input name="starttime" type="text" value="06:30 PM" readonly></div>
                        <div class="col"><label for="">End Time:</label><input name="endtime" type="text" value="18:30 PM" readonly></div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
