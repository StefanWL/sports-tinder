<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'about',
        'sport',
    ];

    public function members()
    {
        return $this->belongsToMany(User::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function decisionsGiven()
    {
        return $this->hasMany(Decision::class);
    }

    public function decisionsRecieved()
    {
        return $this->hasMany(Decision::class);
    }    
    
    public function conversations()
    {
        return $this->belongsToMany(Conversation::class);
    }

}
