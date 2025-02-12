<x-front.layout>
    @push('styles')
        <style>
            .gradient-bg {
                background: linear-gradient(to right, #d53369, #daae51);
            }
        </style>
    @endpush

    <section class="bg-gray-100 lg:py-40 md:py-24 sm:py-24 py-16 mt-24 px-4 bg-center bg-cover"
             style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url({{asset('assets/images/GettyImages-2157434514.jpg')}})">
        <div class="container lg:max-w-3xl  bg-white mx-auto  text-gray-800 rounded-[5px]">
            <div class="bg-white px-4 py-12 flex flex-col items-center text-center rounded-[5px] shadow-lg shadow-gray-800">
                <span class="text-black font-bold text-2xl">Fill your address information</span>
                <span class="text-gray-500 font-medium text-sm mt-2">
                    We need your address information to send you the membership card and other important information.
                </span>
                @if(session('error'))
                    <div class="text-red-600 text-sm font-semibold mt-4">{{session('error')}}</div>
                @endif @if(session('success'))
                    <div class="text-green-600 text-sm font-semibold mt-4">{{session('success')}}</div>
                @endif
                <form action="{{route('storeMemberAddressInformation')}}" enctype="multipart/form-data" method="post" class="w-full mt-8 lg:px-8">
                    @csrf
                    <div class=" w-full flex flex-col items-start">
                        <div class="flex flex-col items-start w-full gap-1">
                            <label for="" class="text-gray-500 text-sm">Address</label>
                            <input type="text" name="address" value="{{old('address')}}" class="w-full bg-gray-100 rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black" placeholder="Address.....">
                            @error('address')<span class="text-red-600 text-sm font-semibold">{{$message}}</span>@enderror
                        </div>

                        <div class="mt-4 w-full gap-4 grid lg:grid-cols-2 md:grid-cols-2 grid-cols-1">
                            <div class="flex flex-col items-start w-full gap-1">
                                <label for="" class="text-gray-500 text-sm">Post Code</label>
                                <input type="text" name="postcode" value="{{old('postcode')}}" class="w-full bg-gray-100 rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black" placeholder="Post Code.....">
                                @error('postcode')<span class="text-red-600 text-sm font-semibold">{{$message}}</span>@enderror
                            </div>
                            <div class="flex flex-col items-start w-full gap-1">
                                <label for="" class="text-gray-500 text-sm">City</label>
                                <input type="text" name="city" class="w-full bg-gray-100 rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black" placeholder="City.....">
                                @error('city')<span class="text-red-600 text-sm font-semibold">{{$message}}</span>@enderror
                            </div>
                        </div>

                        <div class="mt-4 w-full gap-4 grid lg:grid-cols-3 md:grid-cols-3 grid-cols-1">
                            <div class="flex flex-col items-start w-full gap-1">
                                <label for="" class="text-gray-500 text-sm">Country</label>
                                <select name="country_id" class="w-full bg-gray-100 rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black">
                                    <option value="">Select Country</option>
                                        <option value="1">India</option>
                                        <option value="2">USA</option>
                                        <option value="3">UK</option>
                                </select>
                                @error('country_id')<span class="text-red-600 text-sm font-semibold">{{$message}}</span>@enderror
                            </div>
                            <div class="flex flex-col items-start w-full gap-1">
                                <label for="" class="text-gray-500 text-sm">County</label>
                                <select name="county_id" class="w-full bg-gray-100 rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black">
                                    <option value="">Select County</option>
                                    <option value="1">India</option>
                                    <option value="2">USA</option>
                                    <option value="3">UK</option>
                                </select>
                                @error('county_id')<span class="text-red-600 text-sm font-semibold">{{$message}}</span>@enderror
                            </div>
                            <div class="flex flex-col items-start w-full gap-1">
                                <label for="" class="text-gray-500 text-sm">Constituency</label>
                                <select name="constituency_id" class="w-full bg-gray-100 rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black">
                                    <option value="">Select County</option>
                                    <option value="1">India</option>
                                    <option value="2">USA</option>
                                    <option value="3">UK</option>
                                </select>
                                @error('constituency_id')<span class="text-red-600 text-sm font-semibold">{{$message}}</span>@enderror
                            </div>
                        </div>

                    </div>
                    <div class="w-full flex mt-8">
                        <button type="submit" class="w-full text-center bg-red-500 px-4 py-3 rounded-full text-white font-semibold hover:bg-red-700 transition ease-in duration-200 cursor-pointer"> Save and Continue <i class="fa fa-persson ml-2"></i></button>
                    </div>
                </form>

                <span class="text-gray-500 font-medium text-sm mt-2"> Read more about how we use your data in our <a
                        href="" class="text-red-600">privacy policy</a> here. You can unsubscribe at any time.</span>

                <div class="bg-gray-100 border-[1px] border-gray-200 px-4 py-8 mt-12 rounded-[10px] flex flex-col items-start gap-4 w-full" >
                    <span class="font-semibold text-black text-xl" >What is Membership?</span>
                    <a href="" class="text-red-600">Learn More <i class="fa fa-angle-right"></i> </a>
                </div>

            </div>

        </div>
    </section>

    @push('scripts')
    @endpush
</x-front.layout>
