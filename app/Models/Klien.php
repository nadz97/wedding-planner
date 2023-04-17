<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klien extends Model
{
    use HasFactory;

    protected $table = 'kliens';

    protected $fillable = ['user_id' , 'tanggal_lahir' , 'alamat' , 'kota' , 'provinsi' , 'kodepos' , 'keterangan' , 'bank' , 'no_rekening' , 'nama_rekening'];
}
