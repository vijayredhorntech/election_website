<x-front.layout>
    @push('styles')
        <style>
            .gradient-bg {
                background: linear-gradient(to right, #d53369, #daae51);
            }
        </style>
    @endpush

    <section class="bg-gray-100 py-8 mt-24">
        <div class="container lg:max-w-3xl bg-white mx-auto text-gray-800">


            <div class="bg-white px-4 pb-4 flex flex-col">
                <div class="flex flex-col justify-center text-center">
                    <span class="font-semibold text-black text-2xl mt-8">Boost your impact and supercharge our campaigning.</span>
                    <p class="text-sm text-gray-500">Victoria, thousands of members give a little extra each month to power our campaigning —can we count on you to do the same? </p>
                </div>


                <div class="grid grid-cols-3 gap-4 mt-20">
                    <button class="amount-btn p-6 rounded-lg border-2 gradient-bg text-white border-[#d53369]" data-amount="10">
                        £10
                    </button>
                    <button class="amount-btn p-6 rounded-lg border-2 bg-white text-[#d53369] border-[#d53369] hover:border-[#daae51]" data-amount="20">
                        £20
                    </button>
                    <button class="amount-btn p-6 rounded-lg border-2 bg-white text-[#d53369] border-[#d53369] hover:border-[#daae51]" data-amount="50">
                        £50
                    </button>
                    <button class="amount-btn p-6 rounded-lg border-2 bg-white text-[#d53369] border-[#d53369] hover:border-[#daae51]" data-amount="100">
                        £100
                    </button>
                    <button class="amount-btn p-6 rounded-lg border-2 bg-white text-[#d53369] border-[#d53369] hover:border-[#daae51]" data-amount="250">
                        £250
                    </button>
                    <button class="amount-btn p-6 rounded-lg border-2 bg-white text-[#d53369] border-[#d53369] hover:border-[#daae51]" data-amount="500">
                        £500
                    </button>
                    <button class="amount-btn p-6 rounded-lg border-2 bg-white text-[#d53369] border-[#d53369] hover:border-[#daae51]" data-amount="750">
                        £750
                    </button>
                    <button class="amount-btn p-6 rounded-lg border-2 bg-white text-[#d53369] border-[#d53369] hover:border-[#daae51]" data-amount="1000">
                        £1000
                    </button>
                    <button class="amount-btn p-6 rounded-lg border-2 bg-white text-[#d53369] border-[#d53369] hover:border-[#daae51]" data-amount="2000">
                        No Thanks
                    </button>
                </div>



                <div class="w-full flex mt-40">
                    <a href="{{route('paymentSection')}}" class="w-full text-center bg-red-500 px-4 py-3 rounded-full text-white font-semibold hover:bg-red-700 transition ease-in duration-200 cursor-pointer">Continue <i class="fa fa-angle-right"></i> </a>
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


                });
            </script>
        @endpush
</x-front.layout>
