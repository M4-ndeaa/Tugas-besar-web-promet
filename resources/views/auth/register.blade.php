<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Butik Dea Slayy - Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #4e73df; /* Warna biru dasar SB Admin */
            height: 100vh;
            display: flex;
            align-items: center;
        }
        .card {
            border-radius: 1rem;
            border: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow-lg my-5">
                    <div class="card-body p-5">
                        
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">REGISTRASI !</h1>
                        </div>

                        @if($errors->any())
                            <div class="alert alert-danger">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        <form action="/register" method="POST">
                            @csrf
                            @method('POST')
                            
                            <div class="mb-3">
                                <label class="form-label small">Nama</label>
                                <input type="text"  id="inputName"   name="name" class="form-control" style="border-radius: 50px;" placeholder="Masukan Nama" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label small">Email </label>
                                <input type="email"  id="inputEmail"   name="email" class="form-control" style="border-radius: 50px;" placeholder="Masukan Email" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label small">Password</label>
                                <input type="password" id="inputPassword" name="password" class="form-control" style="border-radius: 50px;" placeholder="Masukan Password" required>
                            </div>

                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn btn-primary" style="border-radius: 50px; padding: 10px;">
                                    Simpan
                                </button>
                            </div>
                        </form>

                        <hr>
                        <div class="text-center">
                            <a class="small" href="/">Login !</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>