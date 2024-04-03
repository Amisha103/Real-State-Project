<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FlatForSale extends Model
{
    protected $table = 'flat_for_sale';
    protected $fillable = ['image', 'details', 'owner_name', 'address', 'mobile_number'];
}
