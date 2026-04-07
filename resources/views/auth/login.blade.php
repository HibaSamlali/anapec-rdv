@extends('layouts.auth')

@section('content')

<h3>Bon retour ! 👋</h3>
<p class="subtitle">Connectez-vous à votre espace ANAPEC</p>
<div class="gold-bar"></div>

<form method="POST" action="{{ route('login') }}">
    @csrf

    {{-- Choix du rôle --}}
    <div class="mb-3 text-center">
        <label class="form-label">Se connecter en tant que :</label><br>

        <input type="radio" name="role" value="admin" required> Admin
        <input type="radio" name="role" value="candidat" required> Candidat
    </div>

    {{-- Email --}}
    <div class="mb-3">
        <label class="form-label">Adresse Email</label>
        <input type="email" name="email" 
               class="form-control @error('email') is-invalid @enderror"
               value="{{ old('email') }}" 
               required autofocus 
               placeholder="exemple@email.com">

        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Mot de passe --}}
    <div class="mb-3">
        <label class="form-label">Mot de passe</label>
        <input type="password" name="password" 
               class="form-control @error('password') is-invalid @enderror"
               required 
               placeholder="••••••••">

        @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Bouton login --}}
    <button type="submit" class="btn-auth">
        Se connecter →
    </button>
</form>

<div class="auth-link">
    Pas encore de compte ?
    <a href="{{ route('register') }}">S'inscrire</a>
</div>

@endsection