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
            <div class="w-full h-64 rounded-t-md relative">
                <img class="w-full h-full object-cover rounded-t-md" src="{{asset('assets/images/GettyImages-2157434514.jpg')}}" alt="">
                <div class="w-full h-full absolute top-0 left-0  bg-black/40 flex flex-col justify-end p-4">
                    <span class="font-semibold text-white lg:text-5xl md:text-3xl text-2xl">Join</span>
                    <span class="font-semibold text-white lg:text-5xl md:text-3xl text-2xl">One Nation Party</span>
                </div>
            </div>

            <div class="bg-white px-4 py-12 flex flex-col">
                <span class="text-black font-bold text-xl">Change has begun, be part of it </span>
                <span class="text-gray-700 font-medium text-md mt-2">Join hundreds of thousands of party members as we fix the foundations and rebuild UK.</span>
                <div class="py-6 w-full">
                    <input type="email" value="test@example.com" disabled class="w-full rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-red-500" placeholder="Enter your email.....">
                </div>
                <div class="pb-6 pt-4 w-full">
                    <input type="email" class="w-full rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-red-500" placeholder="Enter otp.....">
                </div>
                <div class="w-full flex">
                    <a href="{{route('membershipPlans')}}" class="w-full text-center bg-red-500 px-4 py-3 rounded-full text-white font-semibold hover:bg-red-700 transition ease-in duration-200 cursor-pointer">Verify OTP <i class="fa fa-angle-right"></i> </a>
                </div>

                <span class="text-gray-700 font-medium text-md mt-4"> Read more about how we use your data in our <a
                        href="" class="text-red-600">privacy policy</a> here. You can unsubscribe at any time.</span>

                <div class="bg-gray-100 border-[1px] border-gray-200 px-4 py-8 mt-8 rounded-[10px] flex flex-col gap-4">
                    <span class="font-semibold text-black text-xl" >What is Membership?</span>
                    <a href="" class="text-red-600">Learn More <i class="fa fa-angle-right"></i> </a>
                </div>

            </div>

        </div>
    </section>

    @push('scripts')
    @endpush
</x-front.layout>
