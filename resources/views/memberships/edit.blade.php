@extends('layouts.main')

@section('content')
<div class="container py-5">
    <div class="card">
        <div class="card-header"><h4>Edit Paket: {{ $membership->name }}</h4></div>
        <div class="card-body">
            <form action="{{ route('memberships.update', $membership->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Nama Paket</label>
                    <input type="text" name="name" class="form-control" value="{{ $membership->name }}" required>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Harga (IDR)</label>
                        <input type="number" name="price" class="form-control" value="{{ $membership->price }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Durasi (Hari)</label>
                        <input type="number" name="duration_in_days" class="form-control" value="{{ $membership->duration_in_days }}" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label>Deskripsi</label>
                    <textarea name="description" class="form-control" rows="3">{{ $membership->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label>Foto Baru (Kosongkan jika tidak ingin ganti)</label>
                    <input type="file" name="image" class="form-control">
                    @if($membership->image)
                        <small class="text-muted">Gambar saat ini: {{ $membership->image }}</small>
                    @endif
                </div>
                <button type="submit" class="btn btn-success">Update Paket</button>
                <a href="{{ route('memberships.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
