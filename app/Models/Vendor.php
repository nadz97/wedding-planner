<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $table = 'vendors';

    protected $fillable = ['user_id' , 'tanggal_lahir' , 'logo' , 'bidang' , 'perusahaan' , 'alamat' , 'kota' , 'provinsi' , 'kodepos' , 'keterangan' , 'bank' , 'no_rekening' , 'nama_rekening'];
}
