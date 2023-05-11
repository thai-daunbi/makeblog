<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeControl extends Model
{
    use HasFactory;
    protected $table = 'posts';

    // columns to be allowed in mass-assingment 
    protected $fillable = ['like_user_id', 'like_post_id'];
}
