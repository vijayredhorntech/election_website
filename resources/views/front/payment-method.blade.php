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
                    <div class="bg-white p-6 rounded-md">
                        <!-- Donation Amount Heading -->
                        <h2 class="text-[#d53369] text-xl font-bold mb-4">Donation Amount £10 </h2>

                        <!-- Payment Options -->
                        <form  class="space-y-4">
                            <!-- Credit/Debit Card Button -->
                            <button class="cursor-pointer w-full bg-blue-500 text-white py-4 px-6 rounded-lg hover:opacity-90 transition-all duration-300 shadow-lg">
                                Pay with Credit/Debit Card
                            </button>

                            <!-- PayPal Button -->
                            <button class="cursor-pointer w-full bg-gray-300 text-black py-4 px-6 rounded-lg flex items-center justify-center hover:opacity-90 transition-all duration-300 shadow-lg">
                                <img src="{{asset('assets/images/pngwing.com.png')}}" alt="PayPal" class="h-6 mr-2"> Pay with PayPal
                            </button>

                            <!-- Google Pay Button -->
                            <button class="cursor-pointer w-full bg-black text-white py-4 px-6 rounded-lg flex items-center justify-center hover:opacity-90 transition-all duration-300 shadow-lg">
                                <img src="{{asset('assets/images/pngwing.com (1).png')}}" alt="Google Pay" class="h-6 mr-2"> Pay with Google Pay
                            </button>
                        </form>
                    </div>


                </div>

            </div>
        </div>
    </section>

    @push('scripts')
    @endpush
</x-front.layout>
