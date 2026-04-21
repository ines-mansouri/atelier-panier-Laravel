<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Boutique Laravel</title>
</head>
<body class="bg-light">
    <nav class="navbar navbar-dark bg-primary mb-4 shadow">
        <div class="container">
            <a class="navbar-brand" href="/">Mon Atelier Laravel</a>
            <a href="{{ route('cart.index') }}" class="btn btn-light">
                Panier ({{ count((array) session('cart')) }})
            </a>
        </div>
    </nav>
    <div class="container">
        @if(session('success')) 
            <div class="alert alert-success">{{ session('success') }}</div> 
        @endif
        @yield('content')
    </div>
</body>
</html>