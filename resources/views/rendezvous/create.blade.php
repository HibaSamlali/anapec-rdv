@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header" style="background-color: #1a3c6e; color: white;">
        <h5 class="mb-0">➕ Nouveau Rendez-vous</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('rendezvous.store') }}">
            @csrf

            {{-- Type de rendez-vous --}}
            <div class="mb-3">
                <label class="form-label fw-bold">Type de rendez-vous</label>
                <select name="type" class="form-select" required>
                    <option value="">-- Choisissez --</option>
                    <option value="Orientation">Orientation</option>
                    <option value="Inscription programme">Inscription programme</option>
                    <option value="Suivi dossier">Suivi dossier</option>
                    <option value="Dépôt CV">Dépôt CV</option>
                </select>
                @error('type')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Date --}}
            <div class="mb-3">
                <label class="form-label fw-bold">Date</label>
                <input type="date" name="date" class="form-control"
                       min="{{ date('Y-m-d') }}" required>
                @error('date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Heure --}}
            <div class="mb-3">
                <label class="form-label fw-bold">Heure</label>
                <select name="heure" class="form-select" required>
                    <option value="">-- Choisissez --</option>
                    <option value="08:00">08:00</option>
                    <option value="09:00">09:00</option>
                    <option value="10:00">10:00</option>
                    <option value="11:00">11:00</option>
                    <option value="14:00">14:00</option>
                    <option value="15:00">15:00</option>
                    <option value="16:00">16:00</option>
                </select>
                @error('heure')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                ✅ Confirmer le rendez-vous
            </button>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary ms-2">
                Annuler
            </a>
        </form>
    </div>
</div>
@endsection