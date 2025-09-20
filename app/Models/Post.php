<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Mass assignable attributes
    protected $fillable = [
        'title',
        'content',
        'is_archived',
        'user_id',
    ];
}
