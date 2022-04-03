@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            Conversations
        </div>

        @foreach($conversations as $conversation)
        @if($conversation->partner->photos->count())
            <img height="50px" src="data:image/jpeg;base64,{{ $conversation->partner->photos->first()->image }}"/>
        @endif
            <a href="{{ route('conversation', $conversation) }}">{{ $conversation->partner->profileable->name }}</a>
            @if($conversation->messages->last() !== null)
                <div>{{ $conversation->messages->last()->content }}</div>
            @endif
        @endforeach
    </div>
@endsection