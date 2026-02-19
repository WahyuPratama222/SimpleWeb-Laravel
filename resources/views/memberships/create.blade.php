@extends('layouts.main')

@section('content')
<div class="container py-5">
    <div class="card">
        <div class="card-header"><h4>Tambah Paket Membership</h4></div>
        <div class="card-body">
            <form action="{{ route('memberships.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label>Nama Paket</label>
                    <input type="text" name="name" class="form-control" placeholder="Contoh: Paket Gold" required>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Harga (IDR)</label>
                        <input type="number" name="price" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Durasi (Hari)</label>
                        <input type="number" name="duration_in_days" class="form-control" placeholder="30" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label>Deskripsi</label>
                    <textarea name="description" class="form-control" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label>Foto Paket</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Simpan Paket</button>
                <a href="{{ route('memberships.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
