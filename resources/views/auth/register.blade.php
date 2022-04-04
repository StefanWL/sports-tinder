@extends('layouts.app')

@section('content')
    <div>
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="name" class="sr-only">Name</label>
                <input type="text" name="name" id="name" placeholder="Your name" class="w-100 p-3 rounded border border-dark @error('name') border border-danger @enderror" value="{{ old('name') }}">

                @error('name')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="sr-only">Email</label>
                <input type="text" name="email" id="email" placeholder="Your email" class="w-100 p-3 rounded border border-dark @error('email') border border-danger @enderror" value="{{ old('email') }}">

                @error('email')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="sr-only">Password</label>
                <input type="password" name="password" id="password" placeholder="Choose a password" class="w-100 p-3 rounded border border-dark @error('password') border border-danger @enderror" value="">

                @error('password')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="sr-only">Password again</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repeat your password" class="w-100 p-3 rounded border border-dark @error('password_confirmation') border border-danger @enderror" value="">

                @error('password_confirmation')
                    <div class="text-danger mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div>
                <button type="submit" class="btn btn-danger w-100">Register</button>
            </div>
        </form>
        <a class="btn btn-danger w-100 mt-5" href="{{ route('login') }}" class="p-3">Login</a>
    </div>
@endsection