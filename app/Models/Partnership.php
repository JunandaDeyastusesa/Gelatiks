<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partnership extends Model
{
    protected $table = 'partnerships';

    protected $fillable = [
        'name',
        'start_contract',
        'end_contract',
        'image',
    ];
}

