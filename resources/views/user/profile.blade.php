@extends('layouts.app')

@section('content')
    <div class="">
        <h3>{{ auth()->user()->name }}</h3>
        <form action="{{ route('profile')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="sport1" class="sr-only">Sport 1: </label>
                <input type="text" name="sport1" id="sport1" placeholder="1st sport"
                class="w-100 p-3 rounded border border-dark @error('sport1') border border-danger @enderror"
                value="{{ $profile->sport1 }}"/>

                @error('sport1')
                    <div class="text-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="sport2" class="sr-only">Sport 2: </label>
                <input type="text" name="sport2" id="sport2" placeholder="2nd sport"
                class="w-100 p-3 rounded border border-dark @error('sport2') border border-danger @enderror"
                value="{{ $profile->sport2 }}"/>

                @error('sport2')
                    <div class="text-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="sport3" class="sr-only">Sport 3: </label>
                <input type="text" name="sport3" id="sport3" placeholder="3rd sport"
                class="w-100 p-3 rounded border border-dark @error('sport3') border border-danger @enderror"
                value="{{ $profile->sport3 }}"/>

                @error('sport3')
                    <div class="text-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="bio" class="sr-only">Bio: </label>
                <textarea name="bio" id="bio" placeholder="Bio"
                class="w-100 p-3 rounded border border-dark @error('bio') border border-danger @enderror">{{ $profile->bio }}</textarea>

                @error('bio')
                    <div class="text-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="images[]" class="sr-only">Images</label>
                <input type="file" name="images[]" id="images[]" multiple accept=".jpg, .jpeg, .png"
                class="w-100 p-3 rounded border border-dark @error('images') border border-danger @enderror"/>

                @error('images')
                    <div class="text-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-danger w-100">
                Update
            </button>
        </form>
    </div>
@endsection