<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Constituency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
{
    public function create()
    {
        $constituencies = Constituency::all();
        return view('front.feedback', compact('constituencies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'constituency_id' => 'nullable|exists:constituencies,id',
            'member_id' => 'nullable|exists:members,id',
            'feedback_type' => 'required|in:suggestion,complaint,query,appreciation',
            'priority' => 'nullable|in:low,normal,high'
        ]);

        // try {
            $feedback = Feedback::create([
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message,
                'constituency_id' => $request->constituency_id,
                'member_id' => $request->member_id,
                'feedback_type' => $request->feedback_type,
                'status' => 'pending',
                'priority' => $request->priority ?? 'normal'
            ]);

            // Send acknowledgment email
            Mail::send('emails.feedback-acknowledgment', ['feedback' => $feedback], function($message) use ($feedback) {
                $message->to($feedback->email, $feedback->name)
                        ->subject('Thank You for Your Feedback - One Nation');
            });

            return redirect()->back()->with('success', 'Thank you for your feedback. We will get back to you soon.');
        // } catch (\Exception $e) {
        //     return redirect()->back()->with('error', 'Something went wrong. Please try again later.');
        // }
    }
}