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

                        <div class="w-full mt-4 gap-4 grid lg:grid-cols-3 md:grid-cols-3 grid-cols-1">
                            <div class="flex flex-col items-start w-full gap-1">
                                <label for="" class="text-gray-500 text-sm">Title</label>
                                <select name="title"
                                    class="w-full bg-gray-100 rounded-[3px] border-[1px] px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black border-red-600 transition ease-in duration-2000">
                                    <option value="">Select title</option>
                                    <option value="MR." {{ (old('title', $data->title ?? '') == 'MR.') ? 'selected' : '' }}>MR.</option>
                                    <option value="MRS." {{ (old('title', $data->title ?? '') == 'MRS.') ? 'selected' : '' }}>MRS.</option>
                                    <option value="MISS" {{ (old('title', $data->title ?? '') == 'MISS') ? 'selected' : '' }}>MISS</option>
                                    <option value="DR." {{ (old('title', $data->title ?? '') == 'DR.') ? 'selected' : '' }}>DR.</option>
                                    <option value="MS." {{ (old('title', $data->title ?? '') == 'MS.') ? 'selected' : '' }}>MS.</option>
                                    <option value="PROF." {{ (old('title', $data->title ?? '') == 'PROF.') ? 'selected' : '' }}>PROF.</option>
                                    <option value="OTHER" {{ (old('title', $data->title ?? '') == 'OTHER') ? 'selected' : '' }}>OTHER</option>
                                </select>
                                @error('title')<span class="text-red-600 text-sm font-semibold">{{$message}}</span>@enderror
                            </div>
                            <div class="flex flex-col items-start w-full gap-1">
                                <label for="" class="text-gray-500 text-sm">Date of Birth</label>
                                <input type="date" name="dob" value="{{old('dob')}}" class="w-full bg-gray-100 rounded-[3px] border-[1px] border-red-600 px-4 lg:py-2.5a py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black" placeholder="Enter your date of birth.....">
                                @error('dob')<span class="text-red-600 text-sm font-semibold">{{$message}}</span>@enderror
                            </div>
                            <div class="flex flex-col items-start w-full gap-1">
                                <label for="" class="text-gray-500 text-sm">Gender</label>
                                <select name="gender" class="w-full bg-gray-100 rounded-[3px] border-[1px] px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black border-red-600 transition ease-in duration-2000">
                                    <option value="">Select Gender</option>
                                    <option value="MALE" {{ (old('gender') == 'MALE') ? 'selected' : '' }}>MALE</option>
                                    <option value="FEMALE" {{ (old('gender') == 'FEMALE') ? 'selected' : '' }}>FEMALE</option>
                                    <option value="OTHER" {{ (old('gender') == 'OTHER') ? 'selected' : '' }}>OTHER</option>
                                </select>
                                @error('gender')<span class="text-red-600 text-sm font-semibold">{{$message}}</span>@enderror
                            </div>
                        </div>

                        <div class="mt-4 gap-4 grid lg:grid-cols-3 md:grid-cols-3 grid-cols-1">
                            <div class="flex flex-col items-start w-full gap-1">
                                <label for="" class="text-gray-500 text-sm">Marital Status</label>
                                <select name="marital_status" class="w-full bg-gray-100 rounded-[3px] border-[1px] px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black border-red-600 transition ease-in duration-2000">
                                    <option value="">Select Marital Status</option>
                                    <option value="SINGLE" {{ (old('marital_status') == 'SINGLE') ? 'selected' : '' }}>SINGLE</option>
                                    <option value="MARRIED" {{ (old('marital_status') == 'MARRIED') ? 'selected' : '' }}>MARRIED</option>
                                    <option value="DIVORCED" {{ (old('marital_status') == 'DIVORCED') ? 'selected' : '' }}>DIVORCED</option>
                                    <option value="WIDOWED" {{ (old('marital_status') == 'WIDOWED') ? 'selected' : '' }}>WIDOWED</option>
                                    <option value="OTHER" {{ (old('marital_status') == 'OTHER') ? 'selected' : '' }}>OTHER</option>
                                </select>
                                @error('marital_status')<span class="text-red-600 text-sm font-semibold">{{$message}}</span>@enderror
                            </div>
                            <div class="flex flex-col items-start w-full gap-1">
                                <label for="" class="text-gray-500 text-sm">Qualification</label>
                                <select name="qualification" class="w-full bg-gray-100 rounded-[3px] border-[1px] px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black border-red-600 transition ease-in duration-2000">
                                    <option value="">Select Qualification</option>
                                    <option value="PRIMARY" {{ (old('qualification') == 'PRIMARY') ? 'selected' : '' }}>PRIMARY</option>
                                    <option value="SECONDARY" {{ (old('qualification') == 'SECONDARY') ? 'selected' : '' }}>SECONDARY</option>
                                    <option value="HIGHER SECONDARY" {{ (old('qualification') == 'HIGHER SECONDARY') ? 'selected' : '' }}>HIGHER SECONDARY</option>
                                    <option value="GRADUATE" {{ (old('qualification') == 'GRADUATE') ? 'selected' : '' }}>GRADUATE</option>
                                    <option value="POST GRADUATE" {{ (old('qualification') == 'POST GRADUATE') ? 'selected' : '' }}>POST GRADUATE</option>
                                    <option value="DOCTORATE" {{ (old('qualification') == 'DOCTORATE') ? 'selected' : '' }}>DOCTORATE</option>
                                    <option value="OTHER" {{ (old('qualification') == 'OTHER') ? 'selected' : '' }}>OTHER</option>
                                </select>
                                @error('qualification')<span class="text-red-600 text-sm font-semibold">{{$message}}</span>@enderror
                            </div>
                            <div class="flex flex-col items-start w-full gap-1">
                                <label for="" class="text-gray-500 text-sm">Profession</label>
                                <select name="profession" class="w-full bg-gray-100 rounded-[3px] border-[1px] px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black border-red-600 transition ease-in duration-2000">
                                    <option value="">Select Profession</option>
                                    <option value="STUDENT" {{ (old('profession') == 'STUDENT') ? 'selected' : '' }}>STUDENT</option>
                                    <option value="EMPLOYEE" {{ (old('profession') == 'EMPLOYEE') ? 'selected' : '' }}>EMPLOYEE</option>
                                    <option value="BUSINESS" {{ (old('profession') == 'BUSINESS') ? 'selected' : '' }}>BUSINESS</option>
                                    <option value="SELF EMPLOYED" {{ (old('profession') == 'SELF EMPLOYED') ? 'selected' : '' }}>SELF EMPLOYED</option>
                                    <option value="HOUSEWIFE" {{ (old('profession') == 'HOUSEWIFE') ? 'selected' : '' }}>HOUSEWIFE</option>
                                    <option value="RETIRED" {{ (old('profession') == 'RETIRED') ? 'selected' : '' }}>RETIRED</option>
                                    <option value="LAWYER" {{ (old('profession') == 'LAWYER') ? 'selected' : '' }}>LAWYER</option>
                                    <option value="DOCTOR" {{ (old('profession') == 'DOCTOR') ? 'selected' : '' }}>DOCTOR</option>
                                    <option value="TEACHER" {{ (old('profession') == 'TEACHER') ? 'selected' : '' }}>TEACHER</option>
                                    <option value="OTHER" {{ (old('profession') == 'OTHER') ? 'selected' : '' }}>OTHER</option>
                                </select>
                                @error('profession')<span class="text-red-600 text-sm font-semibold">{{$message}}</span>@enderror
                            </div>
                        </div>
                        <div class="flex flex-col items-start w-full gap-1 mt-4">
                            <label for="" class="text-gray-500 text-sm">National Insurance Number</label>
                            <input type="text" name="national_insurance_number" value="{{old('national_insurance_number')}}" class="w-full bg-gray-100 rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black" placeholder="Enter your national insurance number.....">
                            @error('national_insurance_number')<span class="text-red-600 text-sm font-semibold">{{$message}}</span>@enderror
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

                <div class="bg-gray-100 border-[1px] border-gray-200 px-4 py-8 mt-12 rounded-[10px] flex flex-col items-start gap-4 w-full">
                    <span class="font-semibold text-black text-xl">What is Membership?</span>
                    <a href="" class="text-red-600">Learn More <i class="fa fa-angle-right"></i> </a>
                </div>

            </div>

        </div>
    </section>

    @push('scripts')
    @endpush
</x-front.layout>