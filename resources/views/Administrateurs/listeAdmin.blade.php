<x-app-layout>
    <div class="py-12">
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=*, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Document</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
                crossorigin="anonymous">
        </head>

        <body>

            <div class="container text-center p-4">
                <div class="row">
                    <div class="col s12">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h1>Liste des Administrateurs</h1>
                        <a href="/admin" class="btn btn-primary"> Ajouter un Administrateur </a>
                        <hr>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nom de L'administrateur</th>
                                    <th scope="col">email</th>
                                    <th scope="col">Modification & Suppression</th
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $admin)
                                    <tr>
                                        <td>{{ $admin->nom }}</td>
                                        <td>{{ $admin->email }}</td>
                                        <td>
                                            <a href="/updateAdmin-admin/{{$admin->id}}"
                                                class="btn btn-info">Modifier</a>
                                            <a href="/delete-admin/{{$admin->id}}" class="btn btn-danger">Supprimer</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
            </script>
        </body>

        </html>
    </div>
</x-app-layout>