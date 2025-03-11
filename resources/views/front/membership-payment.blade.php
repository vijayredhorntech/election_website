<x-front.layout>
    @push('styles')
        <style>
            input[type=number]::-webkit-inner-spin-button,
            input[type=number]::-webkit-outer-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }

            .container-box input[type="checkbox"]:checked + .checkmark {
                background-color: #007bff;
                /* Change to desired color */
                border-color: #007bff;
                /* Change to desired color */
            }
            ul li
            {
                color: black;
            }
            @media only screen and (max-width: 668) {
                .description.style-01 
                {
                    width:100% !important;
                    min-width:100% !important;
                }
            }
        </style>


         
    @endpush

    <div class="about-us-section-area about-bg margin-bottom-60" style="background-image: url({{asset('assets/images/about-bg.png')}});">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="about-inner donation-single">
                        <h1 class="title" style="color:white">Membership Plans</h1>
                    </div>
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{{route('index')}}">Home</a></li>
                            <li><a href="{{route('joinUs')}}">Plans</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="donation-content-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="volunteer-form style-01">
                        <div class="donate-programm">
                            <div class="content">
                                <!-- <h6 class="subtitle">Membership Amount : £ {{ $memberShip['amount'] }}</h6> -->
                                <h6 class="subtitle">Complete Your Membership Fee</h6>
                                <p class="description style-01" style="color:black">Thank you for joining One Nation. You’re now at the final stage of your membership.</p>
                                        <ul>
                                                                <p class="description style-01" style="color:black; font-size:16px; line-height:20px">•	Fee: £36.00</p>
                                <p class="description style-01" style="color:black; font-size:16px; line-height:20px">•	Next Step: Complete your payment to activate your membership and start enjoying your benefits.
</p>
                                        </ul>
                                <p class="description style-01" style="color:black">Thank you for being part of the change!</p>

                                @if(session('error'))
                                    <div class="text-red-600 text-sm font-semibold mt-4">{{session('error')}}</div>
                                @endif @if(session('success'))
                                    <div class="text-green-600 text-sm font-semibold mt-4">{{session('success')}}</div>
                                @endif
                            </div>
                        </div>
                        <div class="contact-form style-01">
                            <form id="payment-form" class="w-full mt-8 lg:px-8">
                                @csrf
                                <div class="space-y-4 btn-wrapper" style="display: flex; justify-content: end">
                                    <button type="submit" id="submit-button" class="boxed-btn btn-sanatory">
                                        <span id="button-text">Pay with Credit/Debit Card</span>
                                        <span id="spinner" class="loading" style="display: none;"></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
            <script src="https://js.stripe.com/v3/"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const stripe = Stripe('{{ config("services.stripe.key") }}');
                    const form = document.getElementById('payment-form');
                    const submitButton = document.getElementById('submit-button');
                    const spinner = document.getElementById('spinner');
                    const buttonText = document.getElementById('button-text');

                    form.addEventListener('submit', async function(e) {
                        e.preventDefault();
                        submitButton.disabled = true;
                        spinner.style.display = 'inline-block';
                        buttonText.style.opacity = '0.5';

                        try {
                            const response = await fetch('/create-membership-session', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                                },
                                body: JSON.stringify({
                                    email: '{{ $email }}',
                                    amount: {{ $memberShip['amount'] }},
                                    plan_type: 'annual'
                                })
                            });

                            const data = await response.json();

                            if (data.success) {
                                const result = await stripe.redirectToCheckout({
                                    sessionId: data.sessionId
                                });

                                if (result.error) {
                                    showError(result.error.message);
                                }
                            } else {
                                showError(data.message || 'An error occurred');
                            }
                        } catch (error) {
                            showError('An error occurred. Please try again.');
                        }

                        submitButton.disabled = false;
                        spinner.style.display = 'none';
                        buttonText.style.opacity = '1';
                    });

                    function showError(message) {
                        const errorDiv = document.createElement('div');
                        errorDiv.textContent = message;
                        errorDiv.className = 'text-red-600 text-sm font-semibold mt-4';
                        form.appendChild(errorDiv);
                        setTimeout(() => errorDiv.remove(), 5000);
                    }
                });
            </script>
    @endpush
</x-front.layout>

