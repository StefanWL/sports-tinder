<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conversation;

class ConversationController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $conversations = $user->conversations;

        foreach($conversations as $conversation)
        {
            $partner = $conversation->participants->reject(function ($participant) use($user) {
                return $participant->id === $user->id;
            })->first()->profile;
            $conversation->partner = $partner;
        }

        return view('conversations', [
            'conversations' => $conversations,
        ]);
    }
    public function detail(Conversation $conversation)
    {
        $user = auth()->user();
        $partner = $conversation->participants->reject(function ($participant) use($user) {
            return $participant->id === $user->id;
        })->first()->profile;

        return view('messages', [
            'conversation' => $conversation,
            'partner' => $partner,
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
}
