<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'bewertung';
    protected $primaryKey = 'id';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'zeitpunkt',
        'level',
        'bemerkung',
        'hervorgehoben',
        'gericht_id',
        'benutzer_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'zeitpunkt' => 'datetime'
    ];

    public function meal()
    {
        return $this->belongsTo(Meals::class, 'gericht_id');
    }

    public function benutzer()
    {
        return $this->belongsTo(Benutzer::class, 'benutzer_id');
    }
}
