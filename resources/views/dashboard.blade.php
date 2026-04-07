@extends('layouts.app')

@section('content')

{{-- Bienvenue --}}
<div class="card shadow-sm mb-4" style="border:none; border-radius:16px; background:linear-gradient(135deg,#1A3C6E,#2E5FA3);">
    <div class="card-body p-4 d-flex justify-content-between align-items-center">
        <div>
            <h3 class="mb-1" style="color:white; font-weight:700;">
                👋 Bonjour, {{ Auth::user()->name }} !
            </h3>
            <p style="color:rgba(255,255,255,0.75); margin:0; font-size:14px;">
                Bienvenue sur votre espace ANAPEC — Ben Guerir
            </p>
        </div>
        <div style="text-align:right;">
            <p style="color:#C8922A; font-weight:700; margin:0; font-size:13px;">
                📅 {{ now()->format('d/m/Y') }}
            </p>
            <p style="color:rgba(255,255,255,0.6); margin:0; font-size:12px;">
                {{ now()->locale('fr')->isoFormat('dddd') }}
            </p>
        </div>
    </div>
</div>

{{-- Boutons rapides --}}
<div class="row g-3 mb-4">
    <div class="col-md-6">
        <a href="{{ route('rendezvous.create') }}" class="btn w-100 p-3"
           style="background:#1A3C6E; color:white; border-radius:12px; font-weight:700; font-size:15px;">
            ➕ Prendre un rendez-vous
        </a>
    </div>
    <div class="col-md-6">
        <a href="{{ route('rendezvous.index') }}" class="btn w-100 p-3"
           style="background:white; color:#1A3C6E; border:2px solid #1A3C6E; border-radius:12px; font-weight:700; font-size:15px;">
            📅 Voir mes rendez-vous
        </a>
    </div>
</div>

{{-- KPI Cards --}}
<div class="row g-3 mb-4">
    @php
        $total = \App\Models\Rendezvous::where('user_id', Auth::id())->count();
        $attente = \App\Models\Rendezvous::where('user_id', Auth::id())->where('statut','en attente')->count();
        $confirme = \App\Models\Rendezvous::where('user_id', Auth::id())->where('statut','confirmé')->count();
        $annule = \App\Models\Rendezvous::where('user_id', Auth::id())->where('statut','annulé')->count();
    @endphp

    <div class="col-md-3">
        <div class="card text-center p-3 shadow-sm" style="border-radius:14px; border-top:4px solid #1A3C6E;">
            <h2 style="color:#1A3C6E; font-weight:900; font-size:36px; margin:0;">{{ $total }}</h2>
            <p style="color:#888; font-size:12px; margin:4px 0 0;">📋 Total RDV</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center p-3 shadow-sm" style="border-radius:14px; border-top:4px solid #E8A020;">
            <h2 style="color:#E8A020; font-weight:900; font-size:36px; margin:0;">{{ $attente }}</h2>
            <p style="color:#888; font-size:12px; margin:4px 0 0;">⏳ En attente</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center p-3 shadow-sm" style="border-radius:14px; border-top:4px solid #28A745;">
            <h2 style="color:#28A745; font-weight:900; font-size:36px; margin:0;">{{ $confirme }}</h2>
            <p style="color:#888; font-size:12px; margin:4px 0 0;">✅ Confirmés</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center p-3 shadow-sm" style="border-radius:14px; border-top:4px solid #DC3545;">
            <h2 style="color:#DC3545; font-weight:900; font-size:36px; margin:0;">{{ $annule }}</h2>
            <p style="color:#888; font-size:12px; margin:4px 0 0;">❌ Annulés</p>
        </div>
    </div>
</div>

{{-- Presentation ANAPEC --}}
<div class="card shadow-sm mb-4" style="border:none; border-radius:16px;">
    <div class="card-body p-4">
        <h5 style="color:#1A3C6E; font-weight:700; margin-bottom:16px;">
            🏢 A propos de l'ANAPEC
        </h5>
        <p style="color:#555; font-size:14px; line-height:1.8;">
            L'<strong>Agence Nationale de Promotion de l'Emploi et des Competences (ANAPEC)</strong>
            est un etablissement public marocain cree en 2000. Elle accompagne les demandeurs
            d'emploi dans leur recherche et aide les entreprises a trouver les competences
            dont elles ont besoin.
        </p>

        <div class="row g-3 mt-2">
            <div class="col-md-4">
                <div class="p-3 text-center" style="background:#EEF3FB; border-radius:12px;">
                    <p style="font-size:28px; font-weight:900; color:#1A3C6E; margin:0;">75</p>
                    <p style="font-size:12px; color:#888; margin:0;">Agences au Maroc</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 text-center" style="background:#FFF8EE; border-radius:12px;">
                    <p style="font-size:22px; font-weight:900; color:#C8922A; margin:0;">IDMAJ</p>
                    <p style="font-size:12px; color:#888; margin:0;">Programme insertion</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 text-center" style="background:#F0FFF4; border-radius:12px;">
                    <p style="font-size:28px; font-weight:900; color:#28A745; margin:0;">2000</p>
                    <p style="font-size:12px; color:#888; margin:0;">Annee de creation</p>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Programmes --}}
<div class="card shadow-sm" style="border:none; border-radius:16px;">
    <div class="card-body p-4">
        <h5 style="color:#1A3C6E; font-weight:700; margin-bottom:16px;">
            📌 Nos programmes d'insertion
        </h5>
        <div class="row g-3">
            <div class="col-md-4">
                <div class="p-3" style="background:#EEF3FB; border-radius:12px; border-left:4px solid #1A3C6E;">
                    <h6 style="color:#1A3C6E; font-weight:700;">IDMAJ</h6>
                    <p style="font-size:12px; color:#666; margin:0;">
                        Insertion des jeunes diplomes avec exoneration des charges sociales pendant 24 mois.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3" style="background:#FFF8EE; border-radius:12px; border-left:4px solid #C8922A;">
                    <h6 style="color:#C8922A; font-weight:700;">TAEHIL</h6>
                    <p style="font-size:12px; color:#666; margin:0;">
                        Formations qualifiantes gratuites adaptees aux besoins du marche du travail.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3" style="background:#F0FFF4; border-radius:12px; border-left:4px solid #28A745;">
                    <h6 style="color:#28A745; font-weight:700;">TAHFIZ</h6>
                    <p style="font-size:12px; color:#666; margin:0;">
                        Encouragement des entreprises a recruter avec prise en charge des cotisations.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection