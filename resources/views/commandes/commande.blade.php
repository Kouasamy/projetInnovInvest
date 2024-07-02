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

<body class="text-white" style="background-image: url('{{ asset('Images/pageAccueil.png') }}'); height: 100vh; background-repeat: no-repeat; background-size: cover">
    <div class="container" style="{{"margin-top: 130px;"}}">
        <div class="container d-flex flex-column align-items-center">
            <h1>Passer la commande</h1>

            <form action="{{ route('commande.store') }}" method="POST">
                @csrf
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <!-- Ajouter les champs nécessaires -->
                <div class="form-group">
                    <label for="name">Nom & prenom</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="address">Ville</label>
                    <input type="text" name="ville" id="ville" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="address">Commune</label>
                    <input type="text" name="commune" id="commune" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="phone">Téléphone</label>
                    <input type="text" name="telephone" id="telephone" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="address">Lieu de livraison</label>
                    <input type="text" name="livraison" id="livraison" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success mt-3">Commander</button>
                <a href="{{ url('/') }}" class="btn btn-primary mt-3">Revenir sur le site</a>
            </form>
        </div>
    </div>
</body>

</html>
