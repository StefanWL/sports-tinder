@extends('layouts.app')

@section('content')
    <div class="row justify-content-end">
        <form class="col-1" action="{{ route('teams') }}" method="post">
            @csrf
            <button class="btn btn-danger fs-5 fw-bold" type="submit">+</button>
        </form>
    </div>
    @if($teams->count())
        @foreach($teams as $team)
        <a class="row text-decoration-none w-100" href="{{ route('team', $team) }}">
        @if($team->profile->photos->count())
            <div class="rounded-circle overflow-hidden col-3" style="height:50px; width:50px; background-size: cover; background-image: url('data:image/jpeg;base64,{{ $team->profile->photos->first()->image }}'"></div>
        @endif
            <div class="col-9">
                <h5 class="text-dark text-decoration-none">{{ $team->profile->name }}</h5>
            </div>
        </a>
        @endforeach
    @endif
@endsection