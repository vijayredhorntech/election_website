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
                <div class="flex justify-center text-center">
                    <span class="font-semibold text-black text-2xl mt-8">Pay by Direct Debit</span>
                </div>

                <div class="flex justify-center space-x-4 mt-12">
                    <label class="inline-flex items-center">
                        <input type="radio" name="donationType" value="once" class="hidden" checked>
                        <span class="donation-type-btn px-6 py-3 rounded-full cursor-pointer border-2 gradient-bg text-white border-[#d53369]" data-type="once">
                                Monthly
                            </span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="donationType" value="monthly" class="hidden">
                        <span class="donation-type-btn px-6 py-3 rounded-full cursor-pointer border-2 bg-white text-[#d53369] border-[#d53369] hover:border-[#daae51]" data-type="monthly">
                                Annually
                            </span>
                    </label>
                </div>



                <div class="mt-6">
                    <label for="" class="font-semibold text-md text-gray-700">Sort code</label>
                    <div class="grid lg:grid-cols-3 grid-cols-1 gap-6">

                        <div class=" w-full flex-col gap-1 ">
                            <input type="number" class="w-full rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black">
                        </div>
                        <div class=" w-full flex-col gap-1 ">
                            <input type="number"   class="w-full rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black">
                        </div>
                        <div class=" w-full flex-col gap-1 ">
                            <input type="number"   class="w-full rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black">
                        </div>
                    </div>
                </div>

                <div class=" w-full flex-col gap-1 mt-6 ">
                    <label for="" class="font-semibold text-md text-gray-700">Account Number</label>
                    <input type="text"  class="w-full rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black">
                </div>
                <div class=" w-full flex-col gap-1 mt-6 ">
                    <label for="" class="font-semibold text-md text-gray-700">Name on Account</label>
                    <input type="text"  class="w-full rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black">
                </div>
                <div class="mt-20">
                      <span class="text-gray-700 font-medium text-md mt-4"> Your payments are protected by the <a
                              href="" class="text-red-600">Direct Debit Guarantee.</a></span>
                </div>




                <div class="w-full flex mt-2">
                    <a href="" class="w-full text-center bg-red-500 px-4 py-3 rounded-full text-white font-semibold hover:bg-red-700 transition ease-in duration-200 cursor-pointer">View Summary <i class="fa fa-angle-right"></i> </a>
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
