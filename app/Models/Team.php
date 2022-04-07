<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
    ];

    public function members()
    {
        return $this->belongsToMany(User::class);
    }

    public function profile()
    {
        return $this->morphOne(Profile::class, 'profileable');
    }

    public function searchers()
    {
        return $this->morphMany(Settings::class, 'searchForable');
    }

    public function decisions()
    {
        return $this->morphMany(Decision::class, 'decisionable');
    }    
    
    public function conversations()
    {
        return $this->belongsToMany(Conversation::class);
    }

}
