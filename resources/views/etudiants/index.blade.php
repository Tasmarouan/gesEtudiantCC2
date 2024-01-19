<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Students List</title>
    <!-- Using Bootstrap 5 via CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" integrity="sha384-TX+1qDE3s5kRXjYv3s3gA6fbicGcvzogQIlLO1OPLxkeOdEU3YlvyEL+1n9bN6lP" crossorigin="anonymous">
    <!-- Adding custom styles -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .navbar {
            background-color: #28a745;
        }

        .navbar-brand {
            color: #ffffff !important;
            font-weight: bold;
            font-size: 2rem;
            text-decoration: none;
        }

        .navbar-brand img {
            max-height: 40px; /* Adjust as needed */
            margin-right: 10px;
        }

        .navbar-nav .nav-link {
            color: #ffffff !important;
        }

        h1 {
            color: #28a745;
            font-size: 2.5rem;
        }

        .table th,
        .table td {
            text-align: center;
            vertical-align: middle;
            font-size: 1.2rem;
        }

        .table-striped tbody tr:hover {
            background-color: #e0e0e0;
        }

        .btn-custom,
        .btn-details,
        .btn-modifier,
        .btn-supprimer {
            color: #ffffff;
            transition: background-color 0.3s, border-color 0.3s;
            margin: 5px;
            font-family: 'Arial', sans-serif;
            font-size: 1.2rem;
        }

        .btn-custom i,
        .btn-details i,
        .btn-modifier i,
        .btn-supprimer i {
            margin-right: 5px;
        }

        .btn-custom:hover,
        .btn-details:hover,
        .btn-modifier:hover,
        .btn-supprimer:hover {
            filter: brightness(90%);
        }

        .btn-custom,
        .btn-details,
        .btn-modifier {
            background-color: #28a745;
            border: 2px solid #28a745;
        }

        .btn-custom-add {
            background-color: #28a745;
            border: 2px solid #28a745;
            transition: background-color 0.3s, border-color 0.3s;
            margin: 5px;
            font-family: 'Arial', sans-serif;
        }

        .btn-custom-add:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        .btn-supprimer {
            background-color: #dc3545;
            border: 2px solid #dc3545;
        }

        .btn-supprimer:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        .btn-secondary {
            background-color: #6c757d;
            border: 2px solid #6c757d;
            transition: background-color 0.3s, border-color 0.3s;
            margin: 5px;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }

        .mt-3 {
            margin-top: 20px;
        }

        footer {
            margin-top: 40px;
            padding: 10px;
            background-color: #f8f9fa;
            text-align: center;
            border-top: 1px solid #dee2e6;
        }

        /* Adding the "centered" class to center the list */
        .centered {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        /* Adjusting the width of the container */
        .extended-container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Adjusting the width of the table */
        .extended-table {
            width: 100%;
            overflow-x: auto;
        }
    </style>
</head>

<body>
    @auth
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                Welcome, {{ Auth::user()->name }}
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @endauth

    <!-- Adding the "centered" class to center the list -->
    <div class="container mt-4 centered extended-container">
        <h1 class="mb-4">Students List</h1>
        <table class="table table-bordered table-striped extended-table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Last Name</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $etudiant)
                    <tr>
                        <td>{{ $etudiant->nom }}</td>
                        <td>{{ $etudiant->prenom }}</td>
                        <td class="action-buttons">
                            <a href="{{ route('etudiants.show', $etudiant->id) }}" class="btn btn-details btn-custom">
                                <i class="bi bi-info-circle"></i> Details
                            </a>
                            <a href="{{ route('etudiants.edit', $etudiant->id) }}" class="btn btn-modifier btn-custom">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('etudiants.destroy', $etudiant->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-supprimer">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-3">
            <a href="{{ route('etudiants.create') }}" class="btn btn-success btn-custom-add">
                <i class="bi bi-plus"></i> Add Student
            </a>
            <a href="{{ route('index') }}" class="btn btn-secondary">
                <i class="bi bi-house-door"></i> Back to Homepage
            </a>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 XYZ University. All rights reserved. | Contact us: contact@university-xyz.com</p>
    </footer>

    <!-- Using Bootstrap 5 JS via CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-bsm1K7AU1LGAos3W/r83GXuZR7qjQd+2w9T9A1qdg8YsPPvOJdLG1eB9I9dBRAD" crossorigin="anonymous"></script>
</body>

</html>
