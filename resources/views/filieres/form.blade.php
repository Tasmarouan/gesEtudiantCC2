<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Fields Form</title>
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
    <div class="container mt-3">
        <p>Welcome, {{ Auth::user()->name }}</p>
    </div>
    @endauth

    <div class="container mt-5">
        <h1>Major Form</h1>

        @if(isset($filiere))
            <form action="{{ route('filiere.update', $filiere->id) }}" method="POST">
                @method('PUT')
                <input type="hidden" name="id" value="{{ $filiere->id }}">
        @else
            <form action="{{ route('filiere.store') }}" method="POST">
        @endif
                @csrf
                <div class="mb-3">
                    <label for="nom" class="form-label">Field Name:</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="{{ isset($filiere) ? $filiere->nom : '' }}">
                </div>

                <button type="submit" class="btn btn-primary">{{ isset($filiere) ? 'Update' : 'Add' }}</button>
            </form>

        <a href="{{ route('filiere.index') }}" class="mt-3 btn btn-secondary">Back to the list of Fields</a>
    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
