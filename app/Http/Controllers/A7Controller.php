<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class A7Controller extends Controller
{
    public function m4_7a_queryparameter(Request $request)
    {
        //$name = $request->query('name');
        $name = $request->input('name');

        return view('examples.m4_7a_queryparameter', [
            'name' => $name
        ]);
    }

    public function m4_7b_kategorie()
    {
        // müsste eigentlich ins Model
        $kategorien = DB::select('SELECT name FROM kategorie ORDER BY name');
        $gerichte_mit_kategorie =
            DB::select(
                'SELECT g.name AS Gericht, k.name AS Kategorie FROM gericht g
                LEFT JOIN gericht_hat_kategorie ghk ON g.id = ghk.gericht_id
                LEFT JOIN kategorie k on ghk.kategorie_id = k.id ORDER BY g.name');
        return view('examples.m4_7b_kategorie', [
            'kategorien' => $kategorien,
            'gerichte_mit_kategorie' => $gerichte_mit_kategorie
        ]);
    }

    public function m4_7c_gerichte()
    {
        $gerichte = DB::select('SELECT name, preis_intern FROM gericht WHERE preis_intern > 2 ORDER BY name DESC');
        return view('examples.m4_7c_gerichte', [
            'gerichte' => $gerichte
        ]);
    }

    public function m4_7d_page_x(Request $request)
    {
        $page = $request->input('no', 1);
        $view = 'examples.pages.m4_7d_page_1';
        if ($page >= 1 && $page <= 2)
            $view = 'examples.pages.m4_7d_page_'.$page;
        return view($view);
    }
}
