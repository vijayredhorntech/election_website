<?php

namespace App\Http\Controllers;

use App\Mail\MemberShipMail;
use App\Mail\WelcomeMail;
use App\Models\Donation;
use App\Models\Member;
use App\Models\Membership;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function __construct()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
    }

    public function createMembershipSession(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'plan_type' => 'required|in:annual',
                'amount' => 'required|numeric'
            ]);

            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'gbp',
                        'unit_amount' => $request->amount * 100,
                        'product_data' => [
                            'name' => 'One Nation Membership',
                            'description' => 'Annual Membership Fee',
                        ],
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('membership.success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('membership.cancel'),
                'customer_email' => $request->email,
                'metadata' => [
                    'email' => $request->email,
                    'plan_type' => $request->plan_type,
                    'name' => session('name')
                ],
            ]);

            return response()->json([
                'success' => true,
                'sessionId' => $session->id
            ]);
        } catch (\Exception $e) {
            Log::error('Stripe membership session creation error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Unable to process payment. Please try again.'
            ], 500);
        }
    }

    public function handleMembershipSuccess(Request $request)
    {
        try {
            if (!$request->session_id) {
                return redirect()->route('selectMemberShipPlan')->with('error', 'Invalid session.');
            }

            $session = Session::retrieve($request->session_id);

            if ($session->payment_status === 'paid') {
                DB::beginTransaction();

                // Create user with random password
                $password = Str::random(12);
                $user = User::create([
                    'name' => $session->metadata['name'],
                    'email' => $session->metadata['email'],
                    'password' => Hash::make($password),
                ]);
                // Create member with inactive status
                $member = Member::create([
                    'user_id' => $user->id,
                    'enrollment_date'=> now(),
                    'profile_status' => 'inActive',
                    'first_name' => $session->metadata['name'],
                    'email' => $session->metadata['email'],
//                    'referrer_id'=>$referrar?->id
                ]);

                // Create membership record
                Membership::create([
                    'user_id' => $user->id,
                    'membership_type' => $session->metadata['plan_type'],
                    'payment_amount' => $session->amount_total / 100,
                    'payment_status' => $session->id,
                    'status' => 'active',
                    'start_date' => now(),
                    'end_date' => now()->addYear(),
                ]);

                $data = [
                    'name' => $session->metadata['name'],
                    'email' => $session->metadata['email'],
                    'password' => $password,
                ];

                // Send welcome email with credentials
                 Mail::to($user->email)->send(new MemberShipMail($data));

                DB::commit();

                auth()->login($user);

                return redirect()->route('memberBasicInformation')
                    ->with('success', 'Your membership payment has been processed successfully. Please check your email for login credentials.');
            }

            return redirect()->route('selectMemberShipPlan')
                ->with('error', 'Your payment was not completed. Please try again.');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            Log::error('Stripe membership success handler error: ' . $e->getMessage());
            return redirect()->route('selectMemberShipPlan')
                ->with('error', 'An error occurred while processing your membership. Please contact support.');
        }
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
                'termsCheckbox' => 'required|accepted',
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

        dd($request->all());
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
