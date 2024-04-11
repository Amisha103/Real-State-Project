<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailableData extends Model
{
    protected $table = 'available_data';
    use HasFactory;
    // protected $fillable = ['image', 'type', 'details', 'owner_name', 'address', 'mobile_number'];
}
