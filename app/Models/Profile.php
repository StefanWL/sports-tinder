<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'bio',
        'sport1',
        'sport2',
        'sport3',
    ];

    public function profileable()
    {
        return $this->morphTo();
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function decisions()
    {
        return $this->hasMany(Decision::class);
    } 
}
