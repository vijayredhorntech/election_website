<x-front.layout>
    @push('styles')
        <style>
            .tab-content {
                display: none;
            }

            .tab-content.active {
                display: block;
            }

            .tab-button {
                padding: 0.25rem 1rem;
                border: 1px solid #b30d00;
                border-radius: 3px;
                background-color: rgba(179, 13, 0, 0.1);
                color: #b30d00;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.2s ease-in;
            }

            .tab-button:hover {
                background-color: #b30d00;
                color: white;
            }

            .tab-button.active {
                background-color: #b30d00;
                color: white;
            }
        </style>
    @endpush
    <section class="bg-gray-100 py-20 mt-24 px-4 bg-center bg-cover">
        <div class="container w-full  bg-white mx-auto p-4 text-gray-800 rounded-[5px] flex justify-between items-center gap-6">
             <span class="text-2xl font-semibold">{{auth()->user()->name}} <i class="font-medium text-sm">({{(auth()->user()->member->custom_id)}})</i> </span>
            <span class="lg:hidden md:hidden block px-2 h-max py-1 border-[1px] border-[#b30d00] rounded-[3px] bg-[#b30d00] text-white font-semibold hover:bg-[#b30d00] hover:text-white transition ease-in duration-200 cursor-pointer"
              onclick=" document.getElementById('profileDiv').classList.toggle('hidden'); document.getElementById('profileDiv').classList.toggle('flex');"
            > <i class="fa fa-bars"></i> </span>

        </div>


        <div class="container w-full flex flex-col  bg-white mx-auto px-4 text-gray-800 rounded-[5px] mt-6">
            <div id="profileDiv" class="lg:flex md:flex hidden lg:flex-row md:flex-row flex-col gap-4 lg:mt-0 md:mt-0 mt-4 py-4">
                <button data-tab="profileInfo" class="tab-button">
                    Profile Info
                </button>
                <button data-tab="memberShipDonationInfo" class="tab-button">
                    Membership/ Donation Info
                </button>
                <button data-tab="updateProfile" class="tab-button">
                    Update Profile
                </button>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit" data-tab="memberShipDonationInfo" class="tab-button">
                        Log Out
                    </button>
                </form>
            </div>
        </div>

        <div class="container w-full flex flex-col bg-white mx-auto px-4 text-gray-800 rounded-[5px] mt-2">

            @if(session('error'))
                <div class="text-red-600 text-sm font-semibold mt-4">*{{session('error')}}</div>
            @endif @if(session('success'))
                <div class="text-green-600 text-sm font-semibold mt-4">*{{session('success')}}</div>
            @endif
            <div id="profileInfo" class=" hidden w-full py-4 grid lg:grid-cols-3 md:grid-cols-3  grid-cols-1 gap-4">
                 <div class="w-full p-2 border-[1px] border-[#b30d00]/10">
                      <div class="w-full p-2 font-semibold text-[#b30d00] bg-[#b30d00]/10">
                            <span>Basic Information</span>
                      </div>
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
                 </div>
                 <div class="w-full p-2 border-[1px] border-[#b30d00]/10">
                    <div class="w-full p-2 font-semibold text-[#b30d00] bg-[#b30d00]/10">
                        <span>Contact Information</span>
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
                        <span>Address Information</span>
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
                                <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5"><span class="font-semibold text-black">: &nbsp &nbsp</span> {{$memberDetails->county_id}}</td>
                            </tr>
                            <tr>
                                <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5">Country</td>
                                <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5"><span class="font-semibold text-black">: &nbsp &nbsp</span> {{$memberDetails->country_id}}</td>
                            </tr>

                            <tr>
                                <td class="w-[150px] font-semibold text-black">Constituency</td>
                                <td class=" py-0.5"><span class="font-semibold text-black">: &nbsp &nbsp</span> {{$memberDetails->constituency_id}}</td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>

            <div id="memberShipDonationInfo" class="w-full py-4 grid lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-4">
                <div class="w-full p-2 border-[1px] border-[#b30d00]/10">
                    <div class="w-full p-2 font-semibold text-[#b30d00] bg-[#b30d00]/10">
                        <span>Membership Information</span>
                    </div>
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
                                <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5"><span class="font-semibold text-black">: &nbsp &nbsp</span>  £ 15.2</td>
                            </tr>
                            <tr>
                                <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5">Type</td>
                                <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5"><span class="font-semibold text-black">: &nbsp &nbsp</span>  Annually </td>
                            </tr>
                            <tr>
                                <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5">Days Remaining</td>
                                <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5"><span class="font-semibold text-black">: &nbsp &nbsp</span>  298 days </td>
                            </tr>
                            <tr>
                                <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5">Renewal Date</td>
                                <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5"><span class="font-semibold text-black">: &nbsp &nbsp</span>  01-01-2026 </td>
                            </tr>
                            <tr>
                                <td class="w-[150px] font-semibold text-black">Invoice</td>
                                <td class=" py-0.5"><span class="font-semibold text-black">: &nbsp &nbsp</span> <a
                                        href="" class="text-[#b30d00] underline">Generate</a></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="w-full p-2 border-[1px] border-[#b30d00]/10 lg:col-span-2 md:col-span-3">
                    <div class="w-full p-2 font-semibold text-[#b30d00] bg-[#b30d00]/10">
                        <span>Donation Information</span>
                    </div>
                    <div class="w-full p-2">
                        <table class="w-full">
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
            <div id="updateProfile" class="w-full py-4 grid lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-4">
                <div class="w-full p-2 border-[1px] border-[#b30d00]/10">
                    <div class="w-full p-2 font-semibold text-[#b30d00] bg-[#b30d00]/10">
                        <span>Update Security Information</span>
                    </div>
                    <div class="w-full p-2">
                        <form action="{{route('securityInfoUpdate')}}" method="post">
                            @csrf
                            <div class="flex flex-col items-start w-full gap-1 mt-4">
                                <label for="" class="text-gray-500 text-sm">Email</label>
                                <input  type="email" value="{{auth()->user()->email}}" class="w-full bg-gray-100 rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-red-500" placeholder="Enter your otp.....">
                            </div>
                            <div class="flex flex-col items-start w-full gap-1 mt-4">
                                <label for="" class="text-gray-500 text-sm">New Password</label>
                                <input  type="password" name="password" placeholder="Enter new password....."  class="w-full bg-gray-100 rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-red-500" >
                                @error('password')<span class="text-red-600 text-sm font-semibold">{{$message}}</span>@enderror
                            </div>
                            <div class="flex flex-col items-start w-full gap-1 mt-4">
                                <label for="" class="text-gray-500 text-sm">Confirm New Password</label>
                                <input  type="password" name="confirm_password" placeholder="Confirm new password....."  class="w-full bg-gray-100 rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-red-500" >
                                @error('confirm_password')<span class="text-red-600 text-sm font-semibold">{{$message}}</span>@enderror
                            </div>

                            <div class="w-full flex mt-8">
                                <button type="submit" class="w-full text-center bg-red-500 px-4 py-3 rounded-full text-white font-semibold hover:bg-red-700 transition ease-in duration-200 cursor-pointer"> Update Password <i class="fa fa-lock ml-2"></i> </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </section>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Get all tab buttons and content
                const tabButtons = document.querySelectorAll('.tab-button');
                const tabContents = document.querySelectorAll('#profileInfo, #memberShipDonationInfo, #updateProfile');

                // Function to show selected tab
                function showTab(tabId) {
                    // Hide all tab contents and remove active class
                    tabContents.forEach(content => {
                        content.classList.add('hidden');
                        content.classList.remove('active');
                    });

                    // Remove active class from all buttons
                    tabButtons.forEach(button => {
                        button.classList.remove('active');
                    });

                    // Show selected tab content and mark button as active
                    const selectedTab = document.getElementById(tabId);
                    const selectedButton = document.querySelector(`[data-tab="${tabId}"]`);

                    if (selectedTab && selectedButton) {
                        selectedTab.classList.remove('hidden');
                        selectedTab.classList.add('active');
                        selectedButton.classList.add('active');
                    }
                }

                // Add click event listeners to all tab buttons
                tabButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const tabId = this.getAttribute('data-tab');
                        showTab(tabId);
                    });
                });

                // Show first tab by default
                showTab('profileInfo');
            });
        </script>
    @endpush

</x-front.layout>
