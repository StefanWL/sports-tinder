@extends('layouts.app')

@section('content')
    <a class="btn btn-danger" href="{{ route('settings') }}">Search Settings</a>
    @if($profile)
        <h3>{{ $profile->profileable->name }}</h3>
            @if($profile->photos->count())
                @foreach($profile->photos as $photo)
                <div>
                    <img class="w-100" src="data:image/jpeg;base64,{{ $photo->image }}"/>
                </div>
                @endforeach
            @else
                <div>
                    <img class="w-100" src="/img/placeholder-image.png"/>
                </div>
            @endif
        <h5><span>{{ $profile->sport1 }} </span><span>{{ $profile->sport2 }} </span><span>{{ $profile->sport3 }} </span></h5>
        <div>{{ $profile->bio }}</div>
        <div class="row mt-5 justify-content-around">
            <form class="col-2" action="{{ route('decision', ['profile' => $profile, 'choice' => 'pass']) }}" method="post">
                @csrf
                <button class="btn btn-danger rounded-pill fs-3 px-4 fw-bold" type="submit">x</button>
            </form>
            <form class="col-2" action="{{ route('decision', ['profile' => $profile, 'choice' => 'challenge']) }}" method="post">
                @csrf
                <button class="btn btn-warning text-white rounded-pill fs-3 px-4 fw-bold" type="submit">vs</button>
            </form>
            <form class="col-2" action="{{ route('decision', ['profile' => $profile, 'choice' => 'like']) }}" method="post">
                @csrf
                <button class="btn btn-success rounded-pill fs-3 px-4 fw-bold" type="submit">+</button>
            </form>
        </div>
    @else
        <h3>Out of profiles</h3>
        <div>
            <img class="w-100" src="/img/placeholder-image.png"/>
        </div>
    @endif
@endsection