@extends('layouts.app')

@section('content')
    <div class="d-flex pb-3 justify-content-between">
        @if($profile)
            <h1 class="heading-text fw-bold">{{ $profile->name }}</h1>
        @else
            <h1 class="heading-text fw-bold">Out of profiles</h1>
        @endif
        <a href="{{ route('settings') }}"><i class="icon fa-solid fa-gear fa-3x"></i></a>
    </div>
    @if($profile)
            @if($profile->photos->count())
                @foreach($profile->photos as $photo)
                <div>
                    <img class="image w-100" src="data:image/jpeg;base64,{{ $photo->image }}"/>
                </div>
                @endforeach
            @else
                <div>
                    <svg class="image w-100 placeholder-image" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M447.1 32h-384C28.64 32-.0091 60.65-.0091 96v320c0 35.35 28.65 64 63.1 64h384c35.35 0 64-28.65 64-64V96C511.1 60.65 483.3 32 447.1 32zM111.1 96c26.51 0 48 21.49 48 48S138.5 192 111.1 192s-48-21.49-48-48S85.48 96 111.1 96zM446.1 407.6C443.3 412.8 437.9 416 432 416H82.01c-6.021 0-11.53-3.379-14.26-8.75c-2.73-5.367-2.215-11.81 1.334-16.68l70-96C142.1 290.4 146.9 288 152 288s9.916 2.441 12.93 6.574l32.46 44.51l93.3-139.1C293.7 194.7 298.7 192 304 192s10.35 2.672 13.31 7.125l128 192C448.6 396 448.9 402.3 446.1 407.6z"/></svg>
                </div>
            @endif
            <div class="d-flex flex-wrap justify-content-start mt-3">
                <h5 class="me-2">Sports</h5>
                @if($profile->baseball)<span class="me-1 text-muted">Baseball</span>@endif
                @if($profile->basketball)<span class="me-1 text-muted">Basketball</span>@endif
                @if($profile->football)<span class="me-1 text-muted">Football</span>@endif
                @if($profile->hockey)<span class="me-1 text-muted">Hockey</span>@endif
                @if($profile->ultimate)<span class="me-1 text-muted">Ultimate</span>@endif
                @if($profile->soccer)<span class="me-1 text-muted">Soccer</span>@endif
                @if($profile->bowling)<span class="me-1 text-muted">Bowling</span>@endif
                @if($profile->sparring)<span class="me-1 text-muted">Sparring</span>@endif
                @if($profile->cycling)<span class="me-1 text-muted">Cycling</span>@endif
                @if($profile->running)<span class="me-1 text-muted">Running</span>@endif
                @if($profile->golf)<span class="me-1 text-muted">Golf</span>@endif
                @if($profile->tennis)<span class="me-1 text-muted">Tennis</span>@endif    
            </div>
            <div class="d-flex">
                @if($profile->profileable_type == "App\Models\User")
                    <h5 class="me-2">Teams</h5>
                @if($profile->profileable->teams->count())
                    @foreach($profile->profileable->teams as $team)
                    <a href="{{ route('profile', $team->profile) }}" class="pe-1 text-muted text-decoration-none">{{ $team->profile->name }} </a>
                    @endforeach
                @endif
            @elseif($profile->profileable_type == "App\Models\Team")
                <h5 class="me-2">Members</h5>
                @if($profile->profileable->members->count())
                    @foreach($profile->profileable->members as $member)
                    <a href="{{ route('profile', $member->profile) }}" class="pe-1 text-muted text-decoration-none">{{ $member->name }} </a>
                    @endforeach
                @endif
            @endif
        </div>
        <div class="d-flex flex-wrap">
            <h5 class="me-2">Bio</h5>
            <p class="text-muted">{{ $profile->bio }}</p>
        </div>
        <div class="row mt-5 justify-content-around">
            <form class="col-2" action="{{ route('decision', ['profile' => $profile, 'choice' => 'pass']) }}" method="post">
                @csrf
                <button class="icon-button" type="submit"><i class="icon-red fa-solid fa-circle-xmark fa-4x"></i></button>
            </form>
            <form class="col-2" action="{{ route('decision', ['profile' => $profile, 'choice' => 'challenge']) }}" method="post">
                @csrf
                <button class="icon-button" type="submit"><i class="icon-yellow fa-solid fa-bolt-lightning fa-4x"></i></button>
            </form>
            <form class="col-2" action="{{ route('decision', ['profile' => $profile, 'choice' => 'like']) }}" method="post">
                @csrf
                <button class="icon-button" type="submit"><i class="icon-green fa-solid fa-circle-check fa-4x"></i></button>
            </form>
        </div>
    @else
        <div>
            <svg class="image w-100 placeholder-image" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M447.1 32h-384C28.64 32-.0091 60.65-.0091 96v320c0 35.35 28.65 64 63.1 64h384c35.35 0 64-28.65 64-64V96C511.1 60.65 483.3 32 447.1 32zM111.1 96c26.51 0 48 21.49 48 48S138.5 192 111.1 192s-48-21.49-48-48S85.48 96 111.1 96zM446.1 407.6C443.3 412.8 437.9 416 432 416H82.01c-6.021 0-11.53-3.379-14.26-8.75c-2.73-5.367-2.215-11.81 1.334-16.68l70-96C142.1 290.4 146.9 288 152 288s9.916 2.441 12.93 6.574l32.46 44.51l93.3-139.1C293.7 194.7 298.7 192 304 192s10.35 2.672 13.31 7.125l128 192C448.6 396 448.9 402.3 446.1 407.6z"/></svg>
        </div>
    @endif
@endsection