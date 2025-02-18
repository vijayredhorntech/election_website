<x-front.layout>
    @push('styles')
    @endpush

    <div class="about-us-section-area about-bg" style="background-image: url({{asset('assets/images/about-bg.png')}});">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="about-inner donation-single">
                        <h1 class="title">{{ucfirst(strtolower(auth()->user()->name))}}'s Profile</h1>
                    </div>
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{{route('index')}}">Home</a></li>
                            <li><a href="{{route('joinUs')}}">{{ucfirst(strtolower(auth()->user()->name))}}'s Profile</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Faq section Start here -->
    <div class="accoridion-section" style="margin-top: 0px; padding-top: 0px; padding-bottom: 10px">
        <div class="container">
            <img src="{{asset('assets/images/shape-06.png')}}" class="shape" alt="">
            <img src="{{asset('assets/images/Ellipse-01.png')}}" class="shape-01" alt="">
            <img src="{{asset('assets/images/Ellipse-02.png')}}" class="shape-02" alt="">


        </div>
        <div class="row">
            <div class="col-12">
                 <div style="width: 100% ; display: flex; justify-content: end; gap: 10px; padding: 20px">


                     <form action="{{route('logout')}}" method="post">
                         @csrf
                         <div class="btn-wrapper" style="width: 100%; display: flex; justify-content: end">
                             <button type="submit" class="boxed-btn btn-sanatory" style="background-color: black"> Download ID <span class="icon-paper-plan"></span></button>
                         </div>
                     </form>
                     <form action="{{route('logout')}}" method="post">
                         @csrf
                         <div class="btn-wrapper" style="width: 100%; display: flex; justify-content: end">
                             <button type="submit" class="boxed-btn btn-sanatory"> Logout <span class="icon-paper-plan"></span></button>
                         </div>
                     </form>
                 </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-12">
                <div class="card wow animate__animated animate__fadeInUp">
                    <div class="card-header" id="headingOwo">
                        <h5 class="mb-0">
                            <a class="collapsed" role="button" data-toggle="collapse" data-target="#collapseOwo" aria-expanded="false" aria-controls="collapseOwo">
                                Basic Information
                            </a>
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="w-full p-2">
                            <div style="display: flex; align-items: center; gap: 10px">
                                <img class="rounded-[3px] mb-4" src="{{asset('storage/'.$memberDetails->profile_photo )}}" alt="">
                                <div>
                                    <img src="{{asset('assets/images/256px-QR_Code_Example.svg.png')}}" alt="" style="height: 200px" >

                                    <a href="" style="color: darkblue; display: flex; align-items: center; gap: 5px"> http://127.0.0.1:8000/joinUs/FRS78HY <i class="fa fa-share"></i> </a>
                                </div>
                            </div>
                            <table class="w-full">
                                <tr>
                                    <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 700">Member id</td>
                                    <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 400"><span class="font-semibold text-black">: &nbsp &nbsp</span> {{$memberDetails->custom_id}}</td>
                                </tr>
                                <tr>
                                    <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 700">Title</td>
                                    <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 400"><span class="font-semibold text-black">: &nbsp &nbsp</span> {{$memberDetails->title}}</td>
                                </tr>
                                <tr>
                                    <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 700">Name</td>
                                    <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 400"><span class="font-semibold text-black">: &nbsp &nbsp</span> {{$memberDetails->first_name}} {{$memberDetails->last_name}}</td>
                                </tr>
                                <tr>
                                    <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 700">DOB</td>
                                    <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 400"><span class="font-semibold text-black">: &nbsp &nbsp</span> {{$memberDetails->date_of_birth}}</td>
                                </tr>
                                <tr>
                                    <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 700">Gender</td>
                                    <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 400"><span class="font-semibold text-black">: &nbsp &nbsp</span> {{$memberDetails->gender}}</td>
                                </tr>
                                <tr>
                                    <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 700">Marital Status</td>
                                    <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 400"><span class="font-semibold text-black">: &nbsp &nbsp</span> {{$memberDetails->marital_status}}</td>
                                </tr>
                                <tr>
                                    <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 700">Qualification</td>
                                    <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 400"><span class="font-semibold text-black">: &nbsp &nbsp</span> {{$memberDetails->qualification}}</td>
                                </tr>
                                <tr>
                                    <td class="w-[150px] font-semibold text-black" style="color: black; font-weight: 700">Profession</td>
                                    <td class=" py-0.5" style="color: black; font-weight: 400"><span class="font-semibold text-black" style="color: black; font-weight: 400">: &nbsp &nbsp</span> {{$memberDetails->profession}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-4 col-sm-4 col-12">
                <div class="card wow animate__animated animate__fadeInUp animate__delay-1s">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <a class="collapsed" role="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseOwo">
                                Contact/ Address Information
                            </a>
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="w-full p-2 font-semibold text-[#b30d00] bg-[#b30d00]/10">
                            <span style="color: black; font-weight: 500; font-size: 20px">Contact Information</span>
                        </div>
                        <div class="w-full p-2">
                            <table class="w-full">
                                <tr>
                                    <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 700">Email id</td>
                                    <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 400"><span class="font-semibold text-black">: &nbsp &nbsp</span> {{$memberDetails->email}}</td>
                                </tr>
                                <tr>
                                    <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 700">Phone</td>
                                    <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 400"><span class="font-semibold text-black">: &nbsp &nbsp</span> {{$memberDetails->primary_mobile_number}}</td>
                                </tr>

                                <tr>
                                    <td class="w-[150px] font-semibold text-black" style="color: black; font-weight: 700">Alternate Number</td>
                                    <td class=" py-0.5" style="color: black; font-weight: 400"><span class="font-semibold text-black" style="color: black; font-weight: 400">: &nbsp &nbsp</span> {{$memberDetails->alternate_mobile_number}}</td>
                                </tr>
                            </table>

                        </div>


                        <div class="w-full p-2 font-semibold text-[#b30d00] bg-[#b30d00]/10">
                            <span style="color: black; font-weight: 500; font-size: 20px">Address Information</span>
                        </div>
                        <div class="w-full p-2">
                            <table class="w-full">
                                <tr>
                                    <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 700">Address</td>
                                    <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 400"><span class="font-semibold text-black">: &nbsp &nbsp</span> {{$memberDetails->address}}</td>
                                </tr>
                                <tr>
                                    <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 700">Post Code</td>
                                    <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 400"><span class="font-semibold text-black">: &nbsp &nbsp</span> {{$memberDetails->postcode}}</td>
                                </tr>
                                <tr>
                                    <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 700">City</td>
                                    <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 400"><span class="font-semibold text-black">: &nbsp &nbsp</span> {{$memberDetails->city}}</td>
                                </tr>
                                <tr>
                                    <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 700">County</td>
                                    <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 400"><span class="font-semibold text-black">: &nbsp &nbsp</span> {{$memberDetails->county->name}}</td>
                                </tr>
                                <tr>
                                    <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 700">Country</td>
                                    <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 400"><span class="font-semibold text-black">: &nbsp &nbsp</span> {{$memberDetails->country->name}}</td>
                                </tr>

                                <tr>
                                    <td class="w-[150px] font-semibold text-black" style="color: black; font-weight: 700">Constituency</td>
                                    <td class=" py-0.5" style="color: black; font-weight: 400"><span class="font-semibold text-black" >: &nbsp &nbsp</span> {{$memberDetails->constituency->name}}</td>
                                </tr>
                            </table>

                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-4 col-sm-4 col-12">
                <div class="card wow animate__animated animate__fadeInUp animate__delay-1s">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <a class="collapsed" role="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseOwo">
                                Membership/ Donation Info
                            </a>
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="w-full p-2 font-semibold text-[#b30d00] bg-[#b30d00]/10">
                            <span style="color: black; font-weight: 500; font-size: 20px">Membership Information</span>
                        </div>
                        <div class="w-full p-2">
                            <table class="w-full">

                                <tr>
                                    <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 700">Start Date</td>
                                    <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 400"><span class="font-semibold text-black">: &nbsp &nbsp</span> 01-01-2025</td>
                                </tr>
                                <tr>
                                    <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 700">End Date</td>
                                    <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 400"><span class="font-semibold text-black">: &nbsp &nbsp</span> 31-12-2025</td>
                                </tr>
                                <tr>
                                    <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 700">Amount</td>
                                    <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 400"><span class="font-semibold text-black">: &nbsp &nbsp</span> £ 15.2</td>
                                </tr>
                                <tr>
                                    <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 700">Type</td>
                                    <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 400"><span class="font-semibold text-black">: &nbsp &nbsp</span> Annually </td>
                                </tr>
                                <tr>
                                    <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 700">Days Remaining</td>
                                    <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 400"><span class="font-semibold text-black">: &nbsp &nbsp</span> 298 days </td>
                                </tr>
                                <tr>
                                    <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 700">Renewal Date</td>
                                    <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 400"><span class="font-semibold text-black">: &nbsp &nbsp</span> 01-01-2026 </td>
                                </tr>
                                <tr>
                                    <td class="w-[150px] font-semibold text-black" style="color: black; font-weight: 700">Invoice</td>
                                    <td class=" py-0.5" style="color: black; font-weight: 400"><span class="font-semibold text-black">: &nbsp &nbsp</span> <a
                                            href="" class="text-[#b30d00] underline">Generate</a></td>
                                </tr>
                            </table>
                        </div>


                        <div class="w-full p-2 font-semibold text-[#b30d00] bg-[#b30d00]/10">
                            <span style="color: black; font-weight: 500; font-size: 20px">Donation Information</span>
                        </div>
                        <div class="w-full p-2">
                            <table style="width: 100%" class="w-full">
                                <tr>
                                    <td class="w-[100px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 700">Sr. No</td>
                                    <td class=" font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 700">Donation Date</td>
                                    <td class=" font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 700">Amount</td>
                                    <td class=" font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 700">Invoice</td>
                                </tr>
                                <tr>
                                    <td class="w-[100px] border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black">1</td>
                                    <td class="w-[100px] border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black">10-01-2025</td>
                                    <td class="w-[100px] border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black"> £ 100.00 </td>
                                    <td class="w-[100px] border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black"> <i class="fa fa-file cursor-pointer"></i> </td>
                                </tr>
                                <tr>
                                    <td class="w-[100px] border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black">2</td>
                                    <td class="w-[100px] border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black">18-01-2025</td>
                                    <td class="w-[100px] border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black"> £ 08.00 </td>
                                    <td class="w-[100px] border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black"> <i class="fa fa-file cursor-pointer"></i> </td>
                                </tr>
                                <tr>
                                    <td class="w-[100px] border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black">3</td>
                                    <td class="w-[100px] border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black">25-01-2025</td>
                                    <td class="w-[100px] border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black"> £ 15.00 </td>
                                    <td class="w-[100px] border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black"> <i class="fa fa-file cursor-pointer"></i> </td>
                                </tr>
                                <tr>
                                    <td class="w-[100px] py-0.5" style="color: black">4</td>
                                    <td class="w-[100px] py-0.5" style="color: black">30-01-2025</td>
                                    <td class="w-[100px] py-0.5" style="color: black"> £ 25.00 </td>
                                    <td class="w-[100px] py-0.5" style="color: black"> <i class="fa fa-file cursor-pointer"></i> </td>
                                </tr>


                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <!-- faq section end here -->






{{--        <div class="col-md-4 col-sm-4 col-12">--}}
{{--            <div class="card wow animate__animated animate__fadeInUp animate__delay-2s">--}}
{{--                <div class="card-header" id="headingThree">--}}
{{--                    <h5 class="mb-0">--}}
{{--                        <a class="collapsed" role="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseOwo">--}}
{{--                            Update Profile--}}
{{--                        </a>--}}
{{--                    </h5>--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <form action="{{route('securityInfoUpdate')}}" method="post">--}}
{{--                        @csrf--}}
{{--                        <div class="flex flex-col items-start w-full gap-1 mt-4">--}}
{{--                            <label for="" class="text-gray-500 text-sm">Email</label>--}}
{{--                            <input type="email" value="{{auth()->user()->email}}" class="form-control" placeholder="Enter your otp.....">--}}
{{--                        </div>--}}
{{--                        <div class="flex flex-col items-start w-full gap-1 mt-4">--}}
{{--                            <label for="" class="text-gray-500 text-sm">New Password</label>--}}
{{--                            <input type="password" name="password" placeholder="Enter new password....." class="form-control">--}}
{{--                            @error('password')<span class="text-red-600 text-sm font-semibold">{{$message}}</span>@enderror--}}
{{--                        </div>--}}
{{--                        <div class="flex flex-col items-start w-full gap-1 mt-4">--}}
{{--                            <label for="" class="text-gray-500 text-sm">Confirm New Password</label>--}}
{{--                            <input type="password" name="confirm_password" placeholder="Confirm new password....." class="form-control">--}}
{{--                            @error('confirm_password')<span class="text-red-600 text-sm font-semibold">{{$message}}</span>@enderror--}}
{{--                        </div>--}}

{{--                        <div class="btn-wrapper" style="width: 100%; display: flex; justify-content: end; margin-top: 10px">--}}
{{--                            <button type="submit" class="boxed-btn btn-sanatory"> Update password <span class="icon-paper-plan"></span></button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}




    @push('scripts')
    @endpush

</x-front.layout>
