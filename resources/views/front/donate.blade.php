<x-front.layout>
    @push('styles')
    <style>
        .gradient-bg {
            background: linear-gradient(to right, #d53369, #daae51);
        }
    </style>
    @endpush

    <section class="bg-gray-100 py-8 mt-24">
        <div class="container mx-auto px-2 pt-4 pb-12 text-gray-800">
            <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                Secure Donation
            </h1>
            <div class="w-full mb-4">
                <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>


            <div class="flex flex-wrap lg:flex-row flex-col-reverse">
                <div class="w-full lg:w-1/2 p-6">
                    <h3 class="text-3xl text-gray-800 font-bold leading-none mb-3">
                        Help build One Nation's campaign fund
                    </h3>

                    <img class="rounded-md py-6 w-full h-auto " src="{{asset('assets/images/GettyImages-2157434514.jpg')}}" alt="">
                    <p class="text-gray-600 mb-4">
                        Copyright One Nation Party. All rights reserved.
                    </p>

                    <p class="text-gray-600 mb-8">
                        <a href="" class="underline">Privacy Policy</a> &nbsp <a href="" class="underline"> Terms &
                            Conditions</a>
                    </p>
                </div>
                <div class="w-full lg:w-1/2 lgp-20 md:p-20 p-6">
                    <div class="bg-white p-6 rounded-md ">
                        <!-- Donation Type Selection -->
                        <div class="flex justify-center space-x-4 mb-8">
                            <label class="inline-flex items-center">
                                <input type="radio" name="donationType" value="once" class="hidden" checked>
                                <span class="donation-type-btn px-6 py-3 rounded-full cursor-pointer border-2 gradient-bg text-white border-[#d53369]" data-type="once">
                                    Give Once
                                </span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="donationType" value="monthly" class="hidden">
                                <span class="donation-type-btn px-6 py-3 rounded-full cursor-pointer border-2 bg-white text-[#d53369] border-[#d53369] hover:border-[#daae51]" data-type="monthly">
                                    Monthly
                                </span>
                            </label>
                        </div>

                        <!-- Amount Buttons -->
                        <div class="grid grid-cols-3 gap-4 mb-6">
                            <button class="amount-btn py-3 px-4 rounded-lg border-2 gradient-bg text-white border-[#d53369]" data-amount="10">
                                £10
                            </button>
                            <button class="amount-btn py-3 px-4 rounded-lg border-2 bg-white text-[#d53369] border-[#d53369] hover:border-[#daae51]" data-amount="20">
                                £20
                            </button>
                            <button class="amount-btn py-3 px-4 rounded-lg border-2 bg-white text-[#d53369] border-[#d53369] hover:border-[#daae51]" data-amount="50">
                                £50
                            </button>
                            <button class="amount-btn py-3 px-4 rounded-lg border-2 bg-white text-[#d53369] border-[#d53369] hover:border-[#daae51]" data-amount="100">
                                £100
                            </button>
                            <button class="amount-btn py-3 px-4 rounded-lg border-2 bg-white text-[#d53369] border-[#d53369] hover:border-[#daae51]" data-amount="250">
                                £250
                            </button>
                            <button class="amount-btn py-3 px-4 rounded-lg border-2 bg-white text-[#d53369] border-[#d53369] hover:border-[#daae51]" data-amount="500">
                                £500
                            </button>
                        </div>

                        <!-- Custom Amount Input -->
                        <div class="mb-6">
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-[#d53369]">£</span>
                                <input type="number" id="customAmount" value="10"
                                    class="w-full px-8 py-3 rounded-lg border-2 border-[#d53369] focus:border-[#daae51] focus:outline-none text-[#d53369] placeholder-[#d53369]/50"
                                    placeholder="Enter amount">
                            </div>
                        </div>

                        <!-- Donate Button -->
                        <div class="w-full flex justify-end">
                            <a href="{{route('donnerDetails')}}" id="donateBtn" class="w-full text-center gradient-bg text-white py-4 px-6 rounded-lg hover:opacity-90 transition-all duration-300 shadow-lg">
                                Donate Once
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const amountBtns = document.querySelectorAll('.amount-btn');
            const customAmount = document.getElementById('customAmount');
            const donationTypeBtns = document.querySelectorAll('input[name="donationType"]');
            const donateBtn = document.getElementById('donateBtn');
            let selectedAmount = 10;

            // Handle amount button clicks
            amountBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    // Reset all buttons
                    amountBtns.forEach(b => {
                        b.classList.remove('gradient-bg', 'text-white');
                        b.classList.add('bg-white', 'text-[#d53369]');
                    });

                    // Highlight selected button
                    this.classList.remove('bg-white', 'text-[#d53369]');
                    this.classList.add('gradient-bg', 'text-white');

                    // Update custom amount input
                    selectedAmount = this.dataset.amount;
                    customAmount.value = selectedAmount;
                });
            });

            // Handle custom amount input
            customAmount.addEventListener('input', function() {
                // Reset all amount buttons
                amountBtns.forEach(btn => {
                    btn.classList.remove('gradient-bg', 'text-white');
                    btn.classList.add('bg-white', 'text-[#d53369]');
                });
                selectedAmount = this.value;
            });

            // Handle donation type selection
            donationTypeBtns.forEach(btn => {
                btn.addEventListener('change', function() {
                    const donationType = this.value;
                    const allTypeButtons = document.querySelectorAll('.donation-type-btn');

                    // Update button styles
                    allTypeButtons.forEach(typeBtn => {
                        if (typeBtn.dataset.type === donationType) {
                            typeBtn.classList.remove('bg-white', 'text-[#d53369]');
                            typeBtn.classList.add('gradient-bg', 'text-white');
                        } else {
                            typeBtn.classList.remove('gradient-bg', 'text-white');
                            typeBtn.classList.add('bg-white', 'text-[#d53369]');
                        }
                    });

                    // Update donate button text
                    donateBtn.textContent = `Donate ${donationType === 'monthly' ? 'Monthly' : 'Once'}`;
                });
            });
        });
    </script>
    @endpush
</x-front.layout>