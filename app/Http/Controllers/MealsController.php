<?php

namespace App\Http\Controllers;

use App\Models\Allergens;
use App\Models\Meals;
use Illuminate\View\View;

class MealsController extends Controller
{
    /**
     * The meals repository implementation.
     *
     * @var Meals
     */
    protected Meals $meals;

    /**
     * The allergens repository implementation.
     *
     * @var Allergens
     */
    protected Allergens $allergens;

    /**
     * Create a new controller instance.
     *
     * @param Meals $meals
     * @param Allergens $allergens
     * @return void
     */
    public function __construct(Meals $meals, Allergens $allergens)
    {
        $this->meals = $meals;
        $this->allergens = $allergens;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $allMeals = Meals::all();
        $limitCount = 0;
        $limit = 25;

        /* AllergenCodes:
         * 'GerichtID' => ['AllergenCode1', 'AllergenCode2', ...],
         * ...
         */
        $allergenCodes = [];
        foreach ($allMeals as $meal)
            $allergenCodes[$meal->id] = $this->allergens->getAllergenCodesForMeal($meal->id);

        $allAllergens = $this->allergens->getAllAllergens();

        return view('meals.meals', [
            'meals' => $allMeals,
            'allergenCodes' => $allergenCodes,
            'allAllergens' => $allAllergens,
            'limit' => $limit,
            'limitCount' => $limitCount
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function create()
    {
        //
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*public function store(Request $request)
    {
        //
    }*/

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meals  $meals
     * @return \Illuminate\Http\Response
     */
    /*public function show(Meals $meals)
    {
        //
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meals  $meals
     * @return \Illuminate\Http\Response
     */
    /*public function edit(Meals $meals)
    {
        //
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meals  $meals
     * @return \Illuminate\Http\Response
     */
    /*public function update(Request $request, Meals $meals)
    {
        //
    }*/

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meals  $meals
     * @return \Illuminate\Http\Response
     */
    /*public function destroy(Meals $meals)
    {
        //
    }*/
}
