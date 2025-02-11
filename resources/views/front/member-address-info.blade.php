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
                    <span class="font-semibold text-black text-2xl mt-8">Find your address</span>
                </div>

                <div class=" w-full flex-col gap-1 mt-6 ">
                    <label for="" class="font-semibold text-md text-gray-700">Enter your post code</label>
                    <input type="text" placeholder="Post code..."  class="w-full rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black">
                </div>

                <div class="flex justify-center text-center">
                    <span class="font-medium text-gray-600 text-md mt-8 underline">Manually enter address</span>
                </div>


                <div class=" w-full flex-col gap-1 mt-6 ">
                    <label for="" class="font-semibold text-md text-gray-700">Address Line 1</label>
                    <input type="text" placeholder="Address line 1"  class="w-full rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black">
                </div>

                <div class=" w-full flex-col gap-1 mt-6 ">
                    <label for="" class="font-semibold text-md text-gray-700">Address Line 2 <span class="text-xs text-gray-500">(Optional)</span></label>
                    <input type="text" placeholder="Address line 2"  class="w-full rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black">
                </div>

                <div class="grid lg:grid-cols-2 grid-cols-1 gap-6 mt-6">
                    <div class=" w-full flex-col gap-1 ">
                        <label for="" class="font-semibold text-md text-gray-700">City</label>
                        <input type="text"  placeholder="Town or City..." class="w-full rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black">
                    </div>
                    <div class=" w-full flex-col gap-1 ">
                        <label for="" class="font-semibold text-md text-gray-700">Post Code</label>
                        <input type="text"  placeholder="Post code..." class="w-full rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black">
                    </div>
                </div>

                <div class="mt-6 w-full flex-col gap-1 ">
                    <label for="" class="font-semibold text-md text-gray-700">Country</label>
                    <select  class="w-full rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black">
                        <option value="">--Select your country--</option>
                        <option value="">India</option>
                        <option value="">UK</option>
                    </select>
                </div>

                <div class="w-full flex mt-8">
                    <a href="{{route('donationSection')}}" class="w-full text-center bg-red-500 px-4 py-3 rounded-full text-white font-semibold hover:bg-red-700 transition ease-in duration-200 cursor-pointer">Continue <i class="fa fa-angle-right"></i> </a>
                </div>

            </div>

        </div>
    </section>

    @push('scripts')
    @endpush
</x-front.layout>
