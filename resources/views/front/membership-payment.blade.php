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
                <form action="{{route('paymentGateway',['email'=>$email,'id'=>$memberShip['id']])}}" method="post" class="w-full mt-8 lg:px-8">
                    @csrf
                    <div class="space-y-4">
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
                    </div>
                </form>

            </div>

        </div>
    </section>

</x-front.layout>
