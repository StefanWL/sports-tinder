@extends('layouts.app')

@section('content')
        <div class="row text-decoration-none w-100 justify-content-between mb-3">
        @if($partner->photos->count())
            <div class="rounded-circle overflow-hidden col-2" style="height:50px; width:50px; background-size: cover; background-image: url('data:image/jpeg;base64,{{ $partner->photos->first()->image }}'"></div>
        @endif
            <div class="col-9">
                <h5 class="text-dark text-decoration-none">{{ $partner->profileable->name }}</h5>
            </div>
            <form class="col-1" action="{{ route('teams', $partner->profileable) }}" method="post">
                    @csrf
                    <button class="btn btn-danger fs-5 fw-bold" title="Form team with {{ $partner->profileable->name }}" type="submit">+</button>
            </form>
        </div>
        @foreach($conversation->messages as $message)
                @if($message->user->id === auth()->user()->id)
                <div class="mt-1 d-flex justify-content-end">
                    <span class="bg-danger text-white p-2 rounded text-end">{{ $message->content }}</span>
                </div>
                @else
                <div class="mt-1 d-flex">
                    <span class="bg-secondary text-white p-2 rounded">{{ $message->content }}</span>
                </div>
                @endif
        @endforeach
    <form action="{{ route('conversation', $conversation) }}" method="post">
        @csrf
        <div class="row justify-content-around mt-4">
            <input class="col-9 p-3 rounded border border-dark " name="content" id="content" placeholder="Say something..." ></input>
            <button class="col-2 btn btn-danger fs-4 px-4 fw-bold" type="submit">></button>
        </div>
    </form>
@endsection