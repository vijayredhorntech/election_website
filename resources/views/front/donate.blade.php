<x-front.layout>
    @push('styles')
    <style>
        .donation-form {
            max-width: 600px;
            margin: 0 auto;
            padding: 2.5rem;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08);
            transition: transform 0.2s ease;
        }

        .donation-form:hover {
            transform: translateY(-2px);
        }

        .amount-options {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .amount-option {
            padding: 1rem;
            border: 2px solid #E5E7EB;
            border-radius: 8px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: white;
            font-size: 1.1rem;
            font-weight: 500;
            position: relative;
            overflow: hidden;
        }

        .amount-option:hover {
            border-color: #b30d00;
            transform: translateY(-1px);
            box-shadow: 0 2px 4px rgba(179, 13, 0, 0.1);
        }

        .amount-option.selected {
            background-color: #b30d00;
            border-color: #b30d00;
            color: white;
            transform: scale(1.02);
            box-shadow: 0 4px 6px rgba(179, 13, 0, 0.2);
        }

        .form-group {
            margin-bottom: 2rem;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.75rem;
            color: #374151;
            font-weight: 600;
            font-size: 1rem;
            transition: color 0.2s ease;
        }

        .form-control {
            width: 100%;
            padding: 1rem;
            border: 2px solid #E5E7EB;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background-color: #f9fafb;
        }

        .form-control:focus {
            outline: none;
            border-color: #b30d00;
            box-shadow: 0 0 0 3px rgba(179, 13, 0, 0.1);
            background-color: white;
        }

        .form-control::placeholder {
            color: #9CA3AF;
        }

        .btn-donate {
            background-color: #b30d00;
            color: white;
            padding: 1rem;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            margin-top: 1.5rem;
            position: relative;
            overflow: hidden;
        }

        .btn-donate:hover {
            background-color: #8b0900;
            transform: translateY(-1px);
            box-shadow: 0 4px 6px rgba(139, 9, 0, 0.2);
        }

        .btn-donate:active {
            transform: translateY(0);
        }

        .checkbox-wrapper {
            display: flex;
            align-items: center;
            margin-bottom: 2rem;
            padding: 0.75rem;
            background-color: #f9fafb;
            border-radius: 8px;
            transition: background-color 0.2s ease;
        }

        .checkbox-wrapper:hover {
            background-color: #f3f4f6;
        }

        .checkbox-wrapper input[type="checkbox"] {
            margin-right: 1rem;
            width: 1.5rem;
            height: 1.5rem;
            border: 2px solid #E5E7EB;
            border-radius: 6px;
            cursor: pointer;
            accent-color: #b30d00;
            transition: all 0.2s ease;
        }

        .checkbox-wrapper label {
            margin: 0;
            font-size: 1rem;
            color: #374151;
            cursor: pointer;
            user-select: none;
            font-weight: 500;
        }

        .error {
            color: #b30d00;
            margin-top: 0.75rem;
            font-size: 0.9rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .error:before {
            content: '⚠';
            font-size: 1rem;
        }

        #custom-amount-wrapper {
            margin-top: 1rem;
            transition: all 0.3s ease;
        }

        #anonymous-info {
            background-color: #f3f4f6;
            border-left: 4px solid #b30d00;
            padding: 1rem 1.25rem;
            border-radius: 6px;
            margin-bottom: 2rem;
            transition: all 0.3s ease;
        }

        #anonymous-info p {
            margin: 0;
            color: #4b5563;
            font-size: 0.95rem;
            line-height: 1.5;
        }

        .loading {
            display: inline-block;
            width: 1.5rem;
            height: 1.5rem;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        @media (max-width: 640px) {
            .amount-options {
                grid-template-columns: repeat(2, 1fr);
            }

            .donation-form {
                padding: 1.5rem;
            }

            .btn-donate {
                padding: 0.875rem;
            }
        }
    </style>
    @endpush

    <div class="about-us-section-area about-bg margin-bottom-60" style="background-image: url({{asset('assets/images/about-bg.png')}});">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="about-inner donation-single">
                        <h1 class="title" style="color:white">Make a Donation</h1>
                    </div>
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{{route('index')}}">Home</a></li>
                            <li><a href="{{route('donate')}}">Donate</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="donation-content-section py-12 bg-gray-50">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="donation-form">
                        @if(session('success'))
                            <div class="alert alert-success mb-4" style="background-color: #dcfce7; color: #166534; padding: 1rem; border-radius: 6px; margin-bottom: 1.5rem;">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger mb-4" style="background-color: #fee2e2; color: #991b1b; padding: 1rem; border-radius: 6px; margin-bottom: 1.5rem;">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form id="donation-form">
                            @csrf
                            <div class="form-group">
                                <label>Select Amount</label>
                                <div class="amount-options">
                                    <div class="amount-option" data-amount="10">£10</div>
                                    <div class="amount-option" data-amount="25">£25</div>
                                    <div class="amount-option" data-amount="50">£50</div>
                                    <div class="amount-option" data-amount="100">£100</div>
                                    <div class="amount-option" data-amount="custom">Custom</div>
                                </div>
                                <div id="custom-amount-wrapper" style="display: none;">
                                    <input type="number" class="form-control" id="custom-amount" placeholder="Enter amount in £" min="1" step="0.01">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter your full name" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter your email address" required>
                            </div>

                            <div class="form-group">
                                <label for="message">Message (Optional)</label>
                                <textarea class="form-control" id="message" rows="3" placeholder="Enter your message here (optional)"></textarea>
                            </div>

                            <div class="checkbox-wrapper">
                                <input type="checkbox" id="is_anonymous" name="is_anonymous" style="display: block; height: 15px ; width: 15px; ">
                                <label for="is_anonymous">Make this donation anonymous</label>
                            </div>

                            <div id="anonymous-info" class="mb-4" style="display: none; padding: 1rem; background-color: #f3f4f6; border-radius: 6px; margin-bottom: 1.5rem;">
                                <p style="margin: 0; color: #4b5563; font-size: 0.9rem;">
                                    When making an anonymous donation, your name will not be displayed publicly, but we'll still need your details for our records and to process your donation.
                                </p>
                            </div>
                            <div class="checkbox-wrapper">
                                <input type="checkbox" id="" name="" style="display: block; height: 15px ; width: 15px; ">
                                <label for=""> I confirm that I have read and accept the Payment Policies.</label>
                            </div>

                               <a href="{{route('donationTerms')}}" style="margin-top: 10px;  color: #b30d00;cursor: pointer; font-size: 16px; margin-right: 10px">
                                   Donation Terms & Conditions
                                </a>


                            <button type="submit" class="btn-donate" id="submit-button">
                                <span id="button-text">Make Donation</span>
                                <span id="spinner" class="loading" style="display: none;"></span>
                            </button>



                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const stripe = Stripe('{{ $stripeKey }}');
            let selectedAmount = null;
            const amountOptions = document.querySelectorAll('.amount-option');
            const customAmountInput = document.getElementById('custom-amount');
            const form = document.getElementById('donation-form');
            const submitButton = document.getElementById('submit-button');
            const spinner = document.getElementById('spinner');
            const buttonText = document.getElementById('button-text');
            const anonymousCheckbox = document.getElementById('is_anonymous');
            const anonymousInfo = document.getElementById('anonymous-info');

            // Handle amount selection
            amountOptions.forEach(option => {
                option.addEventListener('click', function() {
                    amountOptions.forEach(opt => opt.classList.remove('selected'));
                    this.classList.add('selected');
                    if (this.dataset.amount === 'custom') {
                        document.getElementById('custom-amount-wrapper').style.display = 'block';
                        selectedAmount = null;
                        customAmountInput.value = '';
                        customAmountInput.focus();
                    } else {
                        document.getElementById('custom-amount-wrapper').style.display = 'none';
                        selectedAmount = parseFloat(this.dataset.amount);
                        customAmountInput.value = '';
                    }
                });
            });

            customAmountInput.addEventListener('input', function() {
                selectedAmount = parseFloat(this.value) || null;
            });

            // Handle anonymous checkbox
            anonymousCheckbox.addEventListener('change', function() {
                anonymousInfo.style.display = this.checked ? 'block' : 'none';
            });

            // Handle form submission
            form.addEventListener('submit', async function(event) {
                event.preventDefault();

                const amount = selectedAmount || parseFloat(customAmountInput.value);
                if (!amount || amount <= 0) {
                    showError('Please select or enter a valid donation amount');
                    return;
                }

                setLoading(true);

                try {
                    const response = await fetch('/create-checkout-session', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                        },
                        body: JSON.stringify({
                            amount: amount,
                            name: document.getElementById('name').value,
                            email: document.getElementById('email').value,
                            message: document.getElementById('message').value,
                            is_anonymous: document.getElementById('is_anonymous').checked
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
                    showError('An error occurred while processing your donation');
                }

                setLoading(false);
            });

            function setLoading(isLoading) {
                submitButton.disabled = isLoading;
                spinner.style.display = isLoading ? 'inline-block' : 'none';
                buttonText.style.display = isLoading ? 'none' : 'inline';
            }

            function showError(message) {
                const errorElement = document.createElement('div');
                errorElement.className = 'error';
                errorElement.textContent = message;
                form.appendChild(errorElement);
                setTimeout(() => {
                    errorElement.remove();
                }, 6000);
            }
        });
    </script>
    @endpush
</x-front.layout>
