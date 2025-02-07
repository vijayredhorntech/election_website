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
                             <div class="p-2 bg-primaryDark/10 text-primaryDark font-medium text-lg">
                                 <span>Personal Information</span>
                             </div>
                             <div class="p-2">
                                    <table class="w-full ">
                                        <tr>
                                            <td class="w-[200px] font-semibold text-black/80 border-b-[1px] border-b-primaryDark/10 text-md">Name</td>
                                            <td class="text-black border-b-[1px] border-b-primaryDark/10 py-1 text-sm"><span class="font-medium text-black">: &nbsp &nbsp</span> {{$member->title}} {{$member->first_name}} {{$member->last_name}}</td>
                                        </tr>
                                        <tr>
                                            <td class="w-[200px] font-semibold text-black/80 border-b-[1px] border-b-primaryDark/10 text-md">DOB</td>
                                            <td class="text-black border-b-[1px] border-b-primaryDark/10 py-1 text-sm"><span class="font-medium text-black">: &nbsp &nbsp</span> 01-01-1998</td>
                                        </tr>
                                        <tr>
                                            <td class="w-[200px] font-semibold text-black/80 border-b-[1px] border-b-primaryDark/10 text-md">Gender</td>
                                            <td class="text-black border-b-[1px] border-b-primaryDark/10 py-1 text-sm"><span class="font-medium text-black">: &nbsp &nbsp</span> Male</td>
                                        </tr>
                                        <tr>
                                            <td class="w-[200px] font-semibold text-black/80 border-b-[1px] border-b-primaryDark/10 text-md">Marital Status</td>
                                            <td class="text-black border-b-[1px] border-b-primaryDark/10 py-1 text-sm"><span class="font-medium text-black">: &nbsp &nbsp</span> Married</td>
                                        </tr>
                                        <tr>
                                            <td class="w-[200px] font-semibold text-black/80 border-b-[1px] border-b-primaryDark/10 text-md">Qualification</td>
                                            <td class="text-black border-b-[1px] border-b-primaryDark/10 py-1 text-sm"><span class="font-medium text-black">: &nbsp &nbsp</span> Graduate</td>
                                        </tr>
                                        <tr>
                                            <td class="w-[200px] font-semibold text-black/80 border-b-[1px] border-b-primaryDark/10 text-md">Profession</td>
                                            <td class="text-black border-b-[1px] border-b-primaryDark/10 py-1 text-sm"><span class="font-medium text-black">: &nbsp &nbsp</span> Student</td>
                                        </tr>
                                        <tr>
                                            <td class="w-[200px] font-semibold text-black/80 border-b-[1px] border-b-primaryDark/10 text-md">Enrolled On</td>
                                            <td class="text-black border-b-[1px] border-b-primaryDark/10 py-1 text-sm"><span class="font-medium text-black">: &nbsp &nbsp</span> {{$member->enrollment_date}}</td>
                                        </tr>
                                        <tr>
                                            <td class="w-[200px] font-semibold text-black/80 border-b-[1px] border-b-primaryDark/10 text-md">Referral Code</td>
                                            <td class="text-black border-b-[1px] border-b-primaryDark/10 py-1 text-sm"><span class="font-medium text-black">: &nbsp &nbsp</span> {{$member->user->referral_code}}</td>
                                        </tr>
                                        <tr>
                                            <td class="w-[200px] font-semibold text-black/80 text-md">Enrolled By</td>
                                            <td class="text-black py-1 text-sm"><span class="font-medium text-black">: &nbsp &nbsp</span>
                                                {{$member->user->name}}</td>
                                        </tr>

                                    </table>
                             </div>
                         </div>

                         <div class="border-[1px] border-primaryDark/10 mt-4">
                             <div class="p-2 bg-primaryDark/10 text-primaryDark font-medium text-lg">
                                 <span>Contact Information</span>
                             </div>
                             <div class="p-2">
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
                             <div class="p-2 bg-primaryDark/10 text-primaryDark font-medium text-lg">
                                 <span>Address Information</span>
                             </div>
                             <div class="p-2">
                                 <table class="w-full ">
                                     <tr>
                                         <td class="w-[200px] font-semibold text-black/80 border-b-[1px] border-b-primaryDark/10 text-md">Address</td>
                                         <td class="text-black border-b-[1px] border-b-primaryDark/10 py-1 text-sm"><span class="font-medium text-black">: &nbsp &nbsp</span> {{$member->address}}</td>
                                     </tr>
                                     <tr>
                                         <td class="w-[200px] font-semibold text-black/80 border-b-[1px] border-b-primaryDark/10 text-md">County</td>
                                         <td class="text-black border-b-[1px] border-b-primaryDark/10 py-1 text-sm"><span class="font-medium text-black">: &nbsp &nbsp</span> {{$member->county}}</td>
                                     </tr>
                                     <tr>
                                         <td class="w-[200px] font-semibold text-black/80 border-b-[1px] border-b-primaryDark/10 text-md">City</td>
                                         <td class="text-black border-b-[1px] border-b-primaryDark/10 py-1 text-sm"><span class="font-medium text-black">: &nbsp &nbsp</span> {{$member->city}}</td>
                                     </tr>
                                     <tr>
                                         <td class="w-[200px] font-semibold text-black/80 border-b-[1px] border-b-primaryDark/10 text-md">Constituency</td>
                                         <td class="text-black border-b-[1px] border-b-primaryDark/10 py-1 text-sm"><span class="font-medium text-black">: &nbsp &nbsp</span> {{$member->constituency}}</td>
                                     </tr>
                                     <tr>
                                         <td class="w-[200px] font-semibold text-black/80 border-b-[1px] border-b-primaryDark/10 text-md">Post Code</td>
                                         <td class="text-black border-b-[1px] border-b-primaryDark/10 py-1 text-sm"><span class="font-medium text-black">: &nbsp &nbsp</span> {{$member->postcode}}</td>
                                     </tr>
                                     <tr>
                                         <td class="w-[200px] font-semibold text-black/80 border-b-[1px] border-b-primaryDark/10 text-md">Country</td>
                                         <td class="text-black border-b-[1px] border-b-primaryDark/10 py-1 text-sm"><span class="font-medium text-black">: &nbsp &nbsp</span> {{$member->country}}</td>
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
                              <div class="p-2 bg-primaryDark/10 text-primaryDark font-medium text-lg">
                                  <span>Total Members Enrolled ({{$member->referredMembers->count()}})</span>
                              </div>
                              <div class="p-2 ">
                                  <p class="text-sm text-primaryLight">Latest 10 Enrollments by the member</p>
                                  <div class="flex flex-wrap gap-2">
                                      @foreach($member->referredMembers()->orderBy('created_at', 'desc')->take(10)->get() as $referredMember)
                                          <a class="text-sm px-4 py-0.5 border-[1px] border-primaryDark/30 rounded-full text-primaryDark  hover:bg-primaryDark hover:text-white transition ease-in duration-2000" href="{{route('member.view',['id'=>$referredMember->id])}}">  {{$referredMember->title}} {{$referredMember->first_name}} {{$referredMember->last_name}}</a>
                                      @endforeach
                                  </div>
                              </div>
                          </div>


                          <div class="border-[1px] border-primaryDark/10 mt-10">
                              <div class="p-2 bg-primaryDark/10 text-primaryDark font-medium text-lg">
                                  <span>Total Donation ({{$member->referredMembers->count()}})</span>
                              </div>
                              <div class="p-2 ">
                                  <p class="text-sm text-primaryLight">Latest 10 Donation Amount </p>
                                  <div class="flex flex-wrap gap-2">
                                      @foreach($member->referredMembers()->orderBy('created_at', 'desc')->take(10)->get() as $referredMember)
                                          <a class="text-sm px-4 py-0.5 border-[1px] border-primaryDark/30 rounded-full text-primaryDark  hover:bg-primaryDark hover:text-white transition ease-in duration-2000" href="{{route('member.view',['id'=>$referredMember->id])}}">
                                              £ {{$referredMember->id}}
                                          </a>
                                      @endforeach
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
