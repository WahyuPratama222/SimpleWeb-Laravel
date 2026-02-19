@extends('layouts.main')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark">Daftar Paket Membership</h2>
            <p class="text-muted">Daftar layanan gym yang tersedia saat ini.</p>
        </div>
        <a href="{{ route('memberships.create') }}" class="btn btn-primary px-4 shadow-sm">
            <i class="fas fa-plus me-2"></i> + Tambah Paket
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4" style="width: 15%">Gambar</th>
                            <th style="width: 25%">Nama Paket</th>
                            <th style="width: 20%">Harga</th>
                            <th style="width: 15%">Durasi</th>
                            <th class="text-center pe-4" style="width: 25%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($memberships as $item)
                        <tr>
                            <td class="ps-4">
                                @if($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}" class="rounded" style="width: 80px; height: 50px; object-fit: cover;">
                                @else
                                    <div class="rounded bg-light d-flex align-items-center justify-content-center text-muted" style="width: 80px; height: 50px; font-size: 10px;">
                                        No Image
                                    </div>
                                @endif
                            </td>
                            <td>
                                <span class="fw-bold text-dark d-block">{{ $item->name }}</span>
                                <small class="text-muted">{{ Str::limit($item->description, 50) }}</small>
                            </td>
                            <td>
                                <span class="text-success fw-bold">Rp {{ number_format($item->price, 0, ',', '.') }}</span>
                            </td>
                            <td>
                                <span class="badge bg-info text-dark">{{ $item->duration_in_days }} Hari</span>
                            </td>
                            <td class="text-center pe-4">
                                <div class="btn-group shadow-sm" role="group">
                                    <a href="{{ route('memberships.show', $item->id) }}" class="btn btn-sm btn-outline-info">Detail</a>
                                    <a href="{{ route('memberships.edit', $item->id) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                                    <form action="{{ route('memberships.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin mau hapus paket ini?')">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">Belum ada data paket membership.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
