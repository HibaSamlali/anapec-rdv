<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANAPEC — Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;900&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Cairo', sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #1A3C6E 0%, #2E5FA3 50%, #1A3C6E 100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Cercles décoratifs en arrière-plan */
        body::before {
            content: '';
            position: fixed;
            width: 500px; height: 500px;
            background: rgba(200, 146, 42, 0.1);
            border-radius: 50%;
            top: -100px; right: -100px;
        }
        body::after {
            content: '';
            position: fixed;
            width: 400px; height: 400px;
            background: rgba(255,255,255,0.05);
            border-radius: 50%;
            bottom: -100px; left: -100px;
        }

        .auth-container {
            width: 100%;
            max-width: 480px;
            padding: 20px;
            position: relative;
            z-index: 10;
        }

        /* Logo en haut */
        .logo-section {
            text-align: center;
            margin-bottom: 30px;
        }
        .logo-section img {
            width: 140px;
            border-radius: 12px;
        }
        .logo-section h2 {
            color: white;
            font-size: 22px;
            font-weight: 700;
            margin-top: 12px;
        }
        .logo-section p {
            color: rgba(255,255,255,0.7);
            font-size: 13px;
        }

        /* Carte formulaire */
        .auth-card {
            background: white;
            border-radius: 20px;
            padding: 40px 35px;
            box-shadow: 0 25px 60px rgba(0,0,0,0.3);
        }

        .auth-card h3 {
            color: #1A3C6E;
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 8px;
        }
        .auth-card p.subtitle {
            color: #888;
            font-size: 13px;
            margin-bottom: 28px;
        }

        /* Barre dorée décorative */
        .gold-bar {
            width: 50px;
            height: 4px;
            background: #C8922A;
            border-radius: 2px;
            margin-bottom: 25px;
        }

        .form-label {
            font-weight: 600;
            color: #1A3C6E;
            font-size: 13px;
            margin-bottom: 6px;
        }

        .form-control {
            border: 2px solid #E8EEF8;
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 14px;
            transition: all 0.3s;
            font-family: 'Cairo', sans-serif;
        }
        .form-control:focus {
            border-color: #1A3C6E;
            box-shadow: 0 0 0 4px rgba(26,60,110,0.1);
        }

        .btn-auth {
            background: linear-gradient(135deg, #1A3C6E, #2E5FA3);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 13px;
            font-size: 15px;
            font-weight: 700;
            width: 100%;
            cursor: pointer;
            transition: all 0.3s;
            font-family: 'Cairo', sans-serif;
            margin-top: 10px;
        }
        .btn-auth:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(26,60,110,0.4);
        }

        .btn-quick {
    flex: 1;
    color: white;
    border: none;
    border-radius: 8px;
    padding: 10px;
    font-size: 13px;
    font-weight: 700;
    cursor: pointer;
    font-family: 'Cairo', sans-serif;
    transition: all 0.3s;
}
.btn-quick:hover {
    opacity: 0.85;
    transform: translateY(-1px);
}

        .auth-link {
            text-align: center;
            margin-top: 20px;
            font-size: 13px;
            color: #888;
        }
        .auth-link a {
            color: #C8922A;
            font-weight: 700;
            text-decoration: none;
        }
        .auth-link a:hover { text-decoration: underline; }

        .invalid-feedback { font-size: 12px; }

        /* Footer */
        .auth-footer {
            text-align: center;
            margin-top: 20px;
            color: rgba(255,255,255,0.5);
            font-size: 11px;
        }
    </style>
</head>
<body>
    <div class="auth-container">

        <!-- Logo ANAPEC -->
        <div class="logo-section">
            <img src="{{ asset('images/logo-anapec.png') }}" alt="ANAPEC">
            <h2>ANAPEC — Ben Guerir</h2>
            <p>Agence Nationale de Promotion de l'Emploi et des Compétences</p>
        </div>

        <!-- Formulaire -->
        <div class="auth-card">
            @yield('content')
        </div>

        <!-- Footer -->
        <div class="auth-footer">
            © 2026 ANAPEC — Système de Gestion des Rendez-vous
        </div>

    </div>
</body>
</html>