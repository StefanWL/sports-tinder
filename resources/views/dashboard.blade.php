@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            Dashboard
        </div>
        @if($profile)
            <div>{{ $profile->profileable->name }}</div>
            <div>{{ $profile->sport1 }}</div>
            <div>{{ $profile->sport2 }}</div>
            <div>{{ $profile->sport3 }}</div>
            <div>{{ $profile->bio }}</div>
            @foreach($profile->photos as $photo)
                <img src="data:image/jpeg;base64,{{ $photo->image }}"/>
            @endforeach
            <div>
                <form action="{{ route('decision', ['profile' => $profile, 'choice' => 'pass']) }}" method="post">
                    @csrf
                    <button type="submit">Pass</button>
                </form>
                <form action="{{ route('decision', ['profile' => $profile, 'choice' => 'challenge']) }}" method="post">
                    @csrf
                    <button type="submit">Challenge</button>
                </form>
                <form action="{{ route('decision', ['profile' => $profile, 'choice' => 'like']) }}" method="post">
                    @csrf
                    <button type="submit">Like</button>
                </form>
            </div>
        @else
            <div>Out of profiles</div>
        @endif
    </div>
@endsection