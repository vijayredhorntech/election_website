<?php

namespace App\Http\Controllers;

use App\Facades\CustomLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Helpers\CustomLogger;
use App\Models\Member;
use Illuminate\Support\Facades\Validator;

class MobileVerificationController extends Controller
{

    /**
     * Validates and formats UK mobile numbers to E.164 format as a number
     * Accepts formats:
     * 1. 447700900000 (international format with country code)
     * 2. 07700900000 (UK national format)
     * 3. 7700900000 (without leading zero)
     */
    public function validateAndFormatMobile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'country_code' => 'required|string',
            'mobile_number' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    // Extract digits only for length validation
                    $digitsOnly = preg_replace('/\D/', '', $value);

                    // Check length: typically 7-12 digits for mobile numbers without country code
                    if (strlen($digitsOnly) < 7 || strlen($digitsOnly) > 12) {
                        $fail('The ' . $attribute . ' must be a valid mobile number.');
                        return;
                    }
                },
            ],
        ]);

        if ($validator->fails()) {
            CustomLog::error('Mobile number validation failed', [
                'errors' => $validator->errors()
            ]);
            throw new \Exception('Mobile number validation failed');
        }

        // Get country code and clean it
        $countryCode = preg_replace('/[^0-9]/', '', $request->country_code);

        // Get mobile number and clean it
        $mobileNumber = preg_replace('/[^0-9]/', '', $request->mobile_number);

        // Remove leading zero from mobile number if present
        if (strpos($mobileNumber, '0') === 0) {
            $mobileNumber = substr($mobileNumber, 1);
        }

        // Combine country code and mobile number
        $formattedNumber = $countryCode . $mobileNumber;

        // Convert to numeric value
        $numericMobile = (int)$formattedNumber;

        return $numericMobile;
    }

    public function verifyMobile(Request $request)
    {
        try {
            // Check if the mobile number is already in the database
            $checkMobileNumber = Member::where('primary_mobile_number', $request->mobile_number)->first();

            //! Remove this after testing
            // $checkMobileNumber = [
            //     'check' => true,
            //     'key' => 'This will return some data from the database'
            // ];

            if ($checkMobileNumber) {
                return response()->json([
                    'success' => false,
                    'message' => 'Mobile number already exists'
                ], 422);
            }

            $numericMobile = $this->validateAndFormatMobile($request);

            // Generate OTP
            $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

            //! Remove this after testing
            CustomLog::info('OTP generated: ' . $otp);

            // Store OTP in session with timestamp
            session([
                'mobile_otp' => $otp,
                'mobile_number' => $numericMobile,
                'otp_created_at' => now()
            ]);

            $apiKey = config('services.voodoo.api_key');

            $msg = json_encode(
                [
                    'to' => $numericMobile,
                    'from' => "One Nation",
                    'msg' => "Your One Nation verification code is: {$otp}"
                ]
            );

            $ch = curl_init('https://api.voodoosms.com/sendsms');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Authorization: ' . $apiKey
            ]);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $msg);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);

            $this->processSmsResponse($response);

            return response()->json([
                'success' => true,
                'message' => 'OTP sent successfully'
            ]);
        } catch (\Exception $e) {
            CustomLog::error('Mobile verification failed: ' . $e->getMessage(), [
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Failed to send SMS'
            ], 500);
        }
    }

    /**
     * Process the SMS API response and handle both success and error cases with logging
     * 
     * @param object|array $response The API response
     * @return array Processed response data
     */
    public function processSmsResponse($response)
    {
        // Convert string to object
        $response = json_decode($response);

        //! Remove this after testing
        $successResponse = json_encode([
            "count" => 1,
            "originator" => "VoodooSMS",
            "body" => "Hello Peter, I see you are 48 years old and enjoy eating pizza",
            "scheduledDateTime" => 1537525949,
            "credits" => 1,
            "balance" => 2365,
            "messages" => [
                [
                    "id" => "97709216074987x3NFD16GgkChK2E67441209181vapi",
                    "recipient" => 447800000000,
                    "reference" => null,
                    "status" => "PENDING_SENT"
                ]
            ]
        ]);

        //! Remove this after testing
        $failedResponse = json_encode([
            "error" => [
                "code" => 1001,
                "msg" => "Invalid API Key"
            ]
        ]);

        //! Remove this after testing
        $response = json_decode($successResponse);

        // Check if error exists in the response
        if (isset($response->error)) {
            // Log the error details
            CustomLog::error('SMS API Error', [
                'error_code' => $response->error->code ?? 'unknown',
                'error_message' => $response->error->msg ?? 'No error message provided',
                'timestamp' => now()->toDateTimeString(),
                'request_id' => request()->id ?? null
            ]);

            throw new \Exception($response->error->msg ?? 'An error occurred with the SMS service');
        }

        // If success response
        if (isset($response->messages)) {
            // Log success information
            CustomLog::info('SMS Sent Successfully', [
                'count' => $response->count ?? 0,
                'originator' => $response->originator ?? 'unknown',
                'message_count' => count($response->messages ?? []),
                'credits_used' => $response->credits ?? 0,
                'remaining_balance' => $response->balance ?? 0,
                'timestamp' => now()->toDateTimeString(),
                'request_id' => request()->id ?? null
            ]);

            // Process message details
            $messageDetails = [];
            foreach ($response->messages as $message) {
                $messageDetails[] = [
                    'id' => $message->id ?? null,
                    'recipient' => $message->recipient ?? null,
                    'reference' => $message->reference ?? null,
                    'status' => $message->status ?? 'unknown'
                ];
            }

            return [
                'success' => true,
                'message_count' => $response->count ?? count($response->messages ?? []),
                'credits_used' => $response->credits ?? 0,
                'remaining_balance' => $response->balance ?? 0,
                'messages' => $messageDetails
            ];
        }

        // Fallback for unexpected response format
        CustomLog::warning('Unexpected SMS API response format', [
            'response' => json_encode($response),
            'timestamp' => now()->toDateTimeString()
        ]);

        return [
            'success' => false,
            'error_message' => 'Unexpected response format from SMS service'
        ];
    }

    public function resendOTP(Request $request)
    {
        try {
            // Check if we're within the rate limit (1 minute between resends)
            $lastOtpTime = session('otp_created_at');

            if ($lastOtpTime && now()->diffInSeconds($lastOtpTime) < 60) {
                return response()->json([
                    'success' => false,
                    'message' => 'Please wait before requesting another OTP'
                ], 429);
            }

            // Reuse the verify mobile logic
            return $this->verifyMobile($request);
        } catch (\Exception $e) {
            CustomLog::error('Resend OTP failed: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to resend OTP'
            ], 500);
        }
    }

    public function validateOTP(Request $request)
    {
        try {
            $request->validate([
                'mobile_number' => 'required',
                'mobile_otp' => 'required|string|size:6'
            ]);

            $storedOtp = session('mobile_otp');
            $storedMobile = session('mobile_number');
            $otpCreatedAt = session('otp_created_at');

            if (!$storedOtp || !$storedMobile || !$otpCreatedAt) {
                return response()->json([
                    'valid' => false,
                    'message' => 'OTP has expired. Please request a new one.'
                ], 422);
            }

            // Check if OTP is expired (10 minutes validity)
            if (now()->diffInMinutes($otpCreatedAt) > 10) {
                session()->forget(['mobile_otp', 'mobile_number', 'otp_created_at']);
                return response()->json([
                    'valid' => false,
                    'message' => 'OTP has expired. Please request a new one.'
                ], 422);
            }

            $numericMobile = $this->validateAndFormatMobile($request);

            if ($storedMobile != $numericMobile) {
                return response()->json([
                    'valid' => false,
                    'message' => 'Mobile number mismatch'
                ], 422);
            }

            if ($request->mobile_otp !== $storedOtp) {
                return response()->json([
                    'valid' => false,
                    'message' => 'Invalid OTP'
                ], 422);
            }

            // Clear OTP session data after successful verification
            session()->forget(['mobile_otp', 'mobile_number', 'otp_created_at']);

            return response()->json([
                'valid' => true,
                'message' => 'OTP verified successfully'
            ]);
        } catch (\Exception $e) {
            CustomLog::error('OTP validation failed: ' . $e->getMessage());
            return response()->json([
                'valid' => false,
                'message' => 'Failed to validate OTP'
            ], 500);
        }
    }
}
