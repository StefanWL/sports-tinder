@extends('layouts.app')

@section('content')
    <a class="btn btn-danger" href="{{ route('dashboard') }}">Back to Dash</a>
    <div class="">
        <form action="{{ route('settings')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="searchForable" class="sr-only">Searching For: </label>
                <select name="searchForable" id="searchForable"
                class="w-100 p-3 rounded border border-dark @error('searchForable') border border-danger @enderror">
                    <option value="0" >{{ auth()->user()->name }}</option>
                    @foreach(auth()->user()->teams as $team)
                        <option value="{{ $team->id }}" {{($settings->searchForable and ($settings->searchForable->id == $team->id))  ? 'selected' : ''}}>{{ $team->profile->name}}</option>
                    @endforeach
                </select>
                @error('searchForable')
                    <div class="text-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="search_users" class="sr-only">Users: </label>
                <input type="checkbox" name="search_users" id="search_users"
                class="w-100 p-3 rounded border border-dark @error('search_users') border border-danger @enderror"
                value="1" @checked($settings->search_users)/>

                @error('search_users')
                    <div class="text-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="search_teams" class="sr-only">Teams: </label>
                <input type="checkbox" name="search_teams" id="search_teams"
                class="w-100 p-3 rounded border border-dark @error('search_teams') border border-danger @enderror"
                value="1" @checked($settings->search_teams)/>

                @error('search_teams')
                    <div class="text-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="sport" class="sr-only">Sport: </label>
                <input type="text" name="sport" id="sport" placeholder="Sport"
                class="w-100 p-3 rounded border border-dark @error('sport') border border-danger @enderror"
                value="{{ $settings->sport }}"/>

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