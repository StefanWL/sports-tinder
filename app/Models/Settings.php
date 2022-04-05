<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $fillable = [
        'sport',
    ];

    protected $casts = [
        'search_users' => 'boolean',
        'search_teams' => 'boolean',
    ];

    public function searchForable()
    {
        return $this->morphTo();
    }
}
