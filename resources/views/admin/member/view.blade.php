<x-app-layout>

    @section('breadcrumb')
    <nav>
        <!-- breadcrumb -->
        <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
            <li class="text-sm leading-normal">
                <a class="text-black opacity-50" {{route('dashboard')}}>Dashboard</a>
            </li>
            <li class="text-sm pl-2 capitalize leading-normal text-black before:float-left before:pr-2 before:text-black before:content-['/']"
                aria-current="page">Members</li>
        </ol>
        <h6 class="mb-0 font-bold text-black capitalize">Member Detail</h6>
    </nav>
    @endsection

    @section('alertBox')
    @if (session('success'))
    <x-alert-box :message="session('success')" :type="'success'" />
    @endif
    @if (session('error'))
    <x-alert-box :message="session('error')" :type="'error'" />
    @endif
    @endsection


    <div class="w-full bg-primaryHeading  rounded-[3px] p-4 flex justify-between gap-4 flex-wrap">
        <div>
            <span class="text-white font-semibold lg:text-xl">{{$member->title}} {{$member->first_name}} {{$member->last_name}}</span>
        </div>

    </div>
    <div class="flex flex-wrap  -mx-3">
        <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:w-full lg:flex-none">
            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl dark:bg-gray-950 border-black-125 rounded-[3px] bg-clip-border">
                <div class="w-full grid lg:grid-cols-2">
                    <div class="w-full p-4 ">
                        <div class="border-[1px] border-primaryDark/10">

                            <div class="p-2 bg-primaryDark/10 text-primaryDark font-medium text-lg cursor-pointer flex justify-between items-center"
                                onclick="document.getElementById('personalInfoDiv').classList.toggle('hidden')">
                                <span>Personal Information</span>
                                <i class="fa fa-angle-down"></i>
                            </div>
                            <div class="p-2" id="personalInfoDiv">

                                @if($member->profile_photo!=null)
                                <img src="{{asset('storage/'. $member->profile_photo)}}" alt="Member Image" class="h-48 mb-6 w-40 rounded-[5px] object-cover">
                                @else
                                <img src="{{asset('assets/images/download.jpg')}}" alt="Member Image" class="h-48 mb-6 w-40 rounded-[5px] object-cover">
                                @endif
                                <table class="w-full ">
                                    <tr>
                                        <td class="w-[200px] font-semibold text-black/80 border-b-[1px] border-b-primaryDark/10 text-md">Member ID</td>
                                        <td class="text-black border-b-[1px] border-b-primaryDark/10 py-1 text-sm"><span class="font-medium text-black">: &nbsp &nbsp</span> {{$member->custom_id}}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-[200px] font-semibold text-black/80 border-b-[1px] border-b-primaryDark/10 text-md">Name</td>
                                        <td class="text-black border-b-[1px] border-b-primaryDark/10 py-1 text-sm"><span class="font-medium text-black">: &nbsp &nbsp</span> {{$member->title}} {{$member->first_name}} {{$member->last_name}}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-[200px] font-semibold text-black/80 border-b-[1px] border-b-primaryDark/10 text-md">Date of Birth</td>
                                        <td class="text-black border-b-[1px] border-b-primaryDark/10 py-1 text-sm"><span class="font-medium text-black">: &nbsp &nbsp</span> {{ \Carbon\Carbon::parse($member->date_of_birth)->format('d-m-Y') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-[200px] font-semibold text-black/80 border-b-[1px] border-b-primaryDark/10 text-md">Gender</td>
                                        <td class="text-black border-b-[1px] border-b-primaryDark/10 py-1 text-sm"><span class="font-medium text-black">: &nbsp &nbsp</span> {{$member->gender}}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-[200px] font-semibold text-black/80 border-b-[1px] border-b-primaryDark/10 text-md">Marital Status</td>
                                        <td class="text-black border-b-[1px] border-b-primaryDark/10 py-1 text-sm"><span class="font-medium text-black">: &nbsp &nbsp</span> {{$member->marital_status}}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-[200px] font-semibold text-black/80 border-b-[1px] border-b-primaryDark/10 text-md">Qualification</td>
                                        <td class="text-black border-b-[1px] border-b-primaryDark/10 py-1 text-sm"><span class="font-medium text-black">: &nbsp &nbsp</span> {{$member->qualification}}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-[200px] font-semibold text-black/80 border-b-[1px] border-b-primaryDark/10 text-md">Profession</td>
                                        <td class="text-black border-b-[1px] border-b-primaryDark/10 py-1 text-sm"><span class="font-medium text-black">: &nbsp &nbsp</span> {{$member->profession}}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-[200px] font-semibold text-black/80 border-b-[1px] border-b-primaryDark/10 text-md">Enrolled On</td>
                                        <td class="text-black border-b-[1px] border-b-primaryDark/10 py-1 text-sm"><span class="font-medium text-black">: &nbsp &nbsp</span> {{ \Carbon\Carbon::parse($member->enrollment_date)->format('d-m-Y') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-[200px] font-semibold text-black/80 border-b-[1px] border-b-primaryDark/10 text-md">Referral Code</td>
                                        <td class="text-black border-b-[1px] border-b-primaryDark/10 py-1 text-sm"><span class="font-medium text-black">: &nbsp &nbsp</span> {{$member->user->referral_code}}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-[200px] font-semibold text-black/80 text-md">Enrolled By</td>
                                        <td class="text-black py-1 text-sm"><span class="font-medium text-black">: &nbsp &nbsp</span>
                                            {{$member->user->name}}
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        </div>

                        <div class="border-[1px] border-primaryDark/10 mt-4">
                            <div class="p-2 bg-primaryDark/10 text-primaryDark font-medium text-lg cursor-pointer flex justify-between items-center"
                                onclick="document.getElementById('contactInfoDiv').classList.toggle('hidden')">
                                <span>Contact Information</span>

                                <i class="fa fa-angle-down"></i>

                            </div>
                            <div class="p-2 hidden" id="contactInfoDiv">
                                <table class="w-full ">
                                    <tr>
                                        <td class="w-[200px] font-semibold text-black/80 border-b-[1px] border-b-primaryDark/10 text-md">Mobile Number</td>
                                        <td class="text-black border-b-[1px] border-b-primaryDark/10 py-1 text-sm"><span class="font-medium text-black">: &nbsp &nbsp</span> {{$member->primary_mobile_number}}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-[200px] font-semibold text-black/80 border-b-[1px] border-b-primaryDark/10 text-md">Email</td>
                                        <td class="text-black border-b-[1px] border-b-primaryDark/10 py-1 text-sm"><span class="font-medium text-black">: &nbsp &nbsp</span> {{$member->email}}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-[200px] font-semibold text-black/80 text-md">Alternate Number</td>
                                        <td class="text-black py-1 text-sm"><span class="font-medium text-black">: &nbsp &nbsp</span> {{$member->alternate_mobile_number}}</td>
                                    </tr>

                                </table>
                            </div>
                        </div>

                        <div class="border-[1px] border-primaryDark/10 mt-4">
                            <div class="p-2 bg-primaryDark/10 text-primaryDark font-medium text-lg cursor-pointer flex justify-between items-center"
                                onclick="document.getElementById('addressInfoDiv').classList.toggle('hidden')">
                                <span>Address Information</span>

                                <i class="fa fa-angle-down"></i>

                            </div>
                            <div class="p-2 hidden" id="addressInfoDiv">
                                <table class="w-full ">
                                    <tr>
                                        <td class="w-[200px] font-semibold text-black/80 border-b-[1px] border-b-primaryDark/10 text-md">Address</td>
                                        <td class="text-black border-b-[1px] border-b-primaryDark/10 py-1 text-sm"><span class="font-medium text-black">: &nbsp &nbsp</span> {{$member->address}}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-[200px] font-semibold text-black/80 border-b-[1px] border-b-primaryDark/10 text-md">County</td>
                                        <td class="text-black border-b-[1px] border-b-primaryDark/10 py-1 text-sm"><span class="font-medium text-black">: &nbsp &nbsp</span> {{$member->county ? $member->county->name : ''}}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-[200px] font-semibold text-black/80 border-b-[1px] border-b-primaryDark/10 text-md">City</td>
                                        <td class="text-black border-b-[1px] border-b-primaryDark/10 py-1 text-sm"><span class="font-medium text-black">: &nbsp &nbsp</span> {{$member->city}}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-[200px] font-semibold text-black/80 border-b-[1px] border-b-primaryDark/10 text-md">Constituency</td>
                                        <td class="text-black border-b-[1px] border-b-primaryDark/10 py-1 text-sm"><span class="font-medium text-black">: &nbsp &nbsp</span> {{$member->constituency ? $member->constituency->name : ''}}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-[200px] font-semibold text-black/80 border-b-[1px] border-b-primaryDark/10 text-md">Post Code</td>
                                        <td class="text-black border-b-[1px] border-b-primaryDark/10 py-1 text-sm"><span class="font-medium text-black">: &nbsp &nbsp</span> {{$member->postcode}}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-[200px] font-semibold text-black/80 border-b-[1px] border-b-primaryDark/10 text-md">Country</td>
                                        <td class="text-black border-b-[1px] border-b-primaryDark/10 py-1 text-sm"><span class="font-medium text-black">: &nbsp &nbsp</span> {{$member->country?$member->country->name:''}}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-[200px] font-semibold text-black/80 text-md">Alternate Number</td>
                                        <td class="text-black py-1 text-sm"><span class="font-medium text-black">: &nbsp &nbsp</span> {{$member->alternate_mobile_number}}</td>
                                    </tr>

                                </table>
                            </div>
                        </div>

                    </div>
                    <div class="w-full">
                        <div class="w-full p-4 ">
                            <div class="border-[1px] border-primaryDark/10">
                                <div class="p-2 bg-primaryDark/10 text-primaryDark font-medium text-lg flex justify-between">
                                    <span>Total Members Enrolled ({{$member->referredMembers->count()}})</span>
                                    <a href="{{route('member.referred',['id'=>$member->id])}}" class="text-xs flex items-center bg-primaryDark/60 text-white px-4 rounded-[3px] hover:bg-primaryDark transition ease-in duration-2000">View all</a>
                                </div>
                                <div class="p-2 ">
                                    <p class="text-sm text-primaryLight">Latest 10 Enrollments by the member</p>
                                    <div class="flex flex-wrap gap-2">
                                        @forelse($member->referredMembers()->orderBy('created_at', 'desc')->take(10)->get() as $referredMember)
                                        <a class="text-sm px-4 py-0.5 border-[1px] border-primaryDark/30 rounded-full text-primaryDark  hover:bg-primaryDark hover:text-white transition ease-in duration-2000" href="{{route('member.view',['id'=>$referredMember->id])}}"> {{$referredMember->title}} {{$referredMember->first_name}} {{$referredMember->last_name}}</a>
                                        @empty
                                        <p class="text-md text-primaryDark">No member enrolled yet</p>
                                        @endforelse
                                    </div>
                                </div>
                            </div>


                            <div class="border-[1px] border-primaryDark/10 mt-10">
                                <div class="p-2 bg-primaryDark/10 text-primaryDark font-medium text-lg flex justify-between">
                                    <span>Total Donation ({{$member->referredMembers->count()}})</span>
                                    <a href="{{route('member.donations',['id'=>$member->id])}}" class="text-xs flex items-center bg-primaryDark/60 text-white px-4 rounded-[3px] hover:bg-primaryDark transition ease-in duration-2000">View all</a>
                                </div>
                                <div class="p-2 ">
                                    <p class="text-sm text-primaryLight">Latest 10 Donation Amount </p>
                                    <div class="flex flex-wrap gap-2">
                                        @forelse($member->referredMembers()->orderBy('created_at', 'desc')->take(10)->get() as $referredMember)
                                        <a class="text-sm px-4 py-0.5 border-[1px] border-primaryDark/30 rounded-full text-primaryDark  hover:bg-primaryDark hover:text-white transition ease-in duration-2000" href="{{route('member.view',['id'=>$referredMember->id])}}">
                                            £ {{$referredMember->id}}
                                        </a>
                                        @empty
                                        <p class="text-md text-primaryDark">No donation made yet</p>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>