@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center"
         style="background-color: #1a3c6e; color: white;">
        <h5 class="mb-0">👨‍💼 Dashboard Administrateur</h5>
        <span class="badge bg-light text-dark">
            {{ $rendezvous->count() }} rendez-vous
        </span>
    </div>
    <div class="card-body">

        {{-- Statistiques --}}
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card text-center border-warning">
                    <div class="card-body">
                        <h4 class="text-warning">
                            {{ $rendezvous->where('statut', 'en attente')->count() }}
                        </h4>
                        <p class="mb-0">En attente</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center border-success">
                    <div class="card-body">
                        <h4 class="text-success">
                            {{ $rendezvous->where('statut', 'confirmé')->count() }}
                        </h4>
                        <p class="mb-0">Confirmés</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center border-danger">
                    <div class="card-body">
                        <h4 class="text-danger">
                            {{ $rendezvous->where('statut', 'annulé')->count() }}
                        </h4>
                        <p class="mb-0">Annulés</p>
                    </div>
                </div>
            </div>
        </div>
        {{-- Formulaire de recherche --}}
<form method="GET" action="{{ route('admin.dashboard') }}" 
      class="row g-3 mb-4 p-3" 
      style="background:#F8FAFF; border-radius:12px; border:1px solid #DDE6F0;">

    {{-- Type --}}
    <div class="col-md-3">
        <label class="form-label fw-bold" style="color:#1A3C6E; font-size:13px;">
            🔍 Type de RDV
        </label>
        <select name="type" class="form-select form-select-sm">
            <option value="">-- Tous --</option>
            <option value="Orientation"      {{ request('type')=='Orientation'      ? 'selected':'' }}>Orientation</option>
            <option value="Inscription programme" {{ request('type')=='Inscription programme' ? 'selected':'' }}>Inscription programme</option>
            <option value="Suivi dossier"    {{ request('type')=='Suivi dossier'    ? 'selected':'' }}>Suivi dossier</option>
            <option value="Dépôt CV"         {{ request('type')=='Dépôt CV'         ? 'selected':'' }}>Dépôt CV</option>
        </select>
    </div>

    {{-- Date --}}
    <div class="col-md-3">
        <label class="form-label fw-bold" style="color:#1A3C6E; font-size:13px;">
            📅 Date
        </label>
        <input type="date" name="date" class="form-control form-control-sm"
               value="{{ request('date') }}">
    </div>

    {{-- Statut --}}
    <div class="col-md-3">
        <label class="form-label fw-bold" style="color:#1A3C6E; font-size:13px;">
            📋 Statut
        </label>
        <select name="statut" class="form-select form-select-sm">
            <option value="">-- Tous --</option>
            <option value="en attente" {{ request('statut')=='en attente' ? 'selected':'' }}>En attente</option>
            <option value="confirmé"   {{ request('statut')=='confirmé'   ? 'selected':'' }}>Confirmé</option>
            <option value="annulé"     {{ request('statut')=='annulé'     ? 'selected':'' }}>Annulé</option>
        </select>
    </div>

    {{-- Boutons --}}
    <div class="col-md-3 d-flex align-items-end gap-2">
        <button type="submit" class="btn btn-sm btn-primary w-100">
            🔍 Rechercher
        </button>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-outline-secondary w-100">
            ✖ Reset
        </a>
    </div>
</form>

        {{-- Tableau des rendez-vous --}}
        @if($rendezvous->isEmpty())
            <div class="text-center text-muted py-4">
                <p>Aucun rendez-vous pour le moment.</p>
            </div>
        @else
            <table class="table table-hover">
                <thead style="background-color: #f0f4ff;">
                    <tr>
                        <th>Candidat</th>
                        <th>Type</th>
                        <th>Date</th>
                        <th>Heure</th>
                        <th>Statut</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rendezvous as $rdv)
                    <tr>
                        <td>{{ $rdv->user->name }}</td>
                        <td>{{ $rdv->type }}</td>
                        <td>{{ \Carbon\Carbon::parse($rdv->date)->format('d/m/Y') }}</td>
                        <td>{{ $rdv->heure }}</td>
                        <td>
                            @if($rdv->statut == 'en attente')
                                <span class="badge bg-warning text-dark">En attente</span>
                            @elseif($rdv->statut == 'confirmé')
                                <span class="badge bg-success">Confirmé</span>
                            @else
                                <span class="badge bg-danger">Annulé</span>
                            @endif
                        </td>
                        <td>
                            <form method="POST"
                                  action="{{ route('admin.rendezvous.update', $rdv->id) }}">
                                @csrf
                                @method('PUT')
                                <select name="statut" class="form-select form-select-sm d-inline w-auto">
                                    <option value="en attente" {{ $rdv->statut == 'en attente' ? 'selected' : '' }}>En attente</option>
                                    <option value="confirmé" {{ $rdv->statut == 'confirmé' ? 'selected' : '' }}>Confirmé</option>
                                    <option value="annulé" {{ $rdv->statut == 'annulé' ? 'selected' : '' }}>Annulé</option>
                                </select>
                                <button type="submit" class="btn btn-primary btn-sm ms-1">
                                    ✅ Modifier
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- Pagination --}}
<div class="d-flex justify-content-between align-items-center mt-3">
    <p style="font-size:13px; color:#888; margin:0;">
        Affichage de {{ $rendezvous->firstItem() ?? 0 }} 
        à {{ $rendezvous->lastItem() ?? 0 }} 
        sur {{ $rendezvous->total() }} rendez-vous
    </p>
    {{ $rendezvous->appends(request()->query())->links() }}
</div>
        @endif

    </div>
</div>
@endsection