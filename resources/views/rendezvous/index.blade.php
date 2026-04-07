@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center"
         style="background-color: #1a3c6e; color: white;">
        <h5 class="mb-0">📅 Mes Rendez-vous</h5>
        <a href="{{ route('rendezvous.create') }}" class="btn btn-light btn-sm">
            ➕ Nouveau
        </a>
    </div>
    <div class="card-body">

        @if($rendezvous->isEmpty())
            <div class="text-center text-muted py-4">
                <p>Vous n'avez aucun rendez-vous pour le moment.</p>
                <a href="{{ route('rendezvous.create') }}" class="btn btn-primary">
                    Prendre un rendez-vous
                </a>
            </div>
        @else
            <table class="table table-hover">
                <thead style="background-color: #f0f4ff;">
                    <tr>
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
                                  action="{{ route('rendezvous.destroy', $rdv->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Voulez-vous annuler ce rendez-vous ?')">
                                    🗑️ Annuler
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

    </div>
</div>
@endsection