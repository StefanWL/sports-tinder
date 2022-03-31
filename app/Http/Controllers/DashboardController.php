<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{    
    public function index()
    {
        $user = auth()->user();

        $profile = Profile::whereNotExists(
            function ($query) use($user)
            {
                $query->select(DB::raw('user_id'))
                    ->from('decisions')
                    ->where('decisions.user_id', $user->id)
                    ->whereColumn('profiles.id', 'decisions.profile_id');
            }
        )->whereNot('profiles.user_id', $user->id)->first();

        return view('dashboard',[
            'profile' => $profile,
        ]);
    }
}
