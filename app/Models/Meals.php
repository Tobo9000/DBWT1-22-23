<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Meals extends Model
{
    use HasFactory;

    protected $table = 'gericht';
    protected $primaryKey = 'id';

    public function getMeals(): array
    {
        // TODO: maybe replace with laravel query builder
        $meals = DB::select('SELECT * FROM gericht');
        //$meals = DB::table($this->table)->get();
        return $meals;
    }

    public function getOptions()
    {

    }

    public function getDates()
    {
        return ['erfasst_am'];
    }

    protected function erfasstAm(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->format('d.m.Y'),
        );
    }

    protected function preisIntern(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => number_format($value, 2, ',', '.'),
        );
    }

    protected function preisExtern(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => number_format($value, 2, ',', '.'),
        );
    }

    protected function vegetarisch(): Attribute
    {
        // Mutator should accept 'Ja' or 'Nein' and return 1 or 0
        return Attribute::make(
            set: fn ($value) => (Str::lower(Str::replace(' ', '', $value)) === 'ja') ||
                (Str::lower(Str::replace(' ', '', $value)) === 'yes'),
        );
    }

    protected function vegan(): Attribute
    {
        // Mutator should accept 'Ja' or 'Nein' and return 1 or 0
        return Attribute::make(
            set: fn ($value) => (Str::lower(Str::replace(' ', '', $value)) === 'ja') ||
                (Str::lower(Str::replace(' ', '', $value)) === 'yes'),
        );
    }
}
