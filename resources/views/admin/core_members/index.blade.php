<x-app-layout>

    @section('breadcrumb')
        <nav>
            <!-- breadcrumb -->
            <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                <li class="text-sm leading-normal">
                    <a class="text-black opacity-50" {{route('dashboard')}}>Dashboard</a>
                </li>
                <li class="text-sm pl-2 capitalize leading-normal text-black before:float-left before:pr-2 before:text-black before:content-['/']"
                    aria-current="page">Core Members</li>
            </ol>
            <h6 class="mb-0 font-bold text-black capitalize">Core Members List</h6>
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
            <span class="text-white font-semibold lg:text-xl">Core Members</span>
        </div>
        <!-- <div>
            <button class="bg-primaryLight/70 hover:bg-primaryLight text-white px-3 py-1 rounded-[3px] text-sm font-semibold transition ease-in duration-2000"
                onclick=" document.getElementById('createNewMemberDiv').classList.toggle('hidden')">Create New Member</button>
        </div> -->
    </div>
    <div class="flex flex-wrap -mx-3 pb-6">
        <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:w-full lg:flex-none">
            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-solid shadow-xl border-black-125 rounded-b-[3px]">
                <div class="overflow-x-auto px-2">
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li class="text-red-600 font-semibold text-sm">*{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-wrap  -mx-3">
        <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:w-full lg:flex-none">
            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl dark:bg-gray-950 border-black-125 rounded-[3px] bg-clip-border">
                <div class="overflow-x-auto p-2">
                    <table class="w-full border-[1px] border-primaryLight/50 border-collapse">
                        <thead>
                        <tr class="bg-primaryDark/30">
                            <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Member ID</td>
                            <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Annual Income</td>
                            <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Any Business</td>
                            <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Willing to Relocate</td>
                            <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Time to Party</td>
                            <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Comunication Skill</td>
                            <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2"> Social Media Presence</td>
                            <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2"> Network of Volunteers </td>
                            <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Willing to Fundraise</td>
                            <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Area of interest</td>
                            <!-- <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Member ID</td> -->

                            <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Actions</td>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($members as $coreMember)
                            <tr>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm w-[100px]">{{$coreMember->user->member->custom_id}}</td>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm w-[100px]">£{{$coreMember->annual_income}}</td>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm w-[100px]">{{$coreMember->any_business===1?'Yes':'No'}}</td>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm w-[100px]">{{$coreMember->willing_to_relocate===1?'Yes':'No'}}</td>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm w-[100px]">{{ucfirst($coreMember->how_much_time_for_party)}}</td>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm w-[100px]">{{ucfirst($coreMember->communication_skill)}}</td>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm w-[100px]">{{$coreMember->have_social_media_presence===1?'Yes':'No'}}</td>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm w-[100px]">{{$coreMember->have_network_of_volunteers===1?'Yes':'No'}}</td>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm w-[100px]">{{$coreMember->willing_to_fundraise===1?'Yes':'No'}}</td>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm w-[100px]">


                                    @foreach(json_decode($coreMember->area_of_interest) as $interest)
                                        <span class="bg-primary text-black px-2 py-1 rounded-[3px] text-xs">{{$interest}}, </span>
                                    @endforeach

                                </td>

                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-1 text-sm w-[200px]">
                                    <div class="flex h-full">
                                        <a href="" class="bg-success text-white px-3 py-1 rounded-[3px] ml-0.5" title="View Member"><i class="fa fa-eye text-xs"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9"
                                    class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm text-center">
                                    No members found
                                </td>
                            </tr>
                        @endforelse




                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>




