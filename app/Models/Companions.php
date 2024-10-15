<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companions extends Model
{
    use HasFactory;
    protected $fillable = [
        'comp_name',
        'relationship',
        'transaction_id',
        'comp_email',
        'status'

    ];
}
