<?php

namespace App\Http\Controllers;

use App\Models\Feedbacks;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userId = Auth::id(); // Get the authenticated user's ID

        $feedbacks = Feedbacks::where('user_id', $userId)->latest()->take(5)->get();
        $totalFeedback = Feedbacks::where('user_id', $userId)->count();
        $averageRating = Feedbacks::where('user_id', $userId)->avg('rating');

        return view('home', compact('feedbacks', 'totalFeedback', 'averageRating', 'userId'));
    }
}
