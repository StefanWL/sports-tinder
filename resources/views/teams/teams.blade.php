@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between pb-3">
        <h1 class="heading-text fw-bold">My Teams</h1>
        <form class="d-flex justify-content-end" action="{{ route('teams') }}" method="post">
            @csrf
            <button class="icon-button" type="submit"><i class="icon fa-solid fa-plus fa-3x"></i></button>
        </form>
    </div>
    @if($teams->count())
        @foreach($teams as $team)
        <a class="row text-decoration-none w-100 conversation align-items-center py-2" href="{{ route('profile', $team->profile) }}">
        @if($team->profile->photos->count())
            <div class="rounded-circle overflow-hidden ms-3 col-3" style="height:50px; width:50px; background-size: cover; background-image: url('data:image/jpeg;base64,{{ $team->profile->photos->first()->image }}'"></div>
        @else
            <svg class="image rounded-circle placeholder-image" style="height:50px; width:50px;" fill="black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M447.1 32h-384C28.64 32-.0091 60.65-.0091 96v320c0 35.35 28.65 64 63.1 64h384c35.35 0 64-28.65 64-64V96C511.1 60.65 483.3 32 447.1 32zM111.1 96c26.51 0 48 21.49 48 48S138.5 192 111.1 192s-48-21.49-48-48S85.48 96 111.1 96zM446.1 407.6C443.3 412.8 437.9 416 432 416H82.01c-6.021 0-11.53-3.379-14.26-8.75c-2.73-5.367-2.215-11.81 1.334-16.68l70-96C142.1 290.4 146.9 288 152 288s9.916 2.441 12.93 6.574l32.46 44.51l93.3-139.1C293.7 194.7 298.7 192 304 192s10.35 2.672 13.31 7.125l128 192C448.6 396 448.9 402.3 446.1 407.6z"/></svg>
        @endif
            <div class="col-9">
                <h5 class="heading-text text-decoration-none mb-0">{{ $team->profile->name }}</h5>
                @foreach($team->members as $member)
                    <span class="text-muted pe-1">{{ $member->profile->name }}</span>
                @endforeach
            </div>
        </a>
        @endforeach
    @endif
@endsection