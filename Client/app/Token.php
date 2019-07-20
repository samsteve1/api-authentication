<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;


class Token extends Model
{
    protected $fillable = ['access_token'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
