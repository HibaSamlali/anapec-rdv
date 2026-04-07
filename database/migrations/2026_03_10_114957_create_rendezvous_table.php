<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rendezvous', function (Blueprint $table) {
            $table->id();                          // numéro unique automatique
            $table->foreignId('user_id')           // lien avec la table users
                  ->constrained()
                  ->onDelete('cascade');
            $table->date('date');                  // date du rendez-vous
            $table->time('heure');                 // heure du rendez-vous
            $table->string('type');                // type : orientation, inscription...
            $table->string('statut')               // en attente, confirmé, annulé
                  ->default('en attente');
            $table->timestamps();                  // created_at et updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rendezvous');
    }
};