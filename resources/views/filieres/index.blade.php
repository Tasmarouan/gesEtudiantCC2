<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Fields</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <style>
        body {
            background-color: #f5f5f5;
            color: #333;
            font-family: 'Arial', sans-serif;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 50px;
        }

        h1 {
            color: #28a745; /* Couleur verte pour le titre */
        }

        .list-group-item {
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            margin-top: 10px;
            color: #28a745; /* Couleur verte pour les noms de filières */
        }

        .list-group-item:hover {
            background-color: #f8f9fa;
        }

        .btn {
            margin-top: 10px;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
    </style>
</head>
<body>
    @auth
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Welcome, {{ Auth::user()->name }}</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @endauth

    <div class="container mt-4">
        <h1>List of Fields</h1>

        <ul class="list-group">
            @foreach($filieres as $filiere)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{ route('filiere.show', $filiere->id) }}">
                        {{ $filiere->nom }}
                    </a>
                    <div class="btn-group" role="group">
                        <a href="{{ route('filiere.show', $filiere->id) }}" class="btn btn-success">Details</a>
                        <a href="{{ route('filiere.edit', $filiere->id) }}" class="btn btn-success">Edit</a>
                        <form action="{{ route('filiere.destroy', $filiere->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>

        <a href="{{ route('filiere.create') }}" class="btn btn-success">Add a Field</a>
        <a href="{{ route('index') }}" class="btn btn-secondary">Back to Home Page</a>
    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
