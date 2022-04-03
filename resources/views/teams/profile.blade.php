@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 p-6">
            <h3>{{ $profile->name }}</h3>
            @if($profile->profileable->members->count())
                @foreach($profile->profileable->members as $member)
                <p>{{ $member->name }}</p>
                @endforeach
            @endif
            <form action="{{ route('team', $profile->profileable)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="sport1" class="sr-only">Spor: </label>
                    <input type="text" name="sport1" id="sport1" placeholder="1st sport"
                    class="bg-white text-navy w-full p-4 @error('sport1') border-pink @enderror"
                    value="{{ $profile->sport1 }}"/>

                    @error('sport1')
                        <div class="text-pink mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="bio" class="sr-only">Bio: </label>
                    <textarea name="bio" id="bio" placeholder="Bio"
                    class="bg-white text-navy w-full p-4 @error('bio') border-pink @enderror">
                    {{ $profile->bio }}</textarea>

                    @error('bio')
                        <div class="text-pink mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="images[]" class="sr-only">Images</label>
                    <input type="file" name="images[]" id="images[]" multiple
                    class="bg-white text-navy w-full p-4 @error('images') border-pink @enderror"/>

                    @error('images')
                        <div class="text-pink mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="bg-pink hover:bg-navy text-cream font-medium w-full">
                    Update
                </button>
            </form>
        </div>
    </div>
@endsection