<?php

namespace App\Http\Controllers;

use App\Models\Rendezvous;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RendezvousController extends Controller
{
    // Afficher la liste des rendez-vous du candidat
    public function index()
    {
        $rendezvous = Rendezvous::where('user_id', Auth::id())->get();
        return view('rendezvous.index', compact('rendezvous'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        return view('rendezvous.create');
    }

    // Enregistrer un nouveau rendez-vous
    public function store(Request $request)
    {
        $request->validate([
            'date'  => 'required|date',
            'heure' => 'required',
            'type'  => 'required|string',
        ]);

        Rendezvous::create([
            'user_id' => Auth::id(),
            'date'    => $request->date,
            'heure'   => $request->heure,
            'type'    => $request->type,
            'statut'  => 'en attente',
        ]);

        return redirect()->route('rendezvous.index')
                         ->with('success', 'Rendez-vous pris avec succès !');
    }

    // Annuler un rendez-vous
    public function destroy($id)
    {
        $rdv = Rendezvous::findOrFail($id);
        $rdv->delete();

        return redirect()->route('rendezvous.index')
                         ->with('success', 'Rendez-vous annulé !');
    }
}