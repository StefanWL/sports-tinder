<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $this->validate($request, [
            'sport1' => 'nullable',
            'sport2' => 'nullable',
            'sport3' => 'nullable',
            'bio' => 'nullable',
            'images.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2047'
        ]);

        $profile = auth()->user()->profile;

        $profile->fill($request->all());
        $profile->save();

        $profile->photos()->delete();

        $images = $request->file('images');
        foreach ($images as $image)
        {
            $profile->photos()->create([
                'image' => base64_encode(file_get_contents($image->getRealPath()))
            ]);
        }

        return redirect('dashboard');
    }
}
