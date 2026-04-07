<?php

namespace App\Http\Controllers;

use App\Models\Rendezvous;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Afficher tous les rendez-vous
public function index(Request $request)
{
    $query = Rendezvous::with('user');

    // Filtre par type
    if ($request->filled('type')) {
        $query->where('type', $request->type);
    }

    // Filtre par date
    if ($request->filled('date')) {
        $query->where('date', $request->date);
    }

    // Filtre par statut
    if ($request->filled('statut')) {
        $query->where('statut', $request->statut);
    }

    $rendezvous = $query->orderBy('date')->paginate(5);

    return view('admin.dashboard', compact('rendezvous'));
}

    // Modifier le statut d'un rendez-vous
    public function updateStatut(Request $request, $id)
    {
        $rdv = Rendezvous::findOrFail($id);
        $rdv->statut = $request->statut;
        $rdv->save();

        return redirect()->route('admin.dashboard')
                         ->with('success', 'Statut mis à jour avec succès !');
    }
}