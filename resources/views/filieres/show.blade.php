<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Fields Details</title>
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
            color: #007bff;
        }

        .btn {
            margin-top: 10px;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
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
    <div class="container mt-3">
        <p>Welcome, {{ Auth::user()->name }}</p>
    </div>
    @endauth
    
    <div class="container mt-5">
        <p> <a href="{{ route('logout') }}" class="btn btn-secondary">Logout</a> </p>
        <h1>Fields Details</h1>

        <p><strong>Name:</strong> {{ $filieres->nom }}</p>

        <a href="{{ route('filiere.index') }}" class="btn btn-success">Back to List of Majors</a>
        <a href="{{ route('filiere.edit', $filieres->id) }}" class="btn btn-warning">Edit</a>
        
        <!-- Using a form for deletion for security reasons -->
        <form action="{{ route('filiere.destroy', $filieres->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this major?')">Delete</button>
        </form>
    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
