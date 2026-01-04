@extends('layout.templateAdmin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="/welcome" class="btn btn-sm btn-secondary shadow-sm">Kembali</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pengaturan Profil</h6>
        </div>
        <div class="card-body">
            <form action="/profile/update" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                </div>

                <hr>
                <div class="alert alert-info small">
                    Kosongkan bagian password di bawah jika tidak ingin mengganti password lama.
                </div>

                <div class="mb-3">
                    <label class="form-label">Password Baru</label>
                    <input type="password" name="password" class="form-control" placeholder="Minimal 6 karakter">
                </div>

                <div class="mb-3">
                    <label class="form-label">Konfirmasi Password Baru</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password baru">
                </div>

                <button type="submit" class="btn btn-primary shadow">Simpan Perubahan Profil</button>
            </form>
        </div>
    </div>
</div>
@endsection