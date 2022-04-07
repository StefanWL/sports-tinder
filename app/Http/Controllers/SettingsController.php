<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = auth()->user()->settings;

        return view('user.settings',[
            'settings' => $settings,
        ]);
    }

    public function edit(Request $request)
    {
        $settings = auth()->user()->settings;

        $settings->search_users = 0;
        $settings->search_teams = 0;

        $settings->fill($request->all());

        if($request->searchForable)
        {
            $team = Team::find($request->searchForable);
            $settings->searchForable()->associate($team);
        }
        elseif($settings->searchForable)
        {
            $settings->searchForable()->dissociate();
        }

        $settings->save();

        return redirect('dashboard');
    }
}
