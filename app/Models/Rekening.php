<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekening extends Model
{
    use HasFactory;

    protected $table = 'rekenings';

    protected $fillable = ['bank' , 'no_rekening' , 'nama_rekening'];
}
