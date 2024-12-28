<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Favicons -->
    <link href="{{ asset('assets/admin/img/logo.png') }}" rel="icon">
    <link href="{{ asset('assets/admin/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            display: flex;
            max-width: 750px; /* Lebar total */
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }

        .login-image {
            width: 40%; /* Lebar area gambar */
            background: #E82561;
            display: flex;
            align-items: center;
            justify-content: center;
            border-top-left-radius: 8px;
            border-bottom-left-radius: 8px;
        }

        .login-image img {
            width: 80%; /* Ukuran logo */
            height: auto;
        }

        .login-form {
            width: 60%; /* Lebar area form */
            padding: 30px;
        }

        .login-form h2 {
            text-align: center;
            margin-bottom: 60px;
            font-weight: 500;
        }

        .form-control {
            border-radius: 20px;
        }

        .btn-login {
            width: 100%;
            border-radius: 20px;
            background-color: #E82561;
            color: #ffffff;
        }

        .icon-input {
            position: relative;
        }

        .icon-input input {
            padding-left: 40px;
        }

        .icon-input .icon {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
        }
    </style>
</head>
<body>

<div class="login-card">
    <!-- Gambar di Kiri -->
    <div class="login-image">
        <img src="{{ asset('assets/admin/img/logo.png') }}" alt="Logo">
    </div>

    <!-- Form Login di Kanan -->
    <div class="login-form">
        <h2>Login Admin</h2>

        <!-- Menampilkan pesan error -->
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.login') }}" method="POST">
            @csrf

            <!-- Username Field -->
            <div class="mb-3 icon-input">
                <i class="fas fa-user icon"></i>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{ old('username') }}" required>
            </div>

            <!-- Password Field -->
            <div class="mb-3 icon-input">
                <i class="fas fa-lock icon"></i>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>

            <!-- Button Login -->
            <button type="submit" class="btn btn-login">Login</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@include('sweetalert::alert') <!-- SweetAlert directive -->
</body>
</html>
