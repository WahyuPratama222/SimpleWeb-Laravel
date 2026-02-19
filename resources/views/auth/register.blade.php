@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h2 class="card-title text-center mb-4">Register</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('/register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <input type="text" name="name" placeholder="Name" class="form-control" value="{{ old('name') }}">
            </div>
            <div class="mb-3">
                <input type="email" name="email" placeholder="Email" class="form-control" value="{{ old('email') }}">
            </div>
            <div class="mb-3">
                <input type="password" name="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-dark w-100">Register</button>
        </form>

        <p class="text-center mt-3">
            Already have an account? <a href="{{ url('/login') }}">Login</a>
        </p>
    </div>
</div>
@endsection
