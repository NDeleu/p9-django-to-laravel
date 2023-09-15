<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserFollows extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_follows';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'followed_user_id',
        'user_name',
        'followed_user_name',
    ];
}
