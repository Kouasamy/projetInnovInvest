    <x-app-layout>
        <div class="py-12">
            <!DOCTYPE html>
            <html lang="fr">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title>Administration</title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
                    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
                    crossorigin="anonymous">
            </head>

            <body>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="container" style="margin-top: 130px;">
                    <div class="container d-flex flex-column align-items-center">
                        <form method="POST" action="/ajouterProduit/traitement" enctype="multipart/form-data">
                            @csrf
                            <h1>AJOUTER UN PRODUIT</h1>
                            <label for="exampleInputNom1" class="form-label">Nom du produit</label>
                            <input type="text" class="form-control" id="exampleNom1" name="name"
                                value="{{ old('name') }}">

                            <div class="mb-3">
                                <label for="exampleInputEmail" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="5"
                                    value="{{ old('description') }}"></textarea>
                            </div>
                            <div class="mb-3 input-group">
                                <input type="number" class="form-control" id="exampleInputEmail" name="prix"
                                    placeholder="Prix" value="{{ old('prix') }}">
                                <span class="input-group-text">CFA</span>
                            </div>
                            <div class="mb-3">
                                <label for="images" class="form-label">Images du produit</label>
                                <input type="file" class="form-control" id="images" name="images[]" multiple>
                            </div>

                            <div class="mb-3">
                                <label for="categorie" class="form-label">Catégorie</label>
                                <select class="form-select" id="categorie" name="categorie_id">
                                    @foreach($categories as $categorie)
                                        <option value="{{ $categorie->id }}">{{ $categorie->nomCategorie }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="container d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary" name="submit">Ajouter</button>
                                <a href="/listeProduit" class="btn btn-danger"> Voir la liste des produits </a>
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
