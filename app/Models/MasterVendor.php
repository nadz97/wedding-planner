<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterVendor extends Model
{
    use HasFactory;

    protected $table = 'vendor_details';

    protected $fillable = ['vendor_id' , 'kategori' , 'nama_layanan' , 'biaya'];
}
