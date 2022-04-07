<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $fillable = [
        'sport',
        'search_users',
        'search_teams',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function searchForable()
    {
        return $this->morphTo();
    }
}
