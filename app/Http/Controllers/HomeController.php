<?php

namespace App\Http\Controllers;

use App\Models\Benutzer;
use App\Models\Meals;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * The reviews repository implementation.
     *
     * @var Review
     */
    protected Review $reviews;

    /**
     * Create a new controller instance.
     *
     * @param Review $reviews
     */
    public function __construct(Review $reviews)
    {
        $this->reviews = $reviews;
    }

    /**
     * Display the landing page.
     *
     * @return View
     */
    public function index() {
        Log::info("Landing page requested.");

        $highlightedReviews = Review::where('hervorgehoben', true)->get();

        return view('landing', [
            'highlightedReviews' => $highlightedReviews
        ]);
    }
}
