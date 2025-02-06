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
        <!-- <div>
            <button class="bg-primaryLight/70 hover:bg-primaryLight text-white px-3 py-1 rounded-[3px] text-sm font-semibold transition ease-in duration-2000"
                    onclick=" document.getElementById('createNewOfficeDiv').classList.toggle('hidden')">Create New Office</button>
        </div> -->
    </div>
    <!-- <div class="flex flex-wrap  -mx-3 pb-6">
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
                    <form id="createNewOfficeDiv"  class="w-full grid lg:grid-col-3 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 bg-white mt-4 gap-4 pb-4">
                        @csrf
                        <div class="w-full">
                            <div class="flex flex-col gap-1 ">
                                <label for="name" class="font-semibold text-sm text-black">Office Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" value="{{ isset($office->name) ? $office->name : '' }}" placeholder="Enter name....." class=" text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
                            </div>
                        </div>
                        <div class="w-full">
                            <div class="flex flex-col gap-1 ">
                                <label for="name" class="font-semibold text-sm text-black">Office Description <span class="text-danger">*</span></label>
                                <input type="text" name="description" value="{{ isset($office->description) ? $office->description : '' }}" placeholder="Enter description....." class=" text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
                            </div>
                        </div>
                        <div class="w-full">
                            <div class="flex flex-col gap-1 ">
                                <label for="name" class="font-semibold text-sm text-black">Address <span class="text-danger">*</span></label>
                                <input type="text" name="address" value="{{ isset($office->address) ? $office->address : '' }}" placeholder="Enter address....." class=" text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
                            </div>
                        </div>
                        <div class="w-full">
                            <div class="flex flex-col gap-1 ">
                                <label for="name" class="font-semibold text-sm text-black">City <span class="text-danger">*</span></label>
                                <input type="text" name="city" value="{{ isset($office->city) ? $office->city : '' }}" placeholder="Enter city....." class=" text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
                            </div>
                        </div>
                        <div class="w-full">
                            <div class="flex flex-col gap-1 ">
                                <label for="name" class="font-semibold text-sm text-black">Post Code <span class="text-danger">*</span></label>
                                <input type="text" name="code" value="{{ isset($office->code) ? $office->code : '' }}" placeholder="Enter code....." class=" text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
                            </div>
                        </div>
                        <div class="w-full">
                            <div class="flex flex-col gap-1 ">
                                <label for="name" class="font-semibold text-sm text-black">Constituency <span class="text-danger">*</span></label>
                                <input type="text" name="constituency" value="{{ isset($office->constituency) ? $office->constituency : '' }}" placeholder="Enter constituency....." class=" text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
                            </div>
                        </div>
                        <div class="w-full">
                            <div class="flex flex-col gap-1 ">
                                <label for="name" class="font-semibold text-sm text-black">Country <span class="text-danger">*</span></label>
                                <input type="text" name="country" value="{{ isset($office->country) ? $office->country : '' }}" placeholder="Enter country....." class=" text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
                            </div>
                        </div>
                        <div class="w-full">
                            <div class="flex flex-col gap-1  ">
                                <label for="name" class="font-semibold text-sm text-black">&nbsp</label>
                                <button class="w-max px-4 py-1.5 rounded-[3px] text-white bg-success hover:bg-primaryLight transition ease-in duration-2000 text-md font-semibold"></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> -->

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
                                <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Description</td>
                                <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Created At</td>
                                <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Address</td>
                                <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">City</td>
                                <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Post Code</td>
                                <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Constituency </td>
                                <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Country</td>
                                <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Status</td>
                                <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Actions</td>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm w-[100px]">1</td>
                                <td class="border-[1px] border-primaryLight/50 font-bold text-black px-4 py-0.5 text-sm w-[200px]">John Doe</td>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm w-[200px]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</td>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm w-[150px]">2024-01-01</td>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm w-[200px]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</td>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm w-[150px]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</td>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm w-[150px]">123456</td>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm w-[200px]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</td>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm w-[150px]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</td>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm">
                                </td>

                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-1 text-sm ">
                                    <div class="flex h-full">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>








</x-app-layout>