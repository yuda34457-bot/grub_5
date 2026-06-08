<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EyeTest extends Model
{
    protected $fillable = ['user_id', 'type', 'status', 'answers'];

    protected $casts = [
        'answers' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function testResult()
    {
        return $this->hasOne(TestResult::class);
    }
}
