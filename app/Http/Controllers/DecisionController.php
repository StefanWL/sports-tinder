<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Decision;
use App\Models\Conversation;

class DecisionController extends Controller
{
    public function create(Profile $profile, string $choice)
    {
        $user = auth()->user();

        $decision = $user->decisions()->create([
            'choice' => $choice,
        ]);

        $decision->profile()->associate($profile);
        $decision->save();

        if(Decision::where('user_id', $profile->user->id)
                    ->where('profile_id', $user->profile->id)
                    ->where('choice', $choice)
                    ->whereNot('choice', 'pass')->exists()
        )
        {
            $conversation = Conversation::create([
                'choice' => $choice,
            ]);
            $conversation->participants()->attach($user->id);
            $conversation->participants()->attach($profile->user->id);
            return redirect()->route('conversation', $conversation->id);
        }
        return redirect('dashboard');
    }
}
