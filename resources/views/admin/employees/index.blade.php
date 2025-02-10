<x-app-layout>

    @section('breadcrumb')
        <nav>
            <!-- breadcrumb -->
            <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                <li class="text-sm leading-normal">
                    <a class="text-black opacity-50" {{route('dashboard')}}>Dashboard</a>
                </li>
                <li class="text-sm pl-2 capitalize leading-normal text-black before:float-left before:pr-2 before:text-black before:content-['/']"
                    aria-current="page">Employees</li>
            </ol>
            <h6 class="mb-0 font-bold text-black capitalize">Employees List</h6>
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
            <span class="text-white font-semibold lg:text-xl">Employees</span>
        </div>
        <div>
            <button class="bg-primaryLight/70 hover:bg-primaryLight text-white px-3 py-1 rounded-[3px] text-sm font-semibold transition ease-in duration-2000"
                    onclick=" document.getElementById('createEmployee').classList.toggle('hidden')">Create New Employee</button>
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
                    <form id="createEmployee" action="{{$formData['url']}}" method="{{$formData['method']}}" class="{{ $formData['type'] === 'Create' && !$errors->any() ? 'hidden' : '' }} w-full bg-white mt-4 pb-4">
                        @csrf
                        <!-- Personal Information Section -->
                        <div class="mb-6">
                            <div class="grid lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-4">
                                <div class="w-full">
                                    <div class="flex flex-col gap-1">
                                        <label for="first_name" class="font-semibold text-sm text-black">Member <span class="text-danger">*</span></label>
                                        <select name="user_id" id="user_id" class="text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
                                            <option value="">--- Select member ---</option>
                                            @foreach($members as $member)
                                                <option value="{{$member->id}}">{{$member->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="w-full">
                                    <div class="flex flex-col gap-1">
                                        <label for="first_name" class="font-semibold text-sm text-black">Office <span class="text-danger">*</span></label>
                                        <select name="office_id"  id="member_id" class="text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
                                            <option value="">--- Select office ---</option>
                                            @foreach($offices as $office)
                                                <option value="{{$office->id}}">{{$office->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="w-full">
                                    <div class="flex flex-col gap-1">
                                        <label for="last_name" class="font-semibold text-sm text-black">Designation <span class="text-danger">*</span></label>
                                        <select name="designation_id" id="member_id" class="text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
                                            <option value="">--- Select designation ---</option>
                                            @foreach($designations as $designation)
                                                <option value="{{$designation->id}}">{{$designation->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="w-full">
                                    <div class="flex flex-col gap-1">
                                        <label for="last_name" class="font-semibold text-sm text-black">Joining Date <span class="text-danger">*</span></label>
                                        <input type="date" name="joining_date" class="text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Submit Button -->
                        <div class="w-full mt-6">
                            <button class="w-max px-4 py-1.5 rounded-[3px] text-white bg-success hover:bg-primaryLight transition ease-in duration-2000 text-md font-semibold">
                                {{$formData['type']==='Create'?'Create Employee':'Update Employee'}}
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
                            <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Sr. no
                            </td>
                            <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Name</td>
                            <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Email Id</td>
                            <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Phone </td>
                            <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Constituency</td>
                            <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Joining Date</td>
                            <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Status</td>
                            <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Actions</td>
                        </tr>
                        </thead>
                        <tbody>


                        @forelse ($employees as $employeeData)
                            <tr>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm w-[100px]">{{$loop->iteration}}</td>
                                <td class="border-[1px] border-primaryLight/50 font-bold text-black px-4 py-0.5 text-sm w-[200px]">{{$employeeData->member->title}} {{$employeeData->member->first_name}} {{$employeeData->member->last_name}}</td>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm w-[200px]">{{$employeeData->member->email}}</td>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm w-[200px]">{{$employeeData->member->primary_mobile_number}}</td>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm w-[150px]">{{$employeeData->member->constituency->name}}</td>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm w-[150px]">{{$employeeData->employee->joining_date}}</td>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm">
                                    <a href="{{route('employees.status',['id'=>$employeeData->employee->id])}}" class="bg-{{$office->status?"success":"danger"}}/10 border-[1px] border-{{$employeeData->employee->status?"success":"danger"}} font-bold text-{{$employeeData->employee->status?"success":"danger"}} px-4 py-0.5 rounded-[3px]"> {{$employeeData->employee->status?"Active":"Inactive"}}</a>
                                </td>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-1 text-sm w-[200px]">
                                    <div class="flex h-full">
                                        <a href="{{route('member.view',['id'=>$employeeData->employee->id])}}" class="bg-success text-white px-3 py-1 rounded-[3px] ml-0.5" title="View Member"><i class="fa fa-eye text-xs"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7"
                                    class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm text-center">
                                    No office found
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
