@extends('layouts.app')

@section('content')
    @foreach($conversations as $conversation)
    <a class="row text-decoration-none w-100"  href="{{ route('conversation', $conversation) }}">
    @if($conversation->profile->photos->count())
        <div class="rounded-circle overflow-hidden col-3" style="height:50px; width:50px; background-size: cover; background-image: url('data:image/jpeg;base64,{{ $conversation->profile->photos->first()->image }}'"></div>
    @endif
        <div class="col-9">
            <h5 class="text-dark text-decoration-none">{{ $conversation->profile->name }}</h5>
            @if($conversation->messages->last() !== null)
                <div class="text-muted">{{ $conversation->messages->last()->content }}</div>
            @endif
        </div>
    </a>
    @endforeach
@endsection