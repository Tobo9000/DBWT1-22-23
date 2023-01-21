<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('benutzer', function (Blueprint $table) {
            // eindeutige ID, Auto-Inkrement, Primärschlüssel
            $table->id();

            // Name, der auch auf der Oberfläche angezeigt wird
            $table->string('name', 200); // standardmäßig 255 Zeichen
            //$table->string('name', 200);

            // eindeutige E-Mail des Benutzers. Teil der Anmeldung
            $table->string('email', 100)->unique();

            // Speicherung des gehashten Passworts (mit Salt)
            $table->string('password');

            // Markierung, ob es sich um einen Admin handelt, Standard false
            $table->boolean('admin')->default(false);

            // Zähler, wie oft hintereinander eine Anmeldung erfolglos durchgeführt wurde, Standard 0
            $table->unsignedInteger('anzahlfehler')->default(0);

            // Zähler, wie oft eine Anmeldung insgesamt erfolgreich durchgeführt wurde, Standard 0
            $table->unsignedInteger('anzahlanmeldungen')->default(0);

            // Zeitpunkt der letzten erfolgreichen Anmeldung, Standard null
            $table->dateTime('letzteanmeldung')->nullable();

            // Zeitpunkt der letzten erfolglosen Anmeldung, Standard null
            $table->dateTime('letzterfehler')->nullable();

            // eigene Spalten, die nicht gefordert waren:

            // für die "Angemeldet bleiben"-Funktion
            $table->rememberToken();
            // ob die E-Mail-Adresse bestätigt wurde (und wann)
            $table->timestamp('email_verified_at')->nullable();
            // Zeitstempel, wann der Datensatz angelegt / verändert wurde
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('benutzer');
    }
};
