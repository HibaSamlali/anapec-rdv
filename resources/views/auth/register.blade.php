@extends('layouts.auth')

@section('content')

<h3>Créer un compte 🎯</h3>
<p class="subtitle">Rejoignez l'espace ANAPEC en ligne</p>
<div class="gold-bar"></div>

<form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="mb-3">
        <label class="form-label">Nom complet</label>
        <input type="text" name="name" 
               class="form-control @error('name') is-invalid @enderror"
               value="{{ old('name') }}" 
               required autofocus 
               placeholder="Votre nom complet">
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Adresse Email</label>
        <input type="email" name="email" 
               class="form-control @error('email') is-invalid @enderror"
               value="{{ old('email') }}" 
               required 
               placeholder="exemple@email.com">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Mot de passe</label>
        <input type="password" name="password" 
               class="form-control @error('password') is-invalid @enderror"
               required 
               placeholder="Minimum 8 caractères">
        @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Confirmer le mot de passe</label>
        <input type="password" name="password_confirmation" 
               class="form-control"
               required 
               placeholder="Répétez le mot de passe">
    </div>

    <button type="submit" class="btn-auth">
        Créer mon compte →
    </button>
</form>

<div class="auth-link">
    Déjà un compte ?
    <a href="{{ route('login') }}">Se connecter</a>
</div>

@endsection