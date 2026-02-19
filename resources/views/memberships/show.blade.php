@extends('layouts.main')

@section('content')
<div class="container py-5">
    <div class="card mx-auto" style="max-width: 600px;">
        @if($membership->image)
            <img src="{{ asset('storage/' . $membership->image) }}" class="card-img-top" alt="{{ $membership->name }}">
        @endif
        <div class="card-body text-center">
            <h2 class="card-title">{{ $membership->name }}</h2>
            <h4 class="text-primary">Rp {{ number_format($membership->price, 0, ',', '.') }}</h4>
            <p class="badge bg-info">Durasi: {{ $membership->duration_in_days }} Hari</p>
            <hr>
            <p class="card-text text-start">{{ $membership->description }}</p>
            <hr>
            <div class="d-flex justify-content-between">
                <a href="{{ route('memberships.index') }}" class="btn btn-secondary">Kembali</a>
                <a href="{{ route('memberships.edit', $membership->id) }}" class="btn btn-warning">Edit Data</a>
            </div>
        </div>
    </div>
</div>
@endsection
