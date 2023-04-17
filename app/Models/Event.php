<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = "events";

    protected $fillable = ['klien_id' , 'kategori_id' , 'rekening_id' , 'nama_event' , 'tanggal' , 'dp' , 'total_harga', 'keterangan' , 'status'];
}
