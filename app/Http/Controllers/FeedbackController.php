<?php

namespace App\Http\Controllers;

use App\Models\Feedbacks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\FeedbackCreated;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;


class FeedbackController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['createWithToken', 'storeWithToken']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::id(); // Get the authenticated user's ID
        $feedbacks = Feedbacks::where('user_id', $user_id)->get(); // Fetch feedbacks belonging to the authenticated user
        return view('feedbacks.index', compact('feedbacks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('feedbacks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:100',
            'feedback_date' => 'required|date',
            'feedback_text' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $feedback = new Feedbacks([
            'user_id' => Auth::id(), // Get the authenticated user's ID
            'customer_name' => $request->get('customer_name'),
            'feedback_date' => $request->get('feedback_date'),
            'feedback_text' => $request->get('feedback_text'),
            'rating' => $request->get('rating'),
        ]);

        $feedback->save();

        return redirect()->route('feedbacks.index')
                         ->with('success', 'Feedback created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Feedbacks $feedback)
    {
        return view('feedbacks.show', compact('feedback'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feedbacks $feedback)
    {
        return view('feedbacks.edit', compact('feedback'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feedbacks $feedback)
    {
        // Check if the feedback belongs to the authenticated user
         if ($feedback->user_id !== Auth::id()) {
            return redirect()->route('feedbacks.index')
                             ->with('error', 'You are not authorized to delete this feedback.');
        }

        $request->validate([
            'customer_name' => 'required|string|max:100',
            'feedback_date' => 'required|date',
            'feedback_text' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $feedback->update([
            'user_id' => Auth::id(), // Get the authenticated user's ID
            'customer_name' => $request->get('customer_name'),
            'feedback_date' => $request->get('feedback_date'),
            'feedback_text' => $request->get('feedback_text'),
            'rating' => $request->get('rating'),
        ]);

        return redirect()->route('feedbacks.index')
                         ->with('success', 'Feedback updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feedbacks $feedback)
    {
        // Check if the feedback belongs to the authenticated user
        if ($feedback->user_id !== Auth::id()) {
            return redirect()->route('feedbacks.index')
                             ->with('error', 'You are not authorized to delete this feedback.');
        }

        $feedback->delete();

        return redirect()->route('feedbacks.index')
                         ->with('success', 'Feedback deleted successfully.');
    }

    public function createWithToken($token)
    {
        return view('feedbacks.create_with_token', compact('token'));
    }

    /**
     * Store a newly created feedback in storage using a token.
     */
    public function storeWithToken(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:100',
            'feedback_text' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'token' => 'required|integer|exists:users,id', // Validate the token
        ]);

        $feedback = new Feedbacks([
            'user_id' => $request->get('token'), // Use the token as user_id
            'customer_name' => $request->get('customer_name'),
            'feedback_date' => Carbon::now(),
            'feedback_text' => $request->get('feedback_text'),
            'rating' => $request->get('rating'),
        ]);

        $feedback->save();

         // Send email notification to the user
         $user = \App\Models\User::find($request->get('token'));
         Mail::to($user->email)->send(new FeedbackCreated($feedback));

        return redirect()->route('feedback.create.with.token', ['token' => $request->get('token')])
                         ->with('success', 'Feedback created successfully.');
    }
}
