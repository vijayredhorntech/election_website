<x-front.layout>
    <section class="bg-gray-100 lg:py-40 md:py-24 sm:py-24 py-16 mt-24 px-4 bg-center bg-cover"
             style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url({{asset('assets/images/GettyImages-2157434514.jpg')}})">
        <div class="container lg:max-w-xl  bg-white mx-auto  text-gray-800 rounded-[5px]">
            <div class="bg-white px-4 py-12 flex flex-col items-center text-center rounded-[5px] shadow-lg shadow-gray-800">
                <span class="text-black font-bold text-2xl">Donation Amount £ {{$memberShip['amount']}}</span>
                <span class="text-gray-500 font-medium text-sm mt-2">
                    Your donation will help us build a better future for the UK.
                </span>
                @if(session('error'))
                    <div class="text-red-600 text-sm font-semibold mt-4">{{session('error')}}</div>
                @endif @if(session('success'))
                    <div class="text-green-600 text-sm font-semibold mt-4">{{session('success')}}</div>
                @endif
                <form id="payment-form" class="w-full mt-8 lg:px-8">
                    @csrf
                    <div class="space-y-4">
                        <button type="submit" id="submit-button" class="cursor-pointer w-full bg-blue-500 text-white py-4 px-6 rounded-lg hover:opacity-90 transition-all duration-300 shadow-lg">
                            <span id="button-text">Pay with Credit/Debit Card</span>
                            <span id="spinner" class="loading" style="display: none;"></span>
                        </button>
                    </div>
                </form>

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

            </div>

        </div>
    </section>

</x-front.layout>
