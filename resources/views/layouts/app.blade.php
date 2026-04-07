<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANAPEC - Rendez-vous</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f6f9; }
        .sidebar {
            min-height: 100vh;
            background-color: #1a3c6e;
            padding-top: 20px;
        }
        .sidebar a {
            color: #ffffff;
            display: block;
            padding: 12px 20px;
            text-decoration: none;
        }
        .sidebar a:hover { background-color: #2e5fa3; }
.logo {
    text-align: center;
    padding: 15px;
    margin: 15px 10px;
    background-color: transparent;
    border-radius: 0;
    border: none;
}
.logo img {
    width: 150px;
    border-radius: 8px;
}
.logo small {
    color: #ffffff;
    font-weight: bold;
    font-size: 12px;
}
        .main-content { padding: 30px; }
        /* Pagination */
.pagination .page-link {
    color: #1A3C6E;
    border-radius: 8px;
    margin: 0 2px;
    font-size: 13px;
}
.pagination .page-item.active .page-link {
    background-color: #4772b3;
    border-color: #4772b3;
}
.pagination .page-link:hover {
    background-color: #EEF3FB;
    color: #1A3C6E;
}
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">

        {{-- Sidebar --}}
        <div class="col-md-2 sidebar">
            <div class="logo">
                <img src="{{ asset('images/logo-anapec.png') }}"
                     alt="ANAPEC">
                <br>
                <small>Rendez-vous en ligne</small>
            </div>
            <hr class="text-white">
            <a href="{{ route('dashboard') }}">🏠 Accueil</a>
            <a href="{{ route('rendezvous.index') }}">📅 Mes Rendez-vous</a>
            <a href="{{ route('rendezvous.create') }}">➕ Nouveau RDV</a>
            @if(Auth::check() && Auth::user()->role === 'admin')
                <a href="{{ route('admin.dashboard') }}">👨‍💼 Admin</a>
            @endif
            <hr class="text-white">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-link sidebar-link"
                    style="color:white; padding: 12px 20px;">
                    🚪 Déconnexion
                </button>
            </form>
        </div>

        {{-- Contenu principal --}}
        <div class="col-md-10 main-content">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @yield('content')
        </div>

    </div>
</div>
</body>
</html>