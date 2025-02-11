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
                    <span class="font-semibold text-black text-2xl mt-8">Pick your membership rate</span>
                </div>
                <div class="bg-gray-100 border-[1px] border-red-500 px-4 py-8 mt-4 rounded-[10px] flex flex-col gap-2 cursor-pointer hover:border-red-500 transition ease-in duration-200">
                    <span class="font-semibold text-black text-2xl" >£ 5.88/ <span class="text-xs">MO</span></span>
                    <div class="flex flex-col">
                        <span class="text-red-600 font-semibold text-lg">Labour Membership</span>
                        <span class="text-red-600 font-normal text-md">Standard plan</span>

                    </div>
                </div>
                <div class="bg-gray-100 border-[1px] border-gray-200 px-4 py-8 mt-4 rounded-[10px] flex flex-col gap-2 cursor-pointer hover:border-red-500 transition ease-in duration-200">
                    <span class="font-semibold text-black text-2xl" >£ 15.88/ <span class="text-xs">MO</span></span>
                    <div class="flex flex-col">
                        <span class="text-red-600 font-semibold text-lg">Labour Membership</span>
                        <span class="text-red-600 font-normal text-md">Standard plan</span>

                    </div>
                </div>
                <div class="bg-gray-100 border-[1px] border-gray-200 px-4 py-8 mt-4 rounded-[10px] flex flex-col gap-2 cursor-pointer hover:border-red-500 transition ease-in duration-200">
                    <span class="font-semibold text-black text-2xl" >£ 20.88/ <span class="text-xs">MO</span></span>
                    <div class="flex flex-col">
                        <span class="text-red-600 font-semibold text-lg">Labour Membership</span>
                        <span class="text-red-600 font-normal text-md">Standard plan</span>

                    </div>
                </div>
                <div class="mt-6">
                    <a href="{{route('memberBasicInfo')}}" class="hover:text-red-500 mt-4 text-sm text-gray-600 ">
                        Or find out if you're eligible <br> for a reduced rate <i class="fa fa-angle-right"></i>
                    </a>
                </div>


                <div class="w-full flex mt-8">
                    <a href="{{route('memberBasicInfo')}}" class="w-full text-center bg-red-500 px-4 py-3 rounded-full text-white font-semibold hover:bg-red-700 transition ease-in duration-200 cursor-pointer">Continue <i class="fa fa-angle-right"></i> </a>
                </div>

            </div>

        </div>
    </section>

    @push('scripts')
    @endpush
</x-front.layout>
