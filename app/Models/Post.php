<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //use HasFactory;
    protected $table = 'posts';

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'title',
        'description'
    ];

    /**
     * The attributes that should be hidden for arrays
     * 
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
