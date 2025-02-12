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
                <span class="text-black font-bold text-2xl">Tell Us More About Your Self</span>
                <span class="text-gray-500 font-medium text-sm mt-2">Join hundreds of thousands of party members as we fix the foundations and rebuild UK.</span>
                @if(session('error'))
                    <div class="text-red-600 text-sm font-semibold mt-4">{{session('error')}}</div>
                @endif @if(session('success'))
                    <div class="text-green-600 text-sm font-semibold mt-4">{{session('success')}}</div>
                @endif
                <form action="{{route('storeMemberBasicInformation')}}" enctype="multipart/form-data" method="post" class="w-full mt-8 lg:px-8">
                    @csrf
                    <div class=" w-full flex flex-col items-start">
                        <div class="flex flex-col items-start w-full gap-1">
                            <label for="" class="text-gray-500 text-sm">Profile Photo</label>
                            <input type="file" name="profile_photo" class="w-full bg-gray-100 rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black" placeholder="Enter your name.....">
                            @error('profile_photo')<span class="text-red-600 text-sm font-semibold">{{$message}}</span>@enderror
                        </div>

                       <div class="mt-4 gap-4 grid lg:grid-cols-3 md:grid-cols-3 grid-cols-1">
                           <div class="flex flex-col items-start w-full gap-1">
                               <label for="" class="text-gray-500 text-sm">Title</label>
                               <input type="text" name="title" value="{{old('title')}}" class="w-full bg-gray-100 rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black" placeholder="Enter your title.....">
                               @error('title')<span class="text-red-600 text-sm font-semibold">{{$message}}</span>@enderror
                           </div>
                           <div class="flex flex-col items-start w-full gap-1">
                               <label for="" class="text-gray-500 text-sm">Date of Birth</label>
                               <input type="date" name="dob" class="w-full bg-gray-100 rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black" placeholder="Enter your email.....">
                               @error('dob')<span class="text-red-600 text-sm font-semibold">{{$message}}</span>@enderror
                           </div>
                           <div class="flex flex-col items-start w-full gap-1">
                               <label for="" class="text-gray-500 text-sm">Gender</label>
                               <input type="text" name="gender" value="{{old('gender')}}" class="w-full bg-gray-100 rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black" placeholder="Enter your gender.....">
                               @error('gender')<span class="text-red-600 text-sm font-semibold">{{$message}}</span>@enderror
                           </div>
                       </div>

                        <div class="mt-4 gap-4 grid lg:grid-cols-3 md:grid-cols-3 grid-cols-1">
                            <div class="flex flex-col items-start w-full gap-1">
                                <label for="" class="text-gray-500 text-sm">Marital Status</label>
                                <input type="text" name="marital_status" value="{{old('marital_status')}}" class="w-full bg-gray-100 rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black" placeholder="Marital Status.....">
                                @error('marital_status')<span class="text-red-600 text-sm font-semibold">{{$message}}</span>@enderror
                            </div>
                            <div class="flex flex-col items-start w-full gap-1">
                                <label for="" class="text-gray-500 text-sm">Qualification</label>
                                <input type="text" name="qualification" value="{{old('qualification')}}" class="w-full bg-gray-100 rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black" placeholder="Qualification.....">
                                @error('qualification')<span class="text-red-600 text-sm font-semibold">{{$message}}</span>@enderror
                            </div>
                            <div class="flex flex-col items-start w-full gap-1">
                                <label for="" class="text-gray-500 text-sm">Profession</label>
                                <input type="text" name="profession" value="{{old('profession')}}" class="w-full bg-gray-100 rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black" placeholder="Profession.....">
                                @error('profession')<span class="text-red-600 text-sm font-semibold">{{$message}}</span>@enderror
                            </div>
                        </div>

                        <div class="w-full mt-4 gap-4 grid lg:grid-cols-2 md:grid-cols-2 grid-cols-1">
                            <div class="flex flex-col items-start w-full gap-1">
                                <label for="" class="text-gray-500 text-sm">Primary Mobile Number</label>
                                <input type="text" name="primary_mobile_number" value="{{old('primary_mobile_number')}}" class="w-full bg-gray-100 rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black" placeholder="Primary number.....">
                                @error('primary_mobile_number')<span class="text-red-600 text-sm font-semibold">{{$message}}</span>@enderror
                            </div>
                            <div class="flex flex-col items-start w-full gap-1">
                                <label for="" class="text-gray-500 text-sm">Alternate Mobile Number</label>
                                <input type="text" name="alternate_mobile_number" value="{{old('alternate_mobile_number')}}" class="w-full bg-gray-100 rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black" placeholder="Alternate number.....">
                                @error('alternate_mobile_number')<span class="text-red-600 text-sm font-semibold">{{$message}}</span>@enderror
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
