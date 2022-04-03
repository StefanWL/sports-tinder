<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Decision extends Model
{
    use HasFactory;

    protected $fillable = [
        'choice'
    ];

    public function decisionable()
    {
        return $this->morphTo();
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
