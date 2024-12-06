@extends('layout.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Daftar Siswa</h1>

    <!-- Menampilkan notifikasi SweetAlert jika ada session success -->
        @if(session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses!',
                    text: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 2000 // Notifikasi akan hilang setelah 2 detik
                });
            </script>
        @endif

    <!-- Tombol Tambah Siswa dengan animasi -->
    <a href="{{ route('siswa.create') }}" class="btn btn-success mb-4 add-btn">Tambah Siswa</a>

    <form action="{{ route('siswa.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari Siswa..." value="{{ request('search') }}">
            <button class="btn btn-dark" type="submit">Cari</button>
        </div>
    </form>

    <!-- Table Daftar Siswa -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>No</th> <!-- Kolom untuk nomor urut -->
                    <th>Nama</th>
                    <th>NIS</th>
                    <th>Kelas</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswa as $item)
                    <tr>
                        <!-- ID Terurut secara manual -->
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->nis }}</td>
                        <td>{{ $item->kelas }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('siswa.edit', $item->id) }}" class="btn btn-warning btn-sm mx-2 action-btn">Edit</a>
                                <form action="{{ route('siswa.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm mx-2 action-btn">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


<!-- Custom CSS untuk animasi -->
<style>
    /* Animasi untuk tombol Aksi */
    .action-btn {
        transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
    }

    .action-btn:hover {
        transform: scale(1.1);
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        background-color: #e0a800;
    }

    /* Animasi untuk tombol Tambah Siswa */
    .add-btn {
        transition: transform 0.3s ease, background-color 0.4s ease, box-shadow 0.3s ease, transform 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .add-btn::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 300%;
        height: 300%;
        background-color: rgba(255, 255, 255, 0.1);
        transition: width 0.4s ease, height 0.4s ease, top 0.4s ease, left 0.4s ease;
        border-radius: 50%;
        transform: translate(-50%, -50%);
    }

    .add-btn:hover::before {
        width: 0;
        height: 0;
        top: 50%;
        left: 50%;
    }

    .add-btn:hover {
        transform: scale(1.1) rotate(10deg); /* Memberikan efek perputaran */
        background-color: #28a745; /* Warna hijau lebih cerah */
        box-shadow: 0px 15px 30px rgba(0, 0, 0, 0.2); /* Bayangan lebih besar dan dramatis */
    }

    .add-btn:active {
        transform: scale(1) rotate(0deg); /* Mengembalikan tombol ke ukuran semula saat ditekan */
        box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1); /* Bayangan lebih kecil saat ditekan */
    }

</style>
<!-- Memasukkan script SweetAlert2 untuk menampilkan notifikasi pop-up -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection
