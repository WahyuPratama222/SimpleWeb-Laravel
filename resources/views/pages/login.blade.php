@extends('layout.app')

@section('title', 'Login')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h2 class="card-title text-center mb-4">Login</h2>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ url('/login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <input type="email" name="email" placeholder="Email" class="form-control" value="{{ old('email') }}">
            </div>
            <div class="mb-3">
                <input type="password" name="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-dark w-100">Login</button>
        </form>

        <p class="text-center mt-3">
            Don't have an account? <a href="{{ url('/register') }}">Register</a>
        </p>
    </div>
</div>
@endsection

