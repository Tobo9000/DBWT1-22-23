<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Benutzer extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'benutzer';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'letzteanmeldung' => 'datetime',
        'letzterfehler' => 'datetime',
        'email_verified_at' => 'datetime',
    ];

    public function getAnzahlAnmeldungen()
    {
        return $this->anzahlanmeldungen;
    }

    public function getAnzahlfehler()
    {
        return $this->letzteanmeldung;
    }

    public function getLetzteAnmeldung()
    {
        return $this->letzteanmeldung;
    }

    public function getLetzterFehler()
    {
        return $this->letzterfehler;
    }

    private function incrementAnzahlAnmeldungen()
    {
        $this->anzahlanmeldungen++;
    }

    private function incrementAnzahlFehler()
    {
        $this->anzahlfehler++;
    }

    private function setLetzteAnmeldung($letzteAnmeldung)
    {
        $this->letzteanmeldung = $letzteAnmeldung;
    }

    private function setLetzterFehler($letzterFehler)
    {
        $this->letzterfehler = $letzterFehler;
    }

    public function anmeldungErfolg()
    {
        $this->incrementAnzahlAnmeldungen();
        $this->setLetzteAnmeldung(now());
        //$this->anzahlfehler = 0;
        //$this->letzterfehler = null;
        $this->save();
    }

    public function anmeldungFehler()
    {
        $this->incrementAnzahlFehler();
        $this->setLetzterFehler(now());
        $this->save();
    }
}
