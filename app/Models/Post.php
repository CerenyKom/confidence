<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\user_post;

class Post extends Model
{
    protected $fillable = ['titre_post', 'contenue_post', 'user_id' ];
}
