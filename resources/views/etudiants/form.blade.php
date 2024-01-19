<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Form</title>
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
            color: #28a745;
        }

        .form-label {
            color: #555;
        }

        .form-control {
            border-color: #28a745;
        }

        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
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
        <h1>Student Form</h1>

        @if(isset($etudiant))
            <form action="{{ route('etudiants.update', $etudiant->id) }}" method="POST">
                @method('PUT')
                <input type="hidden" name="id" value="{{ $etudiant->id }}">
        @else
            <form action="{{ route('etudiants.store') }}" method="POST">
        @endif
                @csrf

                <!-- Student fields -->
                <div class="mb-3">
                    <label for="nom" class="form-label">Last Name:</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="{{ isset($etudiant) ? $etudiant->nom : '' }}">
                </div>

                <div class="mb-3">
                    <label for="prenom" class="form-label">First Name:</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" value="{{ isset($etudiant) ? $etudiant->prenom : '' }}">
                </div>

                <div class="mb-3">
                    <label for="sexe" class="form-label">Gender:</label>
                    <select class="form-select" id="sexe" name="sexe">
                        <option value="homme" {{ isset($etudiant) && $etudiant->sexe === 'homme' ? 'selected' : '' }}>Male</option>
                        <option value="femme" {{ isset($etudiant) && $etudiant->sexe === 'femme' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="filiere_id" class="form-label">Major:</label>
                    <select class="form-select" id="filiere_id" name="filiere_id">
                        @foreach($filieres as $filiere)
                            <option value="{{ $filiere->id }}" @if(isset($etudiant) && $etudiant->filiere_id == $filiere->id) selected @endif>{{ $filiere->nom }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="user[name]" class="form-label">User Name:</label>
                    <input type="text" class="form-control" id="user[name]" name="user[name]" value="{{ isset($etudiant->user) ? $etudiant->user->name : '' }}" placeholder="User Name">
                </div>

                <div class="mb-3">
                    <label for="user[email]" class="form-label">User Email:</label>
                    <input type="email" class="form-control" id="user[email]" name="user[email]" value="{{ isset($etudiant->user) ? $etudiant->user->email : '' }}" placeholder="User Email">
                </div>

                <div class="mb-3">
                    <label for="user[password]" class="form-label">User Password:</label>
                    <input type="password" class="form-control" id="user[password]" name="user[password]" placeholder="User Password">
                </div>

                <div class="mb-3 d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">{{ isset($etudiant) ? 'Update' : 'Add' }}</button>
                    <a href="{{ route('etudiants.index') }}" class="btn btn-secondary">Return to the list of Students</a>
                </div>
            </form>
    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
