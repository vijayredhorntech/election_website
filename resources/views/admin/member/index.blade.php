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
        <h6 class="mb-0 font-bold text-black capitalize">Members List</h6>
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
            <span class="text-white font-semibold lg:text-xl">Members</span>
        </div>
        <div>
            <button class="bg-primaryLight/70 hover:bg-primaryLight text-white px-3 py-1 rounded-[3px] text-sm font-semibold transition ease-in duration-2000"
                onclick=" document.getElementById('createNewMemberDiv').classList.toggle('hidden')">Create New Member</button>
        </div>
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
                    <form id="createNewMemberDiv" action="{{$formData['url']}}" method="{{$formData['method']}}" class="{{ $formData['type'] === 'Create' && !$errors->any() ? 'hidden' : '' }} w-full bg-white mt-4 pb-4">
                        @csrf
                        <!-- Personal Information Section -->
                        <div class="mb-6">
                            <h2 class="text-lg font-bold mb-4 text-gray-800 border-b pb-2">Personal Information</h2>
                            <div class="grid lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-4">
                                <div class="w-full">
                                    <x-title :data="$member ?? null" />
                                </div>
                                <div class="w-full">
                                    <div class="flex flex-col gap-1">
                                        <label for="first_name" class="font-semibold text-sm text-black">First Name <span class="text-danger">*</span></label>
                                        <input type="text" name="first_name" id="first_name" value="{{ $member->first_name ?? old('first_name') }}" placeholder="Enter first name....." class="text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
                                    </div>
                                </div>
                                <div class="w-full">
                                    <div class="flex flex-col gap-1">
                                        <label for="last_name" class="font-semibold text-sm text-black">Last Name <span class="text-danger">*</span></label>
                                        <input type="text" name="last_name" id="last_name" value="{{ $member->last_name ?? old('last_name') }}" placeholder="Enter last name....." class="text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
                                    </div>
                                </div>
                                <div class="w-full">
                                    <div class="flex flex-col gap-1">
                                        <label for="date_of_birth" class="font-semibold text-sm text-black">Date of Birth <span class="text-danger">*</span></label>
                                        <input type="date" name="date_of_birth" id="date_of_birth" value="{{ $member->date_of_birth ?? old('date_of_birth') }}" placeholder="Enter date of birth....." class="text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
                                    </div>
                                </div>

                                <div class="w-full">
                                    <div class="flex flex-col gap-1">
                                        <label for="gender" class="font-semibold text-sm text-black">Gender <span class="text-danger">*</span></label>
                                        <select name="gender" class="text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
                                            <option value="">Select Gender</option>
                                            <option value="MALE" {{ (old('gender', $member->gender ?? '') == 'MALE') ? 'selected' : '' }}>MALE</option>
                                            <option value="FEMALE" {{ (old('gender', $member->gender ?? '') == 'FEMALE') ? 'selected' : '' }}>FEMALE</option>
                                            <option value="OTHER" {{ (old('gender', $member->gender ?? '') == 'OTHER') ? 'selected' : '' }}>OTHER</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="w-full">
                                    <div class="flex flex-col gap-1">
                                        <label for="marital_status" class="font-semibold text-sm text-black">Marital Status <span class="text-danger">*</span></label>
                                        <select name="marital_status" class="text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
                                            <option value="">Select Marital Status</option>
                                            <option value="SINGLE" {{ (old('marital_status', $member->marital_status ?? '') == 'SINGLE') ? 'selected' : '' }}>SINGLE</option>
                                            <option value="MARRIED" {{ (old('marital_status', $member->marital_status ?? '') == 'MARRIED') ? 'selected' : '' }}>MARRIED</option>
                                            <option value="DIVORCED" {{ (old('marital_status', $member->marital_status ?? '') == 'DIVORCED') ? 'selected' : '' }}>DIVORCED</option>
                                            <option value="WIDOWED" {{ (old('marital_status', $member->marital_status ?? '') == 'WIDOWED') ? 'selected' : '' }}>WIDOWED</option>
                                            <option value="OTHER" {{ (old('marital_status', $member->marital_status ?? '') == 'OTHER') ? 'selected' : '' }}>OTHER</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="w-full">
                                    <div class="flex flex-col gap-1">
                                        <label for="qualification" class="font-semibold text-sm text-black">Qualification <span class="text-danger">*</span></label>
                                        <select name="qualification" class="text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
                                            <option value="">Select Qualification</option>
                                            <option value="PRIMARY" {{ (old('qualification', $member->qualification ?? '') == 'PRIMARY') ? 'selected' : '' }}>PRIMARY</option>
                                            <option value="SECONDARY" {{ (old('qualification', $member->qualification ?? '') == 'SECONDARY') ? 'selected' : '' }}>SECONDARY</option>
                                            <option value="HIGHER SECONDARY" {{ (old('qualification', $member->qualification ?? '') == 'HIGHER SECONDARY') ? 'selected' : '' }}>HIGHER SECONDARY</option>
                                            <option value="GRADUATE" {{ (old('qualification', $member->qualification ?? '') == 'GRADUATE') ? 'selected' : '' }}>GRADUATE</option>
                                            <option value="POST GRADUATE" {{ (old('qualification', $member->qualification ?? '') == 'POST GRADUATE') ? 'selected' : '' }}>POST GRADUATE</option>
                                            <option value="DOCTORATE" {{ (old('qualification', $member->qualification ?? '') == 'DOCTORATE') ? 'selected' : '' }}>DOCTORATE</option>
                                            <option value="OTHER" {{ (old('qualification', $member->qualification ?? '') == 'OTHER') ? 'selected' : '' }}>OTHER</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="w-full">
                                    <div class="flex flex-col gap-1">
                                        <label for="profession" class="font-semibold text-sm text-black">Profession <span class="text-danger">*</span></label>
                                        <select name="profession" class="text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
                                            <option value="">Select Profession</option>
                                            <option value="STUDENT" {{ (old('profession', $member->profession ?? '') == 'STUDENT') ? 'selected' : '' }}>STUDENT</option>
                                            <option value="EMPLOYEE" {{ (old('profession', $member->profession ?? '') == 'EMPLOYEE') ? 'selected' : '' }}>EMPLOYEE</option>
                                            <option value="BUSINESS" {{ (old('profession', $member->profession ?? '') == 'BUSINESS') ? 'selected' : '' }}>BUSINESS</option>
                                            <option value="SELF EMPLOYED" {{ (old('profession', $member->profession ?? '') == 'SELF EMPLOYED') ? 'selected' : '' }}>SELF EMPLOYED</option>
                                            <option value="HOUSEWIFE" {{ (old('profession', $member->profession ?? '') == 'HOUSEWIFE') ? 'selected' : '' }}>HOUSEWIFE</option>
                                            <option value="RETIRED" {{ (old('profession', $member->profession ?? '') == 'RETIRED') ? 'selected' : '' }}>RETIRED</option>
                                            <option value="LAWYER" {{ (old('profession', $member->profession ?? '') == 'LAWYER') ? 'selected' : '' }}>LAWYER</option>
                                            <option value="DOCTOR" {{ (old('profession', $member->profession ?? '') == 'DOCTOR') ? 'selected' : '' }}>DOCTOR</option>
                                            <option value="TEACHER" {{ (old('profession', $member->profession ?? '') == 'TEACHER') ? 'selected' : '' }}>TEACHER</option>
                                            <option value="OTHER" {{ (old('profession', $member->profession ?? '') == 'OTHER') ? 'selected' : '' }}>OTHER</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="w-full">
                                    <div class="flex flex-col gap-1">
                                        <label for="national_insurance_number" class="font-semibold text-sm text-black">National Insurance Number </label>
                                        <input type="text" name="national_insurance_number" id="national_insurance_number" value="{{ $member->national_insurance_number ?? old('national_insurance_number') }}" placeholder="Enter national insurance number....." class="text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Information Section -->
                        <div class="mb-6">
                            <h2 class="text-lg font-bold mb-4 text-gray-800 border-b pb-2">Contact Information</h2>
                            <div class="grid lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-4">
                                <div class="w-full">
                                    <div class="flex flex-col gap-1">
                                        <label for="primary_mobile_number" class="font-semibold text-sm text-black">Primary Mobile Number <span class="text-danger">*</span></label>
                                        <input type="text" name="primary_mobile_number" value="{{ $member->primary_mobile_number ?? old('primary_mobile_number') }}" placeholder="Enter primary mobile number....." class="text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
                                    </div>
                                </div>
                                <div class="w-full">
                                    <div class="flex flex-col gap-1">
                                        <label for="alternate_mobile_number" class="font-semibold text-sm text-black">Alternate Mobile Number <span class="text-danger">*</span></label>
                                        <input type="text" name="alternate_mobile_number" value="{{ $member->alternate_mobile_number ?? old('alternate_mobile_number') }}" placeholder="Enter alternate mobile number....." class="text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
                                    </div>
                                </div>
                                <div class="w-full">
                                    <div class="flex flex-col gap-1">
                                        <label for="email" class="font-semibold text-sm text-black">Email <span class="text-danger">*</span></label>
                                        <input type="email" name="email" id="email" value="{{ $member->email ?? old('email') }}" placeholder="Enter email....." class="text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Address Section -->
                        <div class="mb-6">
                            <h2 class="text-lg font-bold mb-4 text-gray-800 border-b pb-2">Address</h2>
                            <div class="grid lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-4">
                                <x-address :data="$member ?? null" />
                            </div>
                        </div>

                        <!-- Referral Code Section -->
                        <div class="mb-6">
                            <h2 class="text-lg font-bold mb-4 text-gray-800 border-b pb-2">Referral Code</h2>
                            <div class="grid lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-4">
                                <div class="w-full">
                                    <div class="flex flex-col gap-1">
                                        <label for="referrer_code" class="font-semibold text-sm text-black">Referral Code</label>
                                        <input type="text" name="referrer_code" value="{{ $member->referrer->referral_code ?? old('referrer_code') }}" placeholder="Enter referral code....." class="text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="w-full mt-6">
                            <button class="w-max px-4 py-1.5 rounded-[3px] text-white bg-success hover:bg-primaryLight transition ease-in duration-2000 text-md font-semibold">
                                {{$formData['type']==='Create'?'Create Member':'Update Member'}}
                            </button>
                        </div>
                    </form>
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
                                <!-- <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Member ID</td> -->
                                <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Name</td>
                                <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Email Id</td>
                                <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Phone </td>
                                <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Referral Code</td>
                                <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Referred By</td>
                                <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Constituency</td>
                                <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Members Added</td>
                                <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                            <tr>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm w-[100px]">{{$user->member->custom_id}}</td>
                                <td class="border-[1px] border-primaryLight/50 font-bold text-black px-4 py-0.5 text-sm w-[200px]">{{$user->member->title}} {{$user->member->first_name}} {{$user->member->last_name}}</td>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm w-[200px]">{{$user->email}}</td>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm w-[150px]">{{$user->member->primary_mobile_number}}</td>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm w-[200px]">{{$user->referral_code}}</td>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm w-[200px]">{{$user->member->referrer ? $user->member->referrer->name : 'N/A'}}</td>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm w-[150px]">{{$user->member->constituency ? $user->member->constituency->name : 'N/A'}}</td>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm w-[150px]">{{$user->referredMembers->count()}}</td>

                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-1 text-sm w-[200px]">
                                    <div class="flex h-full">
                                        <a href="{{route('member.view',['id'=>$user->member->id])}}" class="bg-success text-white px-3 py-1 rounded-[3px] ml-0.5" title="View Member"><i class="fa fa-eye text-xs"></i></a>
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

<script>
    document.getElementById('first_name').addEventListener('input', function() {
        this.value = this.value.toUpperCase();
    });
    document.getElementById('last_name').addEventListener('input', function() {
        this.value = this.value.toUpperCase();
    });
    document.getElementById('email').addEventListener('input', function() {
        this.value = this.value.toUpperCase();
    });
</script>