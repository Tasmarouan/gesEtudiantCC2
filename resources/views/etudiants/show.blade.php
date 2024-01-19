<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
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
            color: #28a745; /* Green color for the heading */
        }

        .btn {
            margin-top: 10px;
        }

        .btn-secondary,
        .btn-warning {
            background-color: #28a745; /* Green color for "Edit" and "Delete" buttons */
            border-color: #28a745;
        }

        .btn-danger {
            background-color: #dc3545; /* Red color for the "Delete" button */
            border-color: #dc3545;
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
        <h1>Student Details</h1>
        <p><strong>Name:</strong> {{ $etudiant->nom }}</p>
        <p><strong>First Name:</strong> {{ $etudiant->prenom }}</p>
        <p><strong>Gender:</strong> {{ $etudiant->sexe }}</p>
        <p><strong>Major:</strong> {{ $etudiant->filiere->nom }}</p>

        <a href="{{ route('etudiants.index') }}" class="btn btn-secondary">Back to the list of Students</a>

        <a href="{{ route('etudiants.edit', $etudiant->id) }}" class="btn btn-warning">Edit</a>
        
        <form action="{{ route('etudiants.destroy', $etudiant->id) }}" method="post" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
