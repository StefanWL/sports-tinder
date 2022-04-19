<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\User;

class TeamController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $teams = $user->teams;

        return view('teams.teams', [
            'teams' => $teams,
        ]);
    }

    public function create(Request $request, User $user = null)
    {
        $team = Team::create();
        $team->members()->attach(auth()->user()->id);

        $profile = $team->profile()->create();

        $conversation = $team->conversations()->create();
        $conversation->participants()->attach(auth()->user()->id);

        $profile->name = "Untitled Team";
        if($user)
        {
            $team->members()->attach($user->id);
            $conversation->participants()->attach($user->id);
        }

        return redirect()->route('team', $team);
    }

    public function detail(Team $team)
    {
        $profile = $team->profile;
        return view('teams.profile',[
            'profile' => $profile,
        ]);
    }

    public function edit(Request $request, Team $team)
    {
        $profile = $team->profile;

        $profile->fill($request->all());
        $profile->save();

        $profile->photos()->delete();

        $images = $request->file('images');
        if($images)
        {
            foreach ($images as $image)
            {
                $profile->photos()->create([
                    'image' => base64_encode(file_get_contents($image->getRealPath()))
                ]);
            }
        }
        return redirect()->route('profile', $profile);
    }
}
