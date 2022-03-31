@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 p-6">
            <h3>{{ auth()->user()->name }}</h3>
            <form action="{{ route('profile')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="sport1" class="sr-only">Sport 1: </label>
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
                    <label for="sport2" class="sr-only">Sport 2: </label>
                    <input type="text" name="sport2" id="sport2" placeholder="2nd sport"
                    class="bg-white text-navy w-full p-4 @error('sport2') border-pink @enderror"
                    value="{{ $profile->sport2 }}"/>

                    @error('sport2')
                        <div class="text-pink mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="sport3" class="sr-only">Sport 3: </label>
                    <input type="text" name="sport3" id="sport3" placeholder="3rd sport"
                    class="bg-white text-navy w-full p-4 @error('sport3') border-pink @enderror"
                    value="{{ $profile->sport3 }}"/>

                    @error('sport3')
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