<x-front.layout>
    <section class="donation-hero py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <h1>Support Our Movement</h1>
                    <p class="lead">Your donation helps us build a stronger, more united Britain</p>
                </div>
            </div>
        </div>
    </section>

    <section class="donation-options py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="donation-form">
                        <h2 class="text-center mb-4">Choose Donation Amount</h2>
                        <div class="amount-options mb-4">
                            <div class="row">
                                <div class="col-6 col-md-3 mb-3">
                                    <button class="btn btn-outline-primary w-100" data-amount="10">£10</button>
                                </div>
                                <div class="col-6 col-md-3 mb-3">
                                    <button class="btn btn-outline-primary w-100" data-amount="25">£25</button>
                                </div>
                                <div class="col-6 col-md-3 mb-3">
                                    <button class="btn btn-outline-primary w-100" data-amount="50">£50</button>
                                </div>
                                <div class="col-6 col-md-3 mb-3">
                                    <button class="btn btn-outline-primary w-100" data-amount="100">£100</button>
                                </div>
                            </div>
                            <div class="custom-amount mt-3">
                                <input type="number" class="form-control" placeholder="Other Amount">
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="{{ route('donnerDetails') }}" class="btn btn-primary btn-lg">Continue</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-front.layout>
