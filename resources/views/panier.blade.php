<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('StyleCss/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Panier</title>
</head>
<body>
    <div class="row">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}"><img
                        src="{{ asset('Images/logoInnov.png') }}" style="{{ 'height:80px' }}"
                        alt=""></a>
                <button class="navbar-toggler shadow-none border-0 " type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="sidebar offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <button type="button" class="btn-close shasow-none" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body d-flex flex-column p-4 flex-lg-row p-lg-0">
                        <ul class="navbar-nav justify-content-evenly align-items-center fs-5 flex-grow-1 pe-3">
                            <li class="nav-item d-lg-none">
                                <a class="nav-link active" aria-current="page" href="{{ route('home') }}" style="color: black">Accueil</a>
                            </li>
                            <li class="nav-item mx-2 d-lg-none">
                                <a class="nav-link" href="{{ route('boutique') }}" style="color: black">Boutique</a>
                            </li>
                            <li class="nav-item mx-2 d-lg-none">
                                <a class="nav-link" href="{{ route('apropos') }}" style="color: black">A propos</a>
                            </li>

                            <form class="container-fluid mt-2">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="recherche"
                                        placeholder="Saisir ce que vous cherchez" aria-label="Username"
                                        aria-describedby="basic-addon1">
                                    <span class="input-group-text" id="search"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" style="{{ 'color: white' }}" class="bi bi-search"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                        </svg></span>
                                </div>
                            </form>
                        </ul>
                        <div class="d-flex flex-row flex-lg-row gap-3 connexion">
                            @auth
                                @if (auth()->user()->role === 'client')
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" style="{{"border: none"}}">
                                            {{ auth()->user()->name }}
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Mon Profil</a></li>
                                            <li><a class="dropdown-item"href="{{ route('commandes.index') }}" style="{{"text-decoration: none"}}">Mes commandes</a></li>
                                            <li>
                                                <form action="{{ route('logout') }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="dropdown-item">Déconnexion</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                @elseif (auth()->user()->role === 'admin' || auth()->user()->role === 'super admin')
                                    <div class="d-flex justify-content-end">
                                        <a href="{{ url('/dashboard') }}" class="btn me-2">Tableau de bord</a>
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <span>/</span>
                                            <button type="submit" class="btn me-2">Déconnexion</button>
                                        </form>
                                    </div>
                                @endif
                            @else
                                <button class="btn me-2" type="button">
                                    <a href="{{ route('register') }}" class="text-decoration-none">S'inscrire</a>
                                    <span style="height: 20px; width: 20px">/</span>
                                    <a href="{{ route('login') }}" class="text-decoration-none">Se connecter</a>
                                </button>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <div class="container mt-5">
        <h1 class="text-center">Votre Panier</h1>
        <div class="row">
            @if($panierItems->isEmpty())
                <p class="text-center">Votre panier est vide.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Produit</th>
                            <th>Quantité</th>
                            <th>Prix</th>
                            <th>Prix de ou des produits</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($panierItems as $item)
                            <tr>
                                <td>{{ $item->produit->name }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>{{ $item->price }} CFA</td>
                                <td>{{ $item->qty * $item->price }} CFA</td>
                                <td>
                                    <form action="{{ route('panier.supprimer', ['id' => $item->produit_id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-end">
                    <h4>Total : {{ $total }} CFA</h4>
                </div>
            @endif
        </div>
         <!-- Bouton Passer la commande -->
    <div class="text-right mt-4">
        <a href="{{ route('commande.create') }}" class="btn btn-primary">Passer la commande</a>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
