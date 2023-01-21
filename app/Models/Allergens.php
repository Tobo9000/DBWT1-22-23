<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Allergens extends Model
{
    use HasFactory;

    public function getAllAllergens(): array
    {
        $allergens = DB::select('SELECT * FROM allergen');
        return $allergens;
    }

    public function getAllergenCodesForMeal(int $mealId): array
    {
        $allergenCodes = DB::select(
                'SELECT code FROM gericht_hat_allergen WHERE gericht_id = :mealId', ['mealId' => $mealId]);
        return $allergenCodes;
    }
}
