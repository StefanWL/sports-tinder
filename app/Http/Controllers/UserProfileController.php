<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;

class UserProfileController extends Controller
{
    public function index()
    {
        $profile = auth()->user()->profile;
        return view('profile',[
            'profile' => $profile,
        ]);
    }

    public function profile(Profile $profile)
    {
        //dd($profile->profileable->conversations);
        return view('profile',[
            'profile' => $profile,
        ]);
    }

    public function detail()
    {
        $profile = auth()->user()->profile;
        return view('user.profile',[
            'profile' => $profile,
        ]);
    }

    public function edit(Request $request)
    {
        $profile = auth()->user()->profile;

        $profile->baseball = 0;
        $profile->basketball = 0;
        $profile->football = 0;
        $profile->hockey = 0;
        $profile->ultimate = 0;
        $profile->soccer = 0;
        $profile->bowling = 0;
        $profile->sparring = 0;
        $profile->cycling = 0;
        $profile->running = 0;
        $profile->golf = 0;
        $profile->tennis = 0;

        $profile->fill($request->all());
        $profile->name = auth()->user()->name;
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
