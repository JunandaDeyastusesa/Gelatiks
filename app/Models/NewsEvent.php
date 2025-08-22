<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsEvent extends Model
{
    use HasFactory;

    protected $table = 'news_events';

    protected $fillable = [
        'title',
        'content',
        'image',
        'status',
        'event_date',
    ];
}
