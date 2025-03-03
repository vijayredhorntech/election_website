<x-front.layout>
    <section class="donation-hero py-5 gradient-bg text-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center py-4">
                    <h1 class="display-4 fw-bold mb-3 text-white">Support Our Movement</h1>
                    <p class="lead fs-4 text-white">Your donation helps us build a stronger, more united Britain</p>
                </div>
            </div>
        </div>
    </section>

    <section class="donation-options py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="donation-form bg-white p-4 rounded-lg shadow-sm">
                        <h2 class="text-center mb-4 fw-bold">Choose Donation Amount</h2>
                        <div class="amount-options mb-4">
                            <div class="row g-3">
                                <div class="col-6 col-md-3">
                                    <button class="btn btn-outline-primary w-100 donation-btn" data-amount="10">£10</button>
                                </div>
                                <div class="col-6 col-md-3">
                                    <button class="btn btn-outline-primary w-100 donation-btn" data-amount="25">£25</button>
                                </div>
                                <div class="col-6 col-md-3">
                                    <button class="btn btn-outline-primary w-100 donation-btn" data-amount="50">£50</button>
                                </div>
                                <div class="col-6 col-md-3">
                                    <button class="btn btn-outline-primary w-100 donation-btn" data-amount="100">£100</button>
                                </div>
                            </div>
                            <div class="custom-amount mt-4">
                                <input type="number" class="form-control form-control-lg" placeholder="Other Amount" id="customAmount">
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="{{ route('donnerDetails') }}" class="btn btn-primary btn-lg px-5 py-3 fw-bold">Continue</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
    .gradient-bg {
        background: linear-gradient(135deg, #c41e3a 0%, #e74c3c 100%);
    }
    .donation-form {
        border-radius: 15px;
        transition: all 0.3s ease;
        color: #333;
    }
    .donation-form h2 {
        color: #1a1a1a;
        font-size: 2rem;
        text-shadow: 1px 1px 1px rgba(0,0,0,0.1);
    }
    .donation-btn {
        border: 2px solid #c41e3a;
        transition: all 0.3s ease;
        font-weight: 700;
        font-size: 1.2rem;
        padding: 0.8rem 1rem;
        border-radius: 8px;
        color: #c41e3a;
        background-color: #fff;
    }
    .donation-btn.selected {
        border-color: #c41e3a;
        background-color: #c41e3a;
        color: #fff;
        transform: scale(1.05);
        box-shadow: 0 4px 12px rgba(196, 30, 58, 0.3);
    }
    .btn-primary {
        background-color: #c41e3a;
        border-color: #c41e3a;
        transition: all 0.3s ease;
        color: #fff;
        font-weight: 700;
        text-shadow: 1px 1px 1px rgba(0,0,0,0.2);
    }
    .btn-primary:hover {
        background-color: #a01830;
        border-color: #a01830;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(196, 30, 58, 0.3);
    }
    .btn-outline-primary {
        color: #c41e3a;
        border-color: #c41e3a;
        font-weight: 600;
    }
    .btn-outline-primary:hover {
        background-color: #c41e3a;
        border-color: #c41e3a;
        color: #fff;
        transform: translateY(-2px);
    }
    .form-control {
        border: 2px solid #dee2e6;
        transition: all 0.3s ease;
        color: #333;
        font-size: 1.1rem;
        font-weight: 500;
    }
    .form-control:focus {
        border-color: #c41e3a;
        box-shadow: 0 0 0 0.2rem rgba(196, 30, 58, 0.15);
        color: #1a1a1a;
    }
    .lead {
        text-shadow: 1px 1px 1px rgba(0,0,0,0.2);
        font-weight: 500;
    }
    </style>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const donationButtons = document.querySelectorAll('.donation-btn');
        const customAmountInput = document.getElementById('customAmount');

        donationButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                donationButtons.forEach(btn => btn.classList.remove('selected'));
                this.classList.add('selected');
                customAmountInput.value = '';
            });
        });

        customAmountInput.addEventListener('input', function() {
            donationButtons.forEach(btn => btn.classList.remove('selected'));
        });
    });
    </script>
</x-front.layout>
