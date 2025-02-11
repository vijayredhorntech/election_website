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
                    <span class="font-semibold text-black text-2xl mt-8">Tell us a bit about your self</span>
                </div>


                <div class="mt-6 w-full flex-col gap-1 ">
                    <label for="" class="font-semibold text-md text-gray-700">Title</label>
                    <select  class="w-full rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black">
                        <option value="">--Select your title--</option>
                        <option value="">Mr</option>
                        <option value="">Miss</option>
                        <option value="">Mrs</option>
                        <option value="">Ms</option>
                        <option value="">Mx</option>
                        <option value="">Dr</option>
                    </select>
                </div>

                <div class="grid lg:grid-cols-2 grid-cols-1 gap-6 mt-6">
                    <div class=" w-full flex-col gap-1 ">
                        <label for="" class="font-semibold text-md text-gray-700">First Name</label>
                        <input type="text"  placeholder="Enter your first name....." class="w-full rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black">
                    </div>
                    <div class=" w-full flex-col gap-1 ">
                        <label for="" class="font-semibold text-md text-gray-700">Last Name</label>
                        <input type="text"  placeholder="Enter your last name....." class="w-full rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black">
                    </div>
                </div>

                <div class=" w-full flex-col gap-1 mt-6 ">
                    <label for="" class="font-semibold text-md text-gray-700">Date of birth</label>
                    <input type="date"  class="w-full rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black">
                    <span class="text-sm text-gray-600">We use your date of birth to confirm you meet the conditions of membership, to check eligibility to participate in Young Labour, and to fulfil our safeguarding obligations.</span>
                </div>

                <div class=" w-full flex-col gap-1 mt-6 ">
                    <label for="" class="font-semibold text-md text-gray-700">Phone Number</label>
                    <input type="number" placeholder="Enter phone number..."  class="w-full rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black">
                    <span class="text-sm text-gray-600">We'll use your phone number to stay in touch about your application, and let you know how to get involved. You can unsubscribe from mobile calls and SMS at any time.</span>
                </div>





                <div class="w-full flex mt-8">
                    <a href="{{route('memberAddressInfo')}}" class="w-full text-center bg-red-500 px-4 py-3 rounded-full text-white font-semibold hover:bg-red-700 transition ease-in duration-200 cursor-pointer">Continue <i class="fa fa-angle-right"></i> </a>
                </div>

            </div>

        </div>
    </section>

    @push('scripts')
    @endpush
</x-front.layout>
