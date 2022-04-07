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
        if($user->settings->searchForable)
        {
            $decider = $user->settings->searchForable;
        }
        else
        {
            $decider = $user;
        }

        $decision = $decider->decisions()->create([
            'choice' => $choice,
        ]);

        $decision->profile()->associate($profile);
        $decision->save();

        if(Decision::where('decisionable_id', $profile->profileable->id)
                    ->where('profile_id', $decider->profile->id)
                    ->where('choice', $choice)
                    ->whereNot('choice', 'pass')->exists()
        )
        {
            if($decision->decisionable_type == 'App\Models\Team' and $profile->profileable_type == 'App\Models\Team')
            {
                $conversation = Conversation::create([
                    'choice' => $choice,
                ]);
                $conversation->teams()->attach($decider->id);
                $conversation->teams()->attach($profile->profileable->id);

                foreach($decider->members as $member)
                {
                    $conversation->participants()->attach($member->id);
                }
                foreach($profile->profileable->members as $member)
                {
                    $conversation->participants()->attach($member->id);
                }
                
            }
            elseif($decision->decisionable_type == 'App\Models\Team')
            {
                $conversation = $decider->conversations()->first();
                $conversation->participants()->attach($profile->profileable->id);
                $decider->members()->attach($profile->profileable->id);
            }
            elseif($profile->profileable_type == 'App\Models\Team')
            {
                $conversation = $profile->profileable->conversations()->first();
                $conversation->participants()->attach($decider->id);
                $profile->profileable->members()->attach($decider->id);
            }
            else
            {
                $conversation = Conversation::create([
                    'choice' => $choice,
                ]);
                $conversation->participants()->attach($decider->id);
                $conversation->participants()->attach($profile->profileable->id);    
            }

            return redirect()->route('conversation', $conversation->id);
        }
        return redirect('dashboard');
    }
}
