@extends('layouts.app')

@section('content')
        <a href="{{ route('profile', $profile) }}" class="row text-decoration-none w-100 justify-content-start conversation align-items-center py-2">
        @if($profile->photos->count())
            <div class="rounded-circle overflow-hidden ms-3 col-2" style="height:50px; width:50px; background-size: cover; background-image: url('data:image/jpeg;base64,{{ $profile->photos->first()->image }}'"></div>
        @endif
        <div class="col-10 d-flex justify-content-between">
            <div class="col-9">
                <h5 class="heading-text text-decoration-none mb-0">{{ $profile->name }}</h5>
            </div>
            @if($profile->profileable_type == "App\Models\User")
            <form class="col-1" action="/teams/{{$profile->profileable->id}}" method="post">
                    @csrf
                    <button class="icon-button" title="Form team with {{ $profile->name }}" type="submit"><i class="icon fa-solid fa-user-plus fa-2x"></i></button>
            </form>
            @endif
        </div>
        </a>
        <div id="message-holder">
            @foreach($conversation->messages as $message)
                @if($message->user->id === auth()->user()->id)
                <div class="mt-1 d-flex justify-content-end">
                    <span class="message py-2 px-3 rounded-pill text-end">{{ $message->content }}</span>
                </div>
                @else
                <div class="mt-1 d-flex">
                    <span class="bg-light rounded-pill text-black py-2 px-3 rounded">{{ $message->content }}</span>
                </div>
                @endif
            @endforeach
        </div>
    <form action="{{ route('conversation', $conversation) }}" method="post">
        @csrf
        <div class="d-flex justify-content-between mt-4">
            <input class="message-bar p-3 rounded border border-dark" name="content" id="content" placeholder="Say something..." autofocus></input>
            <button class="icon-button" type="submit"><i class="icon fa-solid fa-paper-plane fa-2x"></i></button>
        </div>
    </form>
    <script>var user = {{ auth()->user()->id }}</script>
    <script>var conversation = {{ $conversation->id }}</script>
    <script>
        setInterval(refreshMessages, 1000, user, conversation);
        function refreshMessages(user, conversation) {
            fetch(`/conversations/refresh/${conversation}/${user}`)
            .then(response => response.text())
            .then(data => document.getElementById('message-holder').innerHTML = data);
        }
    </script>
@endsection