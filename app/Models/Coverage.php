<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coverage extends Model
{
    protected $table = 'coverages';

    protected $fillable = [
        'qty_province',
        'qty_clients',
        'qty_experience',
    ];
}
