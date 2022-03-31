<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = [
        'choice'
    ];

    public function participants()
    {
        return $this->belongsToMany(User::class);
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
