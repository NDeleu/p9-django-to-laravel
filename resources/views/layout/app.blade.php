<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LITReview</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
</head>
<body>
    <div class="container border border-2 border-secondary p-0">
        <div class="sticky-top bg-body-tertiary border-top-bottom border-2 border-secondary">
            <div class="text-center border-bottom border-2 border-secondary">
                <h1>LITReview</h1>
            </div>
            @auth
                <nav class="navbar navbar-expand-lg border-bottom border-2 border-secondary">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">
                            @if(auth()->user()->profile_photo)
                                <img src="{{ asset(auth()->user()->profile_photo) }}" alt="ProfilePicture" width="60" class="img-thumbnail d-inline-block align-text-center">
                            @else
                                <img src="{{ asset('images/default_profile.png') }}" alt="ProfilePicture" width="60" class="img-thumbnail d-inline-block align-text-center">
                            @endif
                            {{ auth()->user()->name }}
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Menu
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('home') }}">Accueil</a></li>
                                        <li><a class="dropdown-item" href="{{ route('post_edit') }}">Éditer mes posts</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="{{ route('follow_users') }}">Abonnements</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Compte
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('upload_profile_photo') }}">Changer de photo de profil</a></li>
                                        <li><a class="dropdown-item" href="{{ route('password_change') }}">Changer de mot de passe</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('logout') }}">Déconnexion</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            @endauth
        </div>

        <div class="main">
            @yield('content')
        </div>
    </div>
</body>
</html>
