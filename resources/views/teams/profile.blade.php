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
                    <label for="name" class="sr-only">Name: </label>
                    <input type="text" name="name" id="name" placeholder="Name"
                    class="w-100 p-3 rounded border border-dark @error('name') border border-danger @enderror"
                    value="{{ $profile->name }}"/>

                    @error('name')
                        <div class="text-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="sport1" class="sr-only">Sport: </label>
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
                    <label for="bio" class="sr-only">Bio: </label>
                    <textarea name="bio" id="bio" placeholder="Bio"
                    class="w-100 p-3 rounded border border-dark @error('bio') border border-danger @enderror"></textarea>

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
    </div>
@endsection