@extends('layouts.app')

@section('content')
    <a class="btn btn-danger" href="{{ route('dashboard') }}">Back to Dash</a>
    <div class="">
        <form action="{{ route('settings')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="searchingFor" class="sr-only">Searching For: </label>
                <input type="text" name="searchingFor" id="searchingFor" placeholder="Choose team or yourself"
                class="w-100 p-3 rounded border border-dark @error('searchingFor') border border-danger @enderror"
                value="{{ $settings->searchingFor }}"/>

                @error('searchingFor')
                    <div class="text-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="users" class="sr-only">Users: </label>
                <input type="text" name="users" id="users" placeholder="Y/n"
                class="w-100 p-3 rounded border border-dark @error('users') border border-danger @enderror"
                value="{{ $settings->users }}"/>

                @error('users')
                    <div class="text-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="teams" class="sr-only">Teams: </label>
                <input type="text" name="teams" id="teams" placeholder="Y/n"
                class="w-100 p-3 rounded border border-dark @error('sport3') border border-danger @enderror"
                value="{{ $settings->teams }}"/>

                @error('teams')
                    <div class="text-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="sport" class="sr-only">Sport: </label>
                <textarea name="sport" id="sport" placeholder="Sport"
                class="w-100 p-3 rounded border border-dark @error('sport') border border-danger @enderror">{{ $profile->bio }}</textarea>

                @error('sport')
                    <div class="text-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-danger w-100">
                Save
            </button>
        </form>
    </div>
@endsection