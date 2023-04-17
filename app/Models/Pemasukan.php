<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory;
    protected $table = 'pemasukans';

    protected $fillable = ['kategori_id', 'sumber' , 'klien_id', 'event_id', 'nominal' , 'keterangan'];
}
