@extends('layouts.app')

@section('content')
    <div class="d-flex">
        <a class="me-4" href="{{ route('dashboard') }}"><i class="icon fa-solid fa-arrow-left fa-3x"></i></a>
        <h1 class="heading-text fw-bold pb-3">Settings</h1>
    </div>
    <div class="">
        <form action="{{ route('settings')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="fs-5" for="searchForable">Searching As</label>
                <select name="searchForable" id="searchForable"
                class="w-100 p-3 rounded border border-dark @error('searchForable') border border-danger @enderror">
                    <optgroup label="Myself">
                        <option value="0" >{{ auth()->user()->name }}</option>
                    </optgroup>
                    <optgroup label="My Teams">
                    @foreach(auth()->user()->teams as $team)
                        <option value="{{ $team->id }}" {{($settings->searchForable and ($settings->searchForable->id == $team->id))  ? 'selected' : ''}}>{{ $team->profile->name}}</option>
                    @endforeach
                    </optgroup>
                </select>
                @error('searchForable')
                    <div class="text-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="fs-5">Search For</div>   
            <div class="mb-4 d-flex flex-wrap justify-content-start">
                <div class="checkbutton-container me-4">
                    <input type="checkbox" name="search_users" id="search_users" class="d-none" value="1" @checked($settings->search_users)/>
                    <label for="search_users" class="btn rounded-pill checkbutton heading-text">Users</label>
                </div>
                <div class="checkbutton-container me-4">
                    <input type="checkbox" name="search_teams" id="search_teams" class="d-none" value="1" @checked($settings->search_teams)/>
                    <label for="search_teams" class="btn rounded-pill checkbutton heading-text">Teams</label>
                </div>
            </div>
            <div class="fs-5">Sport</div>   
            <div class="mb-4 d-flex flex-wrap justify-content-start">
                <div class="checkbutton-container me-4 mb-2">
                    <input type="radio" name="sport" id="baseball" class="d-none" value="baseball" @checked($settings->sport == "baseball")/>
                    <label for="baseball" class="btn rounded-pill checkbutton heading-text">Baseball</label>
                </div>
                <div class="checkbutton-container me-4 mb-2">
                    <input type="radio" name="sport" id="basketball" class="d-none" value="basketball" @checked($settings->sport == "basketball")/>
                    <label for="basketball" class="btn rounded-pill checkbutton heading-text">Basketball</label>
                </div>
                <div class="checkbutton-container me-4 mb-2">
                    <input type="radio" name="sport" id="football" class="d-none" value="football" @checked($settings->sport == "football")/>
                    <label for="football" class="btn rounded-pill checkbutton heading-text">Football</label>
                </div>
                <div class="checkbutton-container me-4 mb-2">
                    <input type="radio" name="sport" id="hockey" class="d-none" value="hockey" @checked($settings->sport == "hockey")/>
                    <label for="hockey" class="btn rounded-pill checkbutton heading-text">Hockey</label>
                </div>
                <div class="checkbutton-container me-4 mb-2">
                    <input type="radio" name="sport" id="ultimate" class="d-none" value="ultimate" @checked($settings->sport == "ultimate")/>
                    <label for="ultimate" class="btn rounded-pill checkbutton heading-text">Ultimate</label>
                </div>
                <div class="checkbutton-container me-4 mb-2">
                    <input type="radio" name="sport" id="soccer" class="d-none" value="soccer" @checked($settings->sport == "soccer")/>
                    <label for="soccer" class="btn rounded-pill checkbutton heading-text">Soccer</label>
                </div>
                <div class="checkbutton-container me-4 mb-2">
                    <input type="radio" name="sport" id="bowling" class="d-none" value="bowling" @checked($settings->sport == "bowling")/>
                    <label for="bowling" class="btn rounded-pill checkbutton heading-text">Bowling</label>
                </div>
                <div class="checkbutton-container me-4 mb-2">
                    <input type="radio" name="sport" id="sparring" class="d-none" value="sparring" @checked($settings->sport == "sparring")/>
                    <label for="sparring" class="btn rounded-pill checkbutton heading-text">Sparring</label>
                </div>
                <div class="checkbutton-container me-4 mb-2">
                    <input type="radio" name="sport" id="cycling" class="d-none" value="cycling" @checked($settings->sport == "cycling")/>
                    <label for="cycling" class="btn rounded-pill checkbutton heading-text">Cycling</label>
                </div>
                <div class="checkbutton-container me-4 mb-2">
                    <input type="radio" name="sport" id="running" class="d-none" value="running" @checked($settings->sport == "running")/>
                    <label for="running" class="btn rounded-pill checkbutton heading-text">Running</label>
                </div>
                <div class="checkbutton-container me-4 mb-2">
                    <input type="radio" name="sport" id="golf" class="d-none" value="golf" @checked($settings->sport == "golf")/>
                    <label for="golf" class="btn rounded-pill checkbutton heading-text">Golf</label>
                </div>
                <div class="checkbutton-container me-4 mb-2">
                    <input type="radio" name="sport" id="tennis" class="d-none" value="tennis" @checked($settings->sport == "tennis")/>
                    <label for="tennis" class="btn rounded-pill checkbutton heading-text">Tennis</label>
                </div>
            </div>
            <button type="submit" class="btn fs-5 rounded-pill purple heading-text w-100">
                Save
            </button>
        </form>
    </div>
@endsection