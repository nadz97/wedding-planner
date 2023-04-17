<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = "invoices";

    protected $fillable = [
        'series_id',
        'customer',
        'tanggal',
        'alamat',
        'subtotal',
        'fee',
        'total',
        'cicilan'
    ];


}
