<x-front.layout>
    @push('styles')
    @endpush

        <div class="about-us-section-area about-bg" style="background-image: url({{asset('assets/images/about-bg.png')}});">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="about-inner donation-single">
                            <h1 class="title">{{auth()->user()->name}} Profile</h1>
                        </div>
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="{{route('index')}}">Home</a></li>
                                <li><a href="{{route('joinUs')}}">{{auth()->user()->name}} Profile</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Faq section Start here -->
        <div class="accoridion-section" style="margin-top: 0px">
            <div class="container">
                <img src="{{asset('assets/images/shape-06.png')}}" class="shape" alt="">
                <img src="{{asset('assets/images/Ellipse-01.png')}}" class="shape-01" alt="">
                <img src="{{asset('assets/images/Ellipse-02.png')}}" class="shape-02" alt="">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-10">
                        <div class="section-title">
                            <h2 class="title wow animate__animated animate__fadeInUp">Profile Details</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="accordion-wrapper">
                            <!-- accordion wrapper -->
                            <div id="accordion">
                                <div class="card wow animate__animated animate__fadeInUp">
                                    <div class="card-header" id="headingOwo">
                                        <h5 class="mb-0">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-target="#collapseOwo" aria-expanded="false" aria-controls="collapseOwo">
                                                Basic Information
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseOwo" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="w-full p-2">
                                                <img class="rounded-[3px] mb-4" src="{{asset('storage/'.$memberDetails->profile_photo )}}" alt="">

                                                <table class="w-full">
                                                    <tr>
                                                        <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5">Member id</td>
                                                        <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5"><span class="font-semibold text-black">: &nbsp &nbsp</span> {{$memberDetails->custom_id}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5">Title</td>
                                                        <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5"><span class="font-semibold text-black">: &nbsp &nbsp</span> {{$memberDetails->title}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5">Name</td>
                                                        <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5"><span class="font-semibold text-black">: &nbsp &nbsp</span> {{$memberDetails->first_name}} {{$memberDetails->last_name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5">DOB</td>
                                                        <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5"><span class="font-semibold text-black">: &nbsp &nbsp</span> {{$memberDetails->date_of_birth}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5">Gender</td>
                                                        <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5"><span class="font-semibold text-black">: &nbsp &nbsp</span> {{$memberDetails->gender}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5">Marital Status</td>
                                                        <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5"><span class="font-semibold text-black">: &nbsp &nbsp</span> {{$memberDetails->marital_status}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5">Qualification</td>
                                                        <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5"><span class="font-semibold text-black">: &nbsp &nbsp</span> {{$memberDetails->qualification}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-[150px] font-semibold text-black">Profession</td>
                                                        <td class=" py-0.5"><span class="font-semibold text-black">: &nbsp &nbsp</span> {{$memberDetails->profession}}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="w-full p-2 border-[1px] border-[#b30d00]/10">
                                                <div class="w-full p-2 font-semibold text-[#b30d00] bg-[#b30d00]/10">
                                                    <span style="color: black; font-weight: 500">Contact Information</span>
                                                </div>
                                                <div class="w-full p-2">
                                                    <table class="w-full">
                                                        <tr>
                                                            <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5">Email id</td>
                                                            <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5"><span class="font-semibold text-black">: &nbsp &nbsp</span> {{$memberDetails->email}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5">Phone</td>
                                                            <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5"><span class="font-semibold text-black">: &nbsp &nbsp</span> {{$memberDetails->primary_mobile_number}}</td>
                                                        </tr>

                                                        <tr>
                                                            <td class="w-[150px] font-semibold text-black">Alternate Number</td>
                                                            <td class=" py-0.5"><span class="font-semibold text-black">: &nbsp &nbsp</span> {{$memberDetails->alternate_mobile_number}}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="w-full p-2 border-[1px] border-[#b30d00]/10">
                                                <div class="w-full p-2 font-semibold text-[#b30d00] bg-[#b30d00]/10">
                                                    <span style="color: black; font-weight: 500">Address Information</span>
                                                </div>
                                                <div class="w-full p-2">
                                                    <table class="w-full">
                                                        <tr>
                                                            <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5">Address</td>
                                                            <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5"><span class="font-semibold text-black">: &nbsp &nbsp</span> {{$memberDetails->address}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5">Post Code</td>
                                                            <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5"><span class="font-semibold text-black">: &nbsp &nbsp</span> {{$memberDetails->postcode}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5">City</td>
                                                            <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5"><span class="font-semibold text-black">: &nbsp &nbsp</span> {{$memberDetails->city}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5">County</td>
                                                            <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5"><span class="font-semibold text-black">: &nbsp &nbsp</span> {{$memberDetails->county->name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5">Country</td>
                                                            <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5"><span class="font-semibold text-black">: &nbsp &nbsp</span> {{$memberDetails->country->name}}</td>
                                                        </tr>

                                                        <tr>
                                                            <td class="w-[150px] font-semibold text-black">Constituency</td>
                                                            <td class=" py-0.5"><span class="font-semibold text-black">: &nbsp &nbsp</span> {{$memberDetails->constituency->name}}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <form action="{{route('logout')}}" method="post">
                                                @csrf
                                                <div class="btn-wrapper" style="width: 100%; display: flex; justify-content: end">
                                                    <button type="submit" class="boxed-btn btn-sanatory"> Logout  <span class="icon-paper-plan"></span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="card wow animate__animated animate__fadeInUp animate__delay-1s">
                                    <div class="card-header" id="headingTwo">
                                        <h5 class="mb-0">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseOwo">
                                                Membership/ Donation Info
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="w-full p-2">
                                                <table class="w-full">
                                                    <tr>
                                                        <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5">Membership Id</td>
                                                        <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5"><span class="font-semibold text-black">: &nbsp &nbsp</span> MEMBER001</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5">Start Date</td>
                                                        <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5"><span class="font-semibold text-black">: &nbsp &nbsp</span> 01-01-2025</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5">End Date</td>
                                                        <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5"><span class="font-semibold text-black">: &nbsp &nbsp</span> 31-12-2025</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5">Amount</td>
                                                        <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5"><span class="font-semibold text-black">: &nbsp &nbsp</span> £ 15.2</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5">Type</td>
                                                        <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5"><span class="font-semibold text-black">: &nbsp &nbsp</span> Annually </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5">Days Remaining</td>
                                                        <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5"><span class="font-semibold text-black">: &nbsp &nbsp</span> 298 days </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5">Renewal Date</td>
                                                        <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5"><span class="font-semibold text-black">: &nbsp &nbsp</span> 01-01-2026 </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-[150px] font-semibold text-black">Invoice</td>
                                                        <td class=" py-0.5"><span class="font-semibold text-black">: &nbsp &nbsp</span> <a
                                                                href="" class="text-[#b30d00] underline">Generate</a></td>
                                                    </tr>
                                                </table>
                                            </div>


                                            <div class="w-full p-2 font-semibold text-[#b30d00] bg-[#b30d00]/10">
                                                <span style="color: black; font-weight: 500">Donation Information</span>
                                            </div>
                                            <div class="w-full p-2">
                                                <table style="width: 100%" class="w-full">
                                                    <tr>
                                                        <td class="w-[100px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5">Sr. No</td>
                                                        <td class=" font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5">Donation Date</td>
                                                        <td class=" font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5">Amount</td>
                                                        <td class=" font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5">Invoice</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-[100px] border-b-[1px] border-b-[#b30d00]/10 py-0.5">1</td>
                                                        <td class="w-[100px] border-b-[1px] border-b-[#b30d00]/10 py-0.5">10-01-2025</td>
                                                        <td class="w-[100px] border-b-[1px] border-b-[#b30d00]/10 py-0.5"> £ 100.00 </td>
                                                        <td class="w-[100px] border-b-[1px] border-b-[#b30d00]/10 py-0.5"> <i class="fa fa-file cursor-pointer"></i> </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-[100px] border-b-[1px] border-b-[#b30d00]/10 py-0.5">2</td>
                                                        <td class="w-[100px] border-b-[1px] border-b-[#b30d00]/10 py-0.5">18-01-2025</td>
                                                        <td class="w-[100px] border-b-[1px] border-b-[#b30d00]/10 py-0.5"> £ 08.00 </td>
                                                        <td class="w-[100px] border-b-[1px] border-b-[#b30d00]/10 py-0.5"> <i class="fa fa-file cursor-pointer"></i> </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-[100px] border-b-[1px] border-b-[#b30d00]/10 py-0.5">3</td>
                                                        <td class="w-[100px] border-b-[1px] border-b-[#b30d00]/10 py-0.5">25-01-2025</td>
                                                        <td class="w-[100px] border-b-[1px] border-b-[#b30d00]/10 py-0.5"> £ 15.00 </td>
                                                        <td class="w-[100px] border-b-[1px] border-b-[#b30d00]/10 py-0.5"> <i class="fa fa-file cursor-pointer"></i> </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-[100px] py-0.5">4</td>
                                                        <td class="w-[100px] py-0.5">30-01-2025</td>
                                                        <td class="w-[100px] py-0.5"> £ 25.00 </td>
                                                        <td class="w-[100px] py-0.5"> <i class="fa fa-file cursor-pointer"></i> </td>
                                                    </tr>


                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card wow animate__animated animate__fadeInUp animate__delay-2s">
                                    <div class="card-header" id="headingThree">
                                        <h5 class="mb-0">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseOwo">
                                                Update Profile
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <form action="{{route('securityInfoUpdate')}}" method="post">
                                                @csrf
                                                <div class="flex flex-col items-start w-full gap-1 mt-4">
                                                    <label for="" class="text-gray-500 text-sm">Email</label>
                                                    <input type="email" value="{{auth()->user()->email}}" class="form-control" placeholder="Enter your otp.....">
                                                </div>
                                                <div class="flex flex-col items-start w-full gap-1 mt-4">
                                                    <label for="" class="text-gray-500 text-sm">New Password</label>
                                                    <input type="password" name="password" placeholder="Enter new password....." class="form-control">
                                                    @error('password')<span class="text-red-600 text-sm font-semibold">{{$message}}</span>@enderror
                                                </div>
                                                <div class="flex flex-col items-start w-full gap-1 mt-4">
                                                    <label for="" class="text-gray-500 text-sm">Confirm New Password</label>
                                                    <input type="password" name="confirm_password" placeholder="Confirm new password....." class="form-control">
                                                    @error('confirm_password')<span class="text-red-600 text-sm font-semibold">{{$message}}</span>@enderror
                                                </div>

                                                <div class="btn-wrapper" style="width: 100%; display: flex; justify-content: end; margin-top: 10px">
                                                    <button type="submit" class="boxed-btn btn-sanatory"> Update password  <span class="icon-paper-plan"></span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- faq section end here -->






    @push('scripts')
    @endpush

</x-front.layout>
