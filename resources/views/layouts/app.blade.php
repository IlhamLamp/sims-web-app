<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .login-container {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            max-width: 900px;
            border: none;
        }
        .illustration {
            background-color: #ff4d4d;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            color: white;
        }
        .illustration img {
            max-width: 70%;
        }
    </style>
</head>
<body>
    <div class="container-fluid login-container">
        <div class="card login-card shadow-lg">
            <div class="row g-0">
                <!-- Left Section -->
                <div class="col-md-6 p-5">
                    <h3 class="mb-4">SIMS Web App</h3>
                    <p class="mb-4">Masuk atau buat akun untuk memulai</p>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input type="email" name="email" class="form-control" placeholder="masukkan email anda" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" class="form-control" placeholder="masukkan password anda" required>
                        </div>
                        <button type="submit" class="btn btn-danger w-100">Masuk</button>
                    </form>
                </div>
                <!-- Right Section -->
                <div class="col-md-6 illustration">
                    <img src="/path/to/illustration.png" alt="Illustration">
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
