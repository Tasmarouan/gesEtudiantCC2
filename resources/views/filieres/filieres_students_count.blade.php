<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sectors with Student Count</title>
    <!-- Using Bootstrap 5 via CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" integrity="sha384-TX+1qDE3s5kRXjYv3s3gA6fbicGcvzogQIlLO1OPLxkeOdEU3YlvyEL+1n9bN6lP" crossorigin="anonymous">
    <!-- Adding custom styles -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        h1 {
            color: #28a745; /* Green color */
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
        }

        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
            text-align: center;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }

        .table tbody + tbody {
            border-top: 2px solid #dee2e6;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 123, 255, 0.05);
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0, 123, 255, 0.075);
        }

        .table-primary,
        .table-primary > th,
        .table-primary > td {
            background-color: #b8daff;
        }

        .btn-custom {
            color: #ffffff;
            background-color: #28a745; /* Green color */
            border: 2px solid #28a745; /* Green color */
            transition: background-color 0.3s, border-color 0.3s;
            margin: 5px;
            font-family: 'Arial', sans-serif;
            font-size: 1.2rem;
        }

        .btn-custom:hover {
            filter: brightness(90%);
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

        footer {
            margin-top: 40px;
            padding: 10px;
            background-color: #f8f9fa;
            text-align: center;
            border-top: 1px solid #dee2e6;
            color: #6c757d;
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
        <h1 class="mb-4">Sectors with Student Count</h1>
        <table class="table table-bordered table-striped extended-table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Filiere Name</th>
                    <th scope="col">Student Count</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($filieresWithCount as $filiere)
                    <tr>
                        <td>{{ $filiere->nom }}</td>
                        <td>{{ $filiere->etudiants_count }}</td>
                        <td class="action-buttons">
                            <a href="{{ route('filiere.show', $filiere->id) }}" class="btn btn-custom">
                                <i class="bi bi-eye"></i> View Details
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">No filieres available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-3">
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
