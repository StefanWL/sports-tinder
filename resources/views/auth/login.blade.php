@extends('layouts.app')

@section('content')
    <div>
        @if (session('status'))
            <div class="text-center">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="post">
            @csrf

            <div class="mb-4">
                <label for="email" class="sr-only">Email</label>
                <input type="text" name="email" id="email" placeholder="Your email" class="w-100 p-3 rounded border border-dark @error('email') border border-danger @enderror" value="{{ old('email') }}">

                @error('email')
                    <div class="text-danger mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="sr-only">Password</label>
                <input type="password" name="password" id="password" placeholder="Choose a password" class="w-100 p-3 rounded border border-dark @error('password') border border-danger @enderror" value="">

                @error('password')
                    <div class="text-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="mr-2">
                    <label for="remember">Remember me</label>
                </div>
            </div>

            <div>
                <button type="submit" class="btn btn-danger w-100">Login</button>
            </div>
        </form>
        <a class="btn btn-danger mt-5 w-100" href="{{ route('register') }}">Register</a>
    </div>
@endsection