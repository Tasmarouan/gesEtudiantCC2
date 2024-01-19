<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <style>
        body {
            background-color: #f8f9fa;
            color: #495057;
            font-family: 'Arial', sans-serif;
        }

        .container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 50px;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }

        h1 {
            color: #28a745;
        }

        p {
            color: #6c757d;
            font-size: 16px;
            margin-bottom: 30px;
        }

        .form-label {
            color: #28a745;
        }

        .form-control {
            border: 1px solid #28a745;
            border-radius: 4px;
        }

        .form-control:focus {
            border-color: #218838;
            box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
        }

        .form-check-input:checked {
            background-color: #28a745;
            border-color: #28a745;
        }

        .form-check-label {
            color: #28a745;
        }

        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
            width: 100%;
            padding: 10px;
        }

        .btn-primary:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Welcome to Our Platform</h1>
        <p>Log in to access your account and explore our services.</p>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control" required autofocus>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input id="password" type="password" name="password" class="form-control" required autocomplete="current-password">
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" name="remember" id="remember" class="form-check-input">
                <label for="remember" class="form-check-label">Remember me</label>
            </div>

            <div>
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
