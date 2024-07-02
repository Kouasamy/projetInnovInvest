<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('StyleCss/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid contenue">
        <div class="row">
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('Images/logoInnov.png') }}"
                            style="{{ 'height:80px' }}" alt=""></a>
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
                                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}"
                                        style="color: black">Accueil</a>
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
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
                    <div class="container">
                        <div class="dropdown categorie">
                            <button class="btn" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                aria-expanded="false" onclick="window.location.href='/boutique'">
                                Produits <!-- Texte ou icône avant le dropdown -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                    fill="currentColor" class="bi bi-list" style="{{ 'font-weight: bold' }}"
                                    viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
                                </svg>
                            </button>
                        </div>




                        <div class="sidebar offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                            aria-labelledby="offcanvasNavbarLabel">
                            <div class="offcanvas-header">
                                <button type="button" class=" btn-close shasow-none" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <div class=" menus d-flex flex-column p-4 flex-lg-row p-lg-0">
                                <ul class="navbar-nav justify-content-center align-items-center fs-5 flex-grow-1 pe-3">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}"
                                            id="menu" style="{{ 'color: black' }}">Accueil</a>
                                    </li>
                                    <li class="nav-item mx-2">
                                        <a class="nav-link" id="menu" href="{{ route('boutique') }}"
                                            style="{{ 'color: black' }}">Boutique</a>
                                    </li>
                                    <li class="nav-item mx-2">
                                        <a class="nav-link" id="menu" href="{{ route('apropos') }}"
                                            style="{{ 'color: black' }}">A propos</a>
                                    </li>

                                </ul>
                                <div class="d-flex flex-column flex-lg-row gap-4">
                                    <a href="#" class="help d-flex justify-content-center align-items-center"
                                        style="{{ 'color: white' }}"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="currentColor"
                                            class="bi bi-question-circle-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.496 6.033h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286a.237.237 0 0 0 .241.247m2.325 6.443c.61 0 1.029-.394 1.029-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94 0 .533.425.927 1.01.927z" />
                                        </svg></a>
                                    <a href="{{ route('panier') }}" class="help">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            style="{{ 'color: white' }}" fill="currentColor" class="bi bi-cart3"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                                        </svg>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>


    </div>
    <div class="container-fluid d-flex justify-content-center align-items-center home-section"
        style="background-image: url('{{ asset('Images/pageAccueil.png') }}'); height: 100vh;  background-repeat: no-repeat; background-size: cover">

        <div class="content-wrapper d-flex justify-content-evenly flex-column align-items-center ml-3"
            style="{{ 'color: white' }}">
            <h1>PRÊT A FRANCHIR</h1> <br>
            <h3>LE PAS VERS</h3> <br>
            <h1>LA TECHNOLOGIE <span class="highlight-text" style="{{ 'background-color: red' }}">IVOIRIENNE ?</span>
            </h1>
            <br>
            <Button class="acheter"><a class="nav-link" id="menu" href="{{ route('boutique') }}"> Achète
                    maintenant !</a></Button>
        </div>
        <div class="d-flex justify-content-center flex-column align-items-center" id="image">
            <img src="{{ asset('Images/ordi1.png') }}"
                style="{{ 'height:570px', 'width: 570px', 'background-color: black' }}" alt="">
        </div>

    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>
