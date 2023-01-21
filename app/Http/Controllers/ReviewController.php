<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use App\Models\Review;
use App\Models\Meals;
use App\Models\Benutzer;

class ReviewController extends Controller
{
    /**
     * The reviews repository implementation.
     *
     * @var Review
     */
    protected Review $reviews;

    /**
     * The meals repository implementation.
     *
     * @var Meals
     */
    protected Meals $meals;

    /**
     * The users repository implementation.
     *
     * @var Benutzer $benutzer
     */
    protected Benutzer $benutzer;

    /**
     * Create a new controller instance.
     *
     * @param Review $reviews
     * @param Meals $meals
     */
    public function __construct(Review $reviews, Meals $meals, Benutzer $benutzer)
    {
        $this->reviews = $reviews;
        $this->meals = $meals;
        $this->benutzer = $benutzer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $showReviews = null; //Review::orderBy('zeitpunkt', 'desc')->limit(30)->get();
        //$ormTemp = Review::orderBy('zeitpunkt', 'desc')->limit(30)->get();

        // get search query
        $search = request('search');
        // check if user id in request
        $user_id = request('user');
        // get sort preference from get request
        $sort = request('sort');

        // 1. User > 2. Search > 3. Sort

        if ($user_id) {
            if (!Benutzer::find($user_id))
                abort(404);
            $showReviews = Review::where('benutzer_id', $user_id)->orderBy('zeitpunkt', 'desc')->get();
        } else {

            if ($search) {
                $search = strtolower($search);
            }

            if ($sort == 'highest') {
                $showReviews = Review::whereHas('meal', function (Builder $query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                })->orderBy('level', 'desc')->limit(30)->get();
            } else if ($sort == 'lowest') {
                $showReviews = Review::whereHas('meal', function (Builder $query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                })->orderBy('level', 'asc')->limit(30)->get();
            } else {
                $showReviews = Review::whereHas('meal', function (Builder $query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                })->orderBy('zeitpunkt', 'desc')->limit(30)->get();
            }
        }

        return view('reviews.index', [
            'reviews' => $showReviews
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create($id)
    {
        $meal = Meals::findOr($id, function () {
            return abort(404);
        });
        // TODO: get category of meal: https://laravel.com/docs/9.x/eloquent-relationships#querying-relations


        $reviewCount = Review::where('gericht_id', $id)->count();
        return view('reviews.create', [
            'meal' => $meal,
            'reviewCount' => $reviewCount
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'rating' => ['required', 'integer', 'min:1', 'max:4'],
            'comment' => ['required', 'string', 'min:5', 'max:255'],
        ]);

        Meals::findOr($id, function () {
            return redirect()->withErrors(['failed' => 'Gericht nicht gefunden.']);
        });

        Review::create([
            'zeitpunkt' => now(),
            'level' => $request->rating,
            'bemerkung' => $request->comment,
            'hervorgehoben' => false,
            'gericht_id' => $id,
            'benutzer_id' => Auth::id()
        ]);

        Log::info('Review created by ' . Auth::user()->name . ' for meal ' . $id);
        return redirect(RouteServiceProvider::HOME)
            ->with('success', 'Bewertung erfolgreich erstellt.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * (Hervorhebung togglen)
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // check if currently authenticated user is an admin
        if (!Auth::user()->admin)
            return redirect()->back()->withErrors(['failed' => 'Nur Admins können Bewertungen bearbeiten.']);

        $review = Review::findOr($id, function () {
            return redirect()->back()->withErrors(['failed' => 'Bewertung nicht gefunden.']);
        });

        $review->hervorgehoben = !$review->hervorgehoben;
        $review->save();
        return redirect()->back()->with('success', 'Bewertung erfolgreich bearbeitet.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        // check if authenticated user is the owner of the review
        $review = Review::findOr($id, function () {
            return redirect()->back()->withErrors(['failed' => 'Bewertung nicht gefunden.']);
        });

        if ($review->benutzer_id !== Auth::id()) {
            return redirect()->back()->withErrors(['failed' => 'Nicht berechtigt.']);
        }

        $review->delete();
        Log::info('Review deleted by ' . Auth::user()->name . ' for meal ' . $review->gericht_id);
        return redirect()->back()->with('success', 'Bewertung erfolgreich gelöscht.');
    }
}
