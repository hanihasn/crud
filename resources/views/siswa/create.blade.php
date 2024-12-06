@extends('layout.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Tambah Siswa</h1>

    <form action="{{ route('siswa.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control form-control-sm" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="nis" class="form-label">NIS</label>
            <input type="text" class="form-control form-control-sm" id="nis" name="nis" required>
        </div>
        <div class="mb-3">
            <label for="kelas" class="form-label">Kelas</label>
            <input type="text" class="form-control form-control-sm" id="kelas" name="kelas" required>
        </div>

        <!-- Tombol Kembali dan Simpan (Posisi Kiri) -->
        <div class="d-flex justify-content-start gap-3">
            <button type="submit" class="btn btn-success btn-sm">Simpan</button>
            <a href="{{ route('siswa.index') }}" class="btn btn-secondary btn-sm">
                <i class="bi bi-arrow-left-circle"></i> Kembali
            </a>
        </div>
    </form>
</div>

<!-- Custom CSS untuk animasi dan desain -->
<style>
    /* Tombol Kembali */
    .btn-secondary {
        transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
        padding: 8px 16px;
        font-size: 14px;
        border-radius: 5px;
    }

    .btn-secondary:hover {
        transform: scale(1.1);
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        background-color: #6c757d; /* Light grey */
    }

    /* Tombol Simpan */
    .btn-success {
        transition: transform 0.3s ease, background-color 0.3s ease, box-shadow 0.3s ease;
        padding: 8px 16px;
        font-size: 14px;
        border-radius: 5px;
    }

    .btn-success:hover {
        transform: scale(1.1);
        background-color: #218838;
        box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.2);
    }

    .btn-success:active {
        transform: scale(1) rotate(5deg);
    }

    /* Form Styling */
    .form-control {
        border-radius: 8px;
        padding: 8px 15px;
        font-size: 14px;
        box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.1);
    }

    .form-control:focus {
        box-shadow: inset 0 0 8px rgba(0, 123, 255, 0.6);
        border-color: #007bff;
    }

    /* Headline Styling */
    h1 {
        color: #333;
        font-size: 2rem;
        font-weight: 600;
    }
</style>
@endsection
