    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=*, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible"
            content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('StyleCss/style.css') }}">
        <title>Document</title>
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
        <div class="container-fluid d-flex justify-content-center align-items-center flex-column"
            style="background-image: url('{{ asset('Images/pageAccueil.png') }}'); background-repeat: no-repeat; background-size: cover">
            <div class="container justify-content-evenly d-flex flex-column align-items-center" style="height: 60vh;">
                <div class="row w-100">
                    <div class="col text-center text-lg-left" style="color: white;">
                        <h1>QUI SOMME NOUS ?</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex justify-content-center grandCadre">
                        <div class="cadre p-4">
                            <p>Innov Invest est une entreprise spécialisée dans la conception d’ordinateurs, tablettes et
                                objets électroniques en tout genre.
                                créé la première marque de d'ordinateurs (laptop et Destop) made in Côte d’Ivoire, sous le
                                nom de « i computer ». Elle se
                                distingue par sa capacité à personnaliser la coque des laptops avec des motifs africains,
                                son autonomie de 8 heures minimum
                                grâce à une batterie innovante, ainsi que son clavier à la fois AZERTY et QWERTY.
                                Depuis la création de notre entreprise, celle-ci a remporté plusieurs distinctions dont la
                                plus récente est : <br>
                                <span>Le Prix de la CGECI (Confédération Générale des Entreprises de la Côte d’Ivoire) pour
                                    le Business Plan Compétition en janvier
                                    2024.</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <footer>
                <div class="container-fluid text-white">
                    <div class="row d-flex justify-content-center align-items-center">
                        <div class="d-flex flex-column align-items-center justify-content-center col-md-4">
                            <div class="col">
                                <a href="#" class="btn helped">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="{{ 'color: white' }}" width="24"
                                        height="24" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z" />
                                    </svg>
                                </a>
                            </div>
                            <div class="col text-white">
                                <h3 class="p-3">Email</h3>
                            </div>
                            <div class="col d-flex flex-column text-white align-items-center p-3">
                                <span>infos@innovinvest.pro</span>
                                <span>sav@innovshop.ci</span>
                                <span>svcecommercial@innovshop.ci</span>
                            </div>
                        </div>
                        <div class="d-flex flex-column align-items-center justify-content-center col-md-4">
                            <div class="col">
                                <a href="#" class="btn helped">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="{{ 'color: white' }}" width="24"
                                        height="24" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                                    </svg>
                                </a>
                            </div>
                            <div class="col text-white">

                                <h3 class="p-3">Telephone</h3>
                            </div>
                            <div class="col d-flex flex-column text-white align-items-center p-3">
                                <span>Cel : (+225) 07 79 79 71 04</span>
                                <span>Cel : (+225) 07 79 79 71 04</span>
                            </div>
                        </div>
                        <div class="d-flex flex-column align-items-center justify-content-center col-md-4">
                            <div class="col">
                                <a href="#" class="btn helped">
                                    <svg xmlns="http://www.w3.org/2000/svg"style="{{ 'color: white' }}" width="24"
                                        height="24" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                                    </svg>
                                </a>
                            </div>
                            <div class="col text-white p-3">

                                <h3>Nous retrouver</h3>
                            </div>
                            <div class="col d-flex flex-column text-white align-items-center">
                                <span>Koumassi remblais, Abidjan</span>
                                <span class="p-3">
                                    <a href="#" style="{{ 'color: white; text-decoration : none;' }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" style="{{ 'color: white' }}" width="16"
                                            height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                            <path
                                                d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                                        </svg>
                                    </a>
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" style="{{ 'color: white' }}" width="16"
                                            height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                                            <path
                                                d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z" />
                                        </svg>
                                    </a>
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" style="{{ 'color: white' }}" width="16"
                                            height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                            <path
                                                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                                        </svg>
                                    </a>



                                </span>
                            </div>
                        </div>
                        <div class="footer text-center col-md-4">
                            <span class="fs-6">Droits d'auteur © 2021 par INNOVSHOP . Tous les droits sont réservés</span>
                        </div>
                    </div>
                </div>
            </footer>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
    </body>

    </html>
