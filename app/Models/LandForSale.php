<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandForSale extends Model
{
    protected $table = 'land_sale_table';

    protected $fillable = ['image', 'details', 'owner_name', 'address', 'mobile_number'];
}