<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <div class="container">
            <h1>Mes commandes</h1>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($commandes->isEmpty())
                <p>Vous n'avez pas encore passé de commandes.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>

                            <th>Nom</th>
                            <th>Ville</th>
                            <th>Commune</th>
                            <th>Téléphone</th>
                            <th>Lieu de livraison</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($commandes as $commande)
                            <tr>

                                <td>{{ $commande->name }}</td>
                                <td>{{ $commande->ville }}</td>
                                <td>{{ $commande->commune }}</td>
                                <td>{{ $commande->telephone }}</td>
                                <td>{{ $commande->livraison }}</td>
                                <td>{{ $commande->created_at->format('d/m/Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{ url('/') }}" class="btn btn-primary">Revenir sur le site</a>
            @endif
    </div>
</div>
</body>

</html>
