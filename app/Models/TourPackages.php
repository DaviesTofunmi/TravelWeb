<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourPackages extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'desc',
        'price',
        'location',
        'duration',
        'image',
      
       
    ];
}










