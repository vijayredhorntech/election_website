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
        <div class="container lg:max-w-lg  bg-white mx-auto  text-gray-800 rounded-[5px]">
            <div class="bg-white px-4 py-12 flex flex-col items-center text-center rounded-[5px] shadow-lg shadow-gray-800">
                <span class="text-black font-bold text-2xl">Change has begun, be part of it </span>
                <span class="text-gray-500 font-medium text-sm mt-2">Join hundreds of thousands of party members as we fix the foundations and rebuild UK.</span>
                @if(session('error'))
                    <div class="text-red-600 text-sm font-semibold mt-4">{{session('error')}}</div>
                @endif @if(session('success'))
                    <div class="text-green-600 text-sm font-semibold mt-4">{{session('success')}}</div>
                @endif
                <form action="{{$formData['url']}}" method="{{$formData['method']}}" class="w-full mt-8 lg:px-8">
                    @csrf
                    <div class=" w-full flex flex-col items-start">
                        <div class="flex flex-col items-start w-full gap-1">
                            <label for="" class="text-gray-500 text-sm">Name</label>
                            <input {{$formData['type']==='validate'?'disabled':''}} value="{{ $userName ?? old('name') }}" type="text" name="name" class="w-full bg-gray-100 rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-red-500" placeholder="Enter your name.....">
                            @error('name')<span class="text-red-600 text-sm font-semibold">{{$message}}</span>@enderror
                        </div>

                        <div class="flex flex-col items-start w-full gap-1 mt-4">
                            <label for="" class="text-gray-500 text-sm">Email Address</label>
                            <input {{$formData['type']==='validate'?'disabled':''}} value="{{ $email ?? old('email') }}" type="email" name="email" class="w-full bg-gray-100 rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-red-500" placeholder="Enter your email.....">
                            @error('email')<span class="text-red-600 text-sm font-semibold">{{$message}}</span>@enderror
                        </div>
                        @if ($formData['type']==='validate')
                            <div class="flex flex-col items-start w-full gap-1">
                                <input value="{{ $email }}" type="email" name="verifiedEmail" class="hidden w-full bg-gray-100 rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-red-500" placeholder="Enter your membership number.....">
                            </div>

                            <div class="flex flex-col items-start w-full gap-1 mt-4">
                                <label for="" class="text-gray-500 text-sm">Enter Otp</label>
                                <input  type="number" name="otp" value="{{old('otp')}}" class="w-full bg-gray-100 rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-red-500" placeholder="Enter your otp.....">
                                @error('otp')<span class="text-red-600 text-sm font-semibold">{{$message}}</span>@enderror
                            </div>
                        @endif

                        @if ($formData['type']==='register')
                                <div class="mt-4 flex flex-col gap-2 ">
                                    <div class="flex gap-2 items-center">
                                        <input type="checkbox" name="termsAndConditionCheckbox" class="rounded-[3px] border-[1px] border-red-600 h-4 w-4  focus:outline-none focus:ring-0 text-red-500 bg-red-500 focus:border-red-700 placeholder:text-red-500">
                                        <label for="" class="font-semibold text-sm text-gray-500">Currently not a member of any other party</label>
                                    </div>
                                    @error ('termsAndConditionCheckbox')<span class="text-red-600 text-sm font-semibold">{{$message}}</span>@enderror
                                </div>
                            @endif
                    </div>
                    <div class="w-full flex mt-8">
                        <button type="submit" class="w-full text-center bg-red-500 px-4 py-3 rounded-full text-white font-semibold hover:bg-red-700 transition ease-in duration-200 cursor-pointer"> {{$formData['type']==='register'?'Send OTP':'Verify OTP'}} <i class="fa fa-{{$formData['type']==='register'?'angle-right':'lock'}} ml-2"></i></button>
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
