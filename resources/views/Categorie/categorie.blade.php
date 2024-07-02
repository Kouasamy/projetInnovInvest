
<x-app-layout>
    <div class="py-12">
        <!DOCTYPE html>
        <html lang="fr">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Categorie</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        </head>
        <body>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <div class="container" style="margin-top: 130px;">
                <div class="container d-flex flex-column align-items-center">
                    <form method="POST" action="/ajouterCategorie/traitement">
                        @csrf
                        <label for="exampleInputNom1" class="form-label">Nom de la Catégorie</label>
                        <input type="text" class="form-control" id="exampleNom1" name="nomCategorie"
                            aria-describedby="emailHelp" value="{{ old('nomCategorie') }}">

                        <div class="container p-4">

                            <button type="submit" class="btn btn-primary m-3" name="submit">Ajouter la categorie</button>
                            <a href="/listeCategorie" class="btn btn-danger m-3"> Voir la liste des categories </a>
                        </div>
                    </form>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
            </script>
        </body>

        </html>
    </div>
</x-app-layout>
