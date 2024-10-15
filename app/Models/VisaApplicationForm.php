<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisaApplicationForm extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'country',
        'destination',
        'state',
        'city',
        'email',
        'transaction_id',
        
        'status'
      
       
    ];

    protected $casts=[
        'travel_companion'=>'array'
    ];
}
