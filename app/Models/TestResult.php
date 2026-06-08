<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestResult extends Model
{
    protected $fillable = ['eye_test_id', 'user_id', 'left_eye_score', 'right_eye_score', 'diagnosis', 'recommendation', 'is_printed', 'printed_at'];

    protected $casts = [
        'is_printed' => 'boolean',
        'printed_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function eyeTest()
    {
        return $this->belongsTo(EyeTest::class);
    }
}
