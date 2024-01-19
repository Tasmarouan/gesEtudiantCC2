<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <style>
        body {
            background-color: #f8f9fa;
            color: #333;
            font-family: 'Arial', sans-serif;
        }

        .navbar {
            background-color: #28a745;
        }

        .navbar-brand,
        .navbar-nav .nav-link {
            color: #fff;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            border: none;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-title {
            color: #28a745;
        }

        .card-text {
            color: #555;
        }

        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #218838;
            border-color: #218838;
        }
    </style>
</head>

<body>
    @auth
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Welcome, {{ Auth::user()->name }}</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @endauth

    <div class="container mt-4">
        <h1 class="display-4">Initial Platform</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">List of Sectors</h5>
                        <p class="card-text">Directory of Sectors.</p>
                        <a href="{{ route('filiere.index') }}" class="btn btn-primary">See the list</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">List of Students</h5>
                        <p class="card-text">Register of registered students.</p>
                        <a href="{{ route('etudiants.index') }}" class="btn btn-primary">See the list</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Sectors with Students</h5>
                        <p class="card-text">Count of Students with in sectors.</p>
                        <a href="{{ route('filieres.withStudentCount') }}" class="btn btn-primary">See the list</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
