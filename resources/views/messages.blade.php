@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <img height="50px" src="data:image/jpeg;base64,{{ $partner->photos->first()->image }}"/>
            {{ $partner->user->name }}
        </div>
        @foreach($conversation->messages as $message)
            @if($message->user->id === auth()->user()->id)
                <div class="user-message">{{ $message->content }}</div>
            @else
                <div>{{ $message->content }}</div>
            @endif
        @endforeach
    </div>
    <form action="{{ route('conversation', $conversation) }}" method="post">
        @csrf
        <input name="content" id="content" placeholder="Say something..." ></input>
        <button type="submit">Send</button>
    </form>
@endsection