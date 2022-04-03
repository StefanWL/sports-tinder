@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg">
            Teams
            <form action="{{ route('teams') }}" method="post">
                @csrf
                <button type="submit">New Team</button>
            </form>
        </div>

        @if($teams->count())
            @foreach($teams as $team)
                @if($team->profile->photos->count())
                    <img height="50px" src="data:image/jpeg;base64,{{ $team->profile->photos->first()->image }}"/>
                @endif
                <a href="{{ route('team', $team) }}">{{ $team->profile->name }}</a>
            @endforeach
        @endif
    </div>
@endsection