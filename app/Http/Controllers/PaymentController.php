<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function __construct()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
    }

    public function createCheckoutSession(Request $request)
    {
        try {
            $request->validate([
                'amount' => 'required|numeric|min:1',
                'name' => 'required|string',
                'email' => 'required|email',
                'is_anonymous' => 'boolean',
                'message' => 'nullable|string',
            ]);

            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'gbp',
                        'unit_amount' => $request->amount * 100,
                        'product_data' => [
                            'name' => 'Donation to One Nation',
                            'description' => 'Thank you for your support',
                        ],
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('donation.success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('donation.cancel'),
                'customer_email' => $request->email,
                'metadata' => [
                    'name' => $request->name,
                    'email' => $request->email,
                    'is_anonymous' => $request->is_anonymous ? 'true' : 'false',
                    'message' => $request->message,
                ],
            ]);

            return response()->json([
                'success' => true,
                'sessionId' => $session->id
            ]);
        } catch (\Exception $e) {
            Log::error('Stripe session creation error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Unable to process payment. Please try again.'
            ], 500);
        }
    }

    public function handleSuccess(Request $request)
    {
        try {
            if (!$request->session_id) {
                return redirect()->route('donate')->with('error', 'Invalid session.');
            }

            $session = Session::retrieve($request->session_id);
            // dd($request, $session)
            
            if ($session->payment_status === 'paid') {
                // Create donation record
                $donation = Donation::create([
                    'name' => $session->metadata['name'],
                    'email' => $session->metadata['email'],
                    'amount' => $session->amount_total / 100,
                    'payment_id' => $session->id,
                    'status' => 'completed',
                    'user_id' => auth()->id() ?? null,
                    'payment_method' => 'stripe',
                    'message' => $session->metadata['message'] ?? null,
                    'is_anonymous' => $session->metadata['is_anonymous'] === 'true',
                ]);

                return redirect()->route('donate')->with('success', 'Thank you for your donation! Your payment has been processed successfully.');
            }

            return redirect()->route('donate')->with('error', 'Your payment was not completed. Please try again.');
        } catch (\Exception $e) {
            \Log::error('Stripe success handler error: ' . $e->getMessage());
            return redirect()->route('donate')->with('error', 'An error occurred while processing your donation. Please contact support.');
        }
    }

    public function handleCancel()
    {
        return redirect()->route('donate')->with('error', 'Your donation was cancelled. Please try again if you would like to make a donation.');
    }
}
