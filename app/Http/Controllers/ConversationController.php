<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conversation;
use App\Models\User;

class ConversationController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $conversations = $user->conversations;

        foreach($conversations as $conversation)
        {
            if($conversation->teams->count())
            {
                $profile = $conversation->teams->first()->profile;
            }
            else
            {
                $profile = $conversation->participants->reject(function ($participant) use($user) {
                    return $participant->id === $user->id;
                })->first()->profile;
            }

            $conversation->profile = $profile;
        }

        return view('conversations.conversations', [
            'conversations' => $conversations,
        ]);
    }
    public function detail(Conversation $conversation)
    {
        $user = auth()->user();

        if($conversation->teams->count())
        {
            $profile = $conversation->teams->first()->profile;
        }
        else
        {
            $profile = $conversation->participants->reject(function ($participant) use($user) {
                return $participant->id === $user->id;
            })->first()->profile;
        }

        return view('conversations.messages', [
            'conversation' => $conversation,
            'profile' => $profile,
        ]);
    }
    public function create(Conversation $conversation, Request $request)
    {
        $message = $conversation->messages()->create([
            'content' => $request->content,
        ]);
        $message->user()->associate(auth()->user());
        $message->save();

        return redirect()->route('conversation', $conversation);
    }
    public function refresh(Conversation $conversation, User $user)
    {
        if($conversation->teams->count())
        {
            $profile = $conversation->teams->first()->profile;
        }
        else
        {
            $profile = $conversation->participants->reject(function ($participant) use($user) {
                return $participant->id === $user->id;
            })->first()->profile;
        }

        return view('conversations.refresh', [
            'conversation' => $conversation,
            'profile' => $profile,
        ]);
    }
}
