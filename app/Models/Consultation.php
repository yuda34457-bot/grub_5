<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    protected $fillable = ['user_id', 'optometrist_id', 'message', 'reply', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function optometrist()
    {
        return $this->belongsTo(User::class, 'optometrist_id');
    }
}
