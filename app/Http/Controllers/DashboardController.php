<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{    
    public function index()
    {
        $user = auth()->user();

        if($user->profile->name == null)
        {
            return redirect('user/edit');
        }

        $settings = $user->settings;

        if($settings->sport == null)
        {
            return redirect('settings');
        }
        if($settings->searchForable)
        {
            $decider = $settings->searchForable;
            $type = $settings->search_forable_type;
        }
        else
        {
            $decider = $user;
            $type = 'App\Models\User';
        }
        $id = $decider->id;


        $typeRaw = strtolower(explode('\\', $type)[2]);
        $typeRaw == 'team' ? $nType = 'App\Models\User' : $nType = 'App\Models\Team';
        $nTypeRaw = strtolower(explode('\\', $nType)[2]);

        $profile = Profile::whereNotExists(
            function ($query) use($id, $type)
            {
                $query->select(DB::raw('decisionable_id'))
                    ->from('decisions')
                    ->where('decisions.decisionable_id', $id)
                    ->where('decisions.decisionable_type', $type)
                    ->whereColumn('profiles.id', 'decisions.profile_id');
            }
        )->whereNot([
            ['profiles.profileable_id', '=', $id],
            ['profiles.profileable_type', '=', $type]
        ])->whereNotExists(
            function ($query) use($id, $typeRaw, $nType, $nTypeRaw)
            {
                $query->select(DB::raw('id'))
                    ->from('team_user')
                    ->where('team_user.'.$typeRaw.'_id', $id)
                    ->where('profiles.profileable_type', $nType)
                    ->whereColumn('profiles.profileable_id', 'team_user.'.$nTypeRaw.'_id');
            }
        )->where('profiles.'.$settings->sport, "1")->where(
            function ($query) use($settings)
            {
                if(!$settings->search_users)
                {
                    $query->whereNot('profiles.profileable_type', 'App\Models\User');
                }
                if(!$settings->search_teams)
                {
                    $query->whereNot('profiles.profileable_type', 'App\Models\Team');
                }
            }
        )->first();

        return view('dashboard',[
            'profile' => $profile,
        ]);
    }
}
