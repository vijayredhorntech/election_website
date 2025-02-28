<x-app-layout>
    @section('breadcrumb')
        <nav>
            <!-- breadcrumb -->
            <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                <li class="text-sm leading-normal">
                    <a class="text-black opacity-50" {{route('dashboard')}}>Dashboard</a>
                </li>
                <li class="text-sm pl-2 capitalize leading-normal text-black before:float-left before:pr-2 before:text-black before:content-['/']"
                    aria-current="page">Settings
                </li>
            </ol>
            <h6 class="mb-0 font-bold text-black capitalize">Account Settings</h6>
        </nav>
    @endsection

    @section('alertBox')
        @if (session('success'))
            <x-alert-box :message="session('success')" :type="'success'"/>
        @endif
        @if (session('error'))
            <x-alert-box :message="session('error')" :type="'error'"/>
        @endif
    @endsection

    <div class="w-full bg-primaryHeading  rounded-[3px] p-4 flex justify-between gap-4 flex-wrap">
        <div>
            <span class="text-white font-semibold lg:text-xl">Account Settings</span>
        </div>
    </div>

        <div class="w-full grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-4 mt-4">
            <div class="w-full">
                <div class="w-full bg-primaryHeading  rounded-[3px] px-4 py-1 flex justify-between gap-4 flex-wrap">
                    <div>
                        <span class="text-white font-semibold lg:text-md">Titles</span>
                    </div>
                    <div>
                        <button class="bg-primaryLight/70 hover:bg-primaryLight text-white px-3 py-1 rounded-[3px] text-xs font-semibold transition ease-in duration-2000"
                                onclick=" document.getElementById('addTitleDiv').classList.toggle('hidden')">Add New</button>
                    </div>
                </div>
                <div class="flex flex-wrap  -mx-3">
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
                                <form id="addTitleDiv" action="{{ route('settings.titles.store') }}" method="POST" class="hidden w-full grid lg:grid-col-3 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 bg-white mt-4 gap-4 pb-4">
                                    @csrf
                                    <div class="w-full">
                                        <div class="flex flex-col gap-1 ">
                                            <label for="name" class="font-semibold text-sm text-black">Title Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" placeholder="Enter name....." class=" text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
                                        </div>
                                    </div>
                                    <div class="w-full">
                                        <div class="flex flex-col gap-1  ">
                                            <label for="name" class="font-semibold text-sm text-black">&nbsp</label>
                                            <button class="w-max px-4 py-1.5 rounded-[3px] text-white bg-success hover:bg-primaryLight transition ease-in duration-2000 text-md font-semibold">Add Title</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap  -mx-3 ">
                    <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:w-full lg:flex-none">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white border-0 border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl dark:bg-gray-950 border-black-125 rounded-[3px] bg-clip-border">
                            <div class="overflow-x-auto p-2" id="titles" role="tabpanel">
                                <table class="w-full border-[1px] border-primaryLight/50 border-collapse">
                                    <thead>
                                    <tr class="bg-primaryDark/30">
                                        <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-1">Sr. no
                                        </td>
                                        <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-1 w-[200px]">Title</td>
                                        <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-1">Actions</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($titles as $title)
                                        <tr class="{{$loop->iteration%2 ===0?'bg-primaryDark/10':''}}">
                                            <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 text-sm w-[100px]">{{$loop->iteration}}</td>
                                            <td class="border-[1px] border-primaryLight/50 font-bold text-black px-4 text-sm w-[200px]">{{ $title->name }}</td>
                                            <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 text-sm ">
                                                <div class="flex h-full">
                                                    <button  data-id="{{ $title->id }}" data-name="{{ $title->name }}" class="bg-info text-white px-2 rounded-[3px]" title="Edit Office"><i class="fa fa-pen text-[9px]"></i></button>
                                                    <form action="{{ route('settings.titles.destroy', $title->id) }}"
                                                          method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button onclick="return confirm('Are you sure?')" class="bg-danger text-white px-3 rounded-[3px] ml-0.5" title="Delete Office"><i class="fa fa-trash text-[9px]"></i></button>
                                                    </form>

                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="11"
                                                class="border-[1px] border-primaryLight/50 font-medium text-black px-4 text-sm text-center">
                                                No Titles found
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full">
                <div class="w-full bg-primaryHeading  rounded-[3px] px-4 py-1 flex justify-between gap-4 flex-wrap">
                    <div>
                        <span class="text-white font-semibold lg:text-md">Country</span>
                    </div>
                    <div>
                        <button class="bg-primaryLight/70 hover:bg-primaryLight text-white px-3 py-1 rounded-[3px] text-xs font-semibold transition ease-in duration-2000"
                                onclick=" document.getElementById('addCountryDiv').classList.toggle('hidden')">Add New</button>
                    </div>
                </div>
                <div class="flex flex-wrap  -mx-3">
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
                                <form id="addCountryDiv" action="{{ route('settings.counties.store') }}" method="POST" class="hidden w-full grid lg:grid-col-3 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 bg-white mt-4 gap-4 pb-4">
                                    @csrf
                                    <div class="w-full">
                                        <div class="flex flex-col gap-1 ">
                                            <label for="name" class="font-semibold text-sm text-black">Country Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" placeholder="Enter name....." class=" text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
                                        </div>
                                    </div>
                                    <div class="w-full">
                                        <div class="flex flex-col gap-1 ">
                                            <label for="name" class="font-semibold text-sm text-black">Country Code <span class="text-danger">*</span></label>
                                            <input type="text" name="name" placeholder="Enter code....." class=" text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
                                        </div>
                                    </div>

                                    <div class="w-full">
                                        <div class="flex flex-col gap-1  ">
                                            <label for="name" class="font-semibold text-sm text-black">&nbsp</label>
                                            <button class="w-max px-4 py-1.5 rounded-[3px] text-white bg-success hover:bg-primaryLight transition ease-in duration-2000 text-md font-semibold">Add Title</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap  -mx-3 ">
                    <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:w-full lg:flex-none">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white border-0 border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl dark:bg-gray-950 border-black-125 rounded-[3px] bg-clip-border">
                            <div class="overflow-x-auto p-2" id="titles" role="tabpanel">
                                <table class="w-full border-[1px] border-primaryLight/50 border-collapse">
                                    <thead>
                                    <tr class="bg-primaryDark/30">
                                        <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-1">Sr. no
                                        </td>
                                        <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-1 w-[200px]">Name</td>
                                        <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-1 ">Code</td>
                                        <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-1">Actions</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($countries as $country)
                                        <tr class="{{$loop->iteration%2 ===0?'bg-primaryDark/10':''}}">
                                            <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 text-sm w-[100px]">{{$loop->iteration}}</td>
                                            <td class="border-[1px] border-primaryLight/50 font-bold text-black px-4 text-sm w-[200px]">{{ $country->name }}</td>
                                            <td class="border-[1px] border-primaryLight/50 font-bold text-black px-4 text-sm w-[200px]">{{ $country->code }}</td>
                                            <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 text-sm ">
                                                <div class="flex h-full">
                                                    <button  data-id="{{ $country->id }}"
                                                             data-name="{{ $country->name }}"
                                                             data-code="{{ $country->code }}" class="bg-info text-white px-2 rounded-[3px]" title="Edit Office"><i class="fa fa-pen text-[9px]"></i></button>
                                                    <form action="{{ route('settings.countries.destroy', $country->id) }}"
                                                          method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button onclick="return confirm('Are you sure?')" class="bg-danger text-white px-3 rounded-[3px] ml-0.5" title="Delete Office"><i class="fa fa-trash text-[9px]"></i></button>
                                                    </form>

                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="11"
                                                class="border-[1px] border-primaryLight/50 font-medium text-black px-4 text-sm text-center">
                                                No Titles found
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full">
                <div class="w-full bg-primaryHeading  rounded-[3px] px-4 py-1 flex justify-between gap-4 flex-wrap">
                    <div>
                        <span class="text-white font-semibold lg:text-md">County</span>
                    </div>
                    <div>
                        <button class="bg-primaryLight/70 hover:bg-primaryLight text-white px-3 py-1 rounded-[3px] text-xs font-semibold transition ease-in duration-2000"
                                onclick=" document.getElementById('addCountyDiv').classList.toggle('hidden')">Add New</button>
                    </div>
                </div>
                <div class="flex flex-wrap  -mx-3">
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
                                <form id="addCountyDiv" action="{{ route('settings.counties.store') }}" method="POST" class="hidden w-full grid lg:grid-col-3 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 bg-white mt-4 gap-4 pb-4">
                                    @csrf
                                    <div class="w-full">
                                        <div class="flex flex-col gap-1 ">
                                            <label for="name" class="font-semibold text-sm text-black">County Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" placeholder="Enter name....." class=" text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
                                        </div>
                                    </div>
                                    <div class="w-full">
                                        <div class="flex flex-col gap-1  ">
                                            <label for="name" class="font-semibold text-sm text-black">&nbsp</label>
                                            <button class="w-max px-4 py-1.5 rounded-[3px] text-white bg-success hover:bg-primaryLight transition ease-in duration-2000 text-md font-semibold">Add Title</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap  -mx-3 ">
                    <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:w-full lg:flex-none">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white border-0 border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl dark:bg-gray-950 border-black-125 rounded-[3px] bg-clip-border">
                            <div class="overflow-x-auto p-2" id="titles" role="tabpanel">
                                <table class="w-full border-[1px] border-primaryLight/50 border-collapse">
                                    <thead>
                                    <tr class="bg-primaryDark/30">
                                        <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-1">Sr. no
                                        </td>
                                        <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-1 w-[200px]">Name</td>
                                        <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-1 w-[200px]">Country</td>
                                        <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-1">Actions</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($counties as $county)
                                        <tr class="{{$loop->iteration%2 ===0?'bg-primaryDark/10':''}}">
                                            <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 text-sm w-[100px]">{{$loop->iteration}}</td>
                                            <td class="border-[1px] border-primaryLight/50 font-bold text-black px-4 text-sm w-[200px]">{{ $county->name }}</td>
                                            <td class="border-[1px] border-primaryLight/50 font-bold text-black px-4 text-sm w-[200px]">{{ $county->country ? $county->country->name : 'N/A' }}</td>
                                            <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 text-sm ">
                                                <div class="flex h-full">
                                                    <button  data-id="{{ $county->id }}"
                                                             data-name="{{ $county->name }}"
                                                             data-country="{{ $county->country_id }}" class="bg-info text-white px-2 rounded-[3px]" title="Edit Office"><i class="fa fa-pen text-[9px]"></i></button>
                                                    <form action="{{ route('settings.counties.destroy', $county->id) }}"
                                                          method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button onclick="return confirm('Are you sure?')" class="bg-danger text-white px-3 rounded-[3px] ml-0.5" title="Delete Office"><i class="fa fa-trash text-[9px]"></i></button>
                                                    </form>

                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="11"
                                                class="border-[1px] border-primaryLight/50 font-medium text-black px-4 text-sm text-center">
                                                No Titles found
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full">
                <div class="w-full bg-primaryHeading  rounded-[3px] px-4 py-1 flex justify-between gap-4 flex-wrap">
                    <div>
                        <span class="text-white font-semibold lg:text-md">Constituency</span>
                    </div>
                    <div>
                        <button class="bg-primaryLight/70 hover:bg-primaryLight text-white px-3 py-1 rounded-[3px] text-xs font-semibold transition ease-in duration-2000"
                                onclick=" document.getElementById('constituencyDiv').classList.toggle('hidden')">Add New</button>
                    </div>
                </div>
                <div class="flex flex-wrap  -mx-3">
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
                                <form id="constituencyDiv" action="{{ route('settings.constituencies.store') }}" method="POST" class="hidden w-full grid lg:grid-col-3 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 bg-white mt-4 gap-4 pb-4">
                                    @csrf
                                    <div class="w-full">
                                        <div class="flex flex-col gap-1 ">
                                            <label for="name" class="font-semibold text-sm text-black">Constituency Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" placeholder="Enter name....." class=" text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
                                        </div>
                                    </div>
                                    <div class="w-full">
                                        <div class="flex flex-col gap-1 ">
                                            <label for="name" class="font-semibold text-sm text-black">Country Name <span class="text-danger">*</span></label>
                                            <select id="country_id" name="country_id"  class=" text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
                                                <option value="">Select Country</option>
                                                @foreach($countries as $country)
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="w-full">
                                        <div class="flex flex-col gap-1 ">
                                            <label for="name" class="font-semibold text-sm text-black">County Name <span class="text-danger">*</span></label>
                                            <select id="county_id" name="county_id"  class=" text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
                                                <option value="">Select County</option>
                                                @foreach($countries as $country)
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="w-full">
                                        <div class="flex flex-col gap-1  ">
                                            <label for="name" class="font-semibold text-sm text-black">&nbsp</label>
                                            <button class="w-max px-4 py-1.5 rounded-[3px] text-white bg-success hover:bg-primaryLight transition ease-in duration-2000 text-md font-semibold">Add Title</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap  -mx-3 ">
                    <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:w-full lg:flex-none">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white border-0 border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl dark:bg-gray-950 border-black-125 rounded-[3px] bg-clip-border">
                            <div class="overflow-x-auto p-2" id="titles" role="tabpanel">
                                <table class="w-full border-[1px] border-primaryLight/50 border-collapse">
                                    <thead>
                                    <tr class="bg-primaryDark/30">
                                        <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-1">Sr. no
                                        </td>
                                        <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-1 w-[200px]">Name</td>
                                        <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-1 w-[200px]">County</td>
                                        <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-1 w-[200px]">Country</td>
                                        <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-1">Actions</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($constituencies as $constituency)
                                        <tr class="{{$loop->iteration%2 ===0?'bg-primaryDark/10':''}}">
                                            <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 text-sm w-[100px]">{{$loop->iteration}}</td>
                                            <td class="border-[1px] border-primaryLight/50 font-bold text-black px-4 text-sm w-[200px]">{{ $constituency->name }}</td>
                                            <td class="border-[1px] border-primaryLight/50 font-bold text-black px-4 text-sm w-[200px]">{{ $constituency->county ? $constituency->county->name : 'N/A' }}</td>
                                            <td class="border-[1px] border-primaryLight/50 font-bold text-black px-4 text-sm w-[200px]">{{ $constituency->country ? $constituency->country->name : 'N/A' }}</td>
                                            <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 text-sm ">
                                                <div class="flex h-full">
                                                    <button   data-id="{{ $constituency->id }}"
                                                              data-name="{{ $constituency->name }}"
                                                              data-county="{{ $constituency->county_id }}"
                                                              data-country="{{ $constituency->country_id }}" class="bg-info text-white px-2 rounded-[3px]" title="Edit Office"><i class="fa fa-pen text-[9px]"></i></button>
                                                    <form action="{{ route('settings.constituencies.destroy', $constituency->id) }}"
                                                          method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button onclick="return confirm('Are you sure?')" class="bg-danger text-white px-3 rounded-[3px] ml-0.5" title="Delete Office"><i class="fa fa-trash text-[9px]"></i></button>
                                                    </form>

                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="11"
                                                class="border-[1px] border-primaryLight/50 font-medium text-black px-4 text-sm text-center">
                                                No Constituency found
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full">
                <div class="w-full bg-primaryHeading  rounded-[3px] px-4 py-1 flex justify-between gap-4 flex-wrap">
                    <div>
                        <span class="text-white font-semibold lg:text-md">Profession</span>
                    </div>
                    <div>
                        <button class="bg-primaryLight/70 hover:bg-primaryLight text-white px-3 py-1 rounded-[3px] text-xs font-semibold transition ease-in duration-2000"
                                onclick=" document.getElementById('professionDiv').classList.toggle('hidden')">Add New</button>
                    </div>
                </div>
                <div class="flex flex-wrap  -mx-3">
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
                                <form id="professionDiv" action="{{ route('settings.professions.store') }}" method="POST" class="hidden w-full grid lg:grid-col-3 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 bg-white mt-4 gap-4 pb-4">
                                    @csrf
                                    <div class="w-full">
                                        <div class="flex flex-col gap-1 ">
                                            <label for="name" class="font-semibold text-sm text-black">Profession Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" placeholder="Enter name....." class=" text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
                                        </div>
                                    </div>
                                    <div class="w-full">
                                        <div class="flex flex-col gap-1  ">
                                            <label for="name" class="font-semibold text-sm text-black">&nbsp</label>
                                            <button class="w-max px-4 py-1.5 rounded-[3px] text-white bg-success hover:bg-primaryLight transition ease-in duration-2000 text-md font-semibold">Add Title</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap  -mx-3 ">
                    <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:w-full lg:flex-none">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white border-0 border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl dark:bg-gray-950 border-black-125 rounded-[3px] bg-clip-border">
                            <div class="overflow-x-auto p-2" id="titles" role="tabpanel">
                                <table class="w-full border-[1px] border-primaryLight/50 border-collapse">
                                    <thead>
                                    <tr class="bg-primaryDark/30">
                                        <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-1">Sr. no
                                        </td>
                                        <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-1 w-[200px]">Name</td>
                                        <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-1">Actions</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($professions as $profession)
                                        <tr class="{{$loop->iteration%2 ===0?'bg-primaryDark/10':''}}">
                                            <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 text-sm w-[100px]">{{$loop->iteration}}</td>
                                            <td class="border-[1px] border-primaryLight/50 font-bold text-black px-4 text-sm w-[200px]">{{ $profession->name }}</td>
                                            <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 text-sm ">
                                                <div class="flex h-full">
                                                    <button   data-id="{{ $profession->id }}"
                                                              data-name="{{ $profession->name }}" class="bg-info text-white px-2 rounded-[3px]" title="Edit Office"><i class="fa fa-pen text-[9px]"></i></button>
                                                    <form action="{{ route('settings.professions.destroy', $profession->id) }}"
                                                          method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button onclick="return confirm('Are you sure?')" class="bg-danger text-white px-3 rounded-[3px] ml-0.5" title="Delete Office"><i class="fa fa-trash text-[9px]"></i></button>
                                                    </form>

                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="11"
                                                class="border-[1px] border-primaryLight/50 font-medium text-black px-4 text-sm text-center">
                                                No Profession found
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full">
                <div class="w-full bg-primaryHeading  rounded-[3px] px-4 py-1 flex justify-between gap-4 flex-wrap">
                    <div>
                        <span class="text-white font-semibold lg:text-md">Education</span>
                    </div>
                    <div>
                        <button class="bg-primaryLight/70 hover:bg-primaryLight text-white px-3 py-1 rounded-[3px] text-xs font-semibold transition ease-in duration-2000"
                                onclick=" document.getElementById('educationDiv').classList.toggle('hidden')">Add New</button>
                    </div>
                </div>
                <div class="flex flex-wrap  -mx-3">
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
                                <form id="educationDiv" action="{{ route('settings.education.store') }}" method="POST" class="hidden w-full grid lg:grid-col-3 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 bg-white mt-4 gap-4 pb-4">
                                    @csrf
                                    <div class="w-full">
                                        <div class="flex flex-col gap-1 ">
                                            <label for="name" class="font-semibold text-sm text-black">Education Level Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" placeholder="Enter name....." class=" text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
                                        </div>
                                    </div>
                                    <div class="w-full">
                                        <div class="flex flex-col gap-1  ">
                                            <label for="name" class="font-semibold text-sm text-black">&nbsp</label>
                                            <button class="w-max px-4 py-1.5 rounded-[3px] text-white bg-success hover:bg-primaryLight transition ease-in duration-2000 text-md font-semibold">Add Title</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap  -mx-3 ">
                    <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:w-full lg:flex-none">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white border-0 border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl dark:bg-gray-950 border-black-125 rounded-[3px] bg-clip-border">
                            <div class="overflow-x-auto p-2" id="titles" role="tabpanel">
                                <table class="w-full border-[1px] border-primaryLight/50 border-collapse">
                                    <thead>
                                    <tr class="bg-primaryDark/30">
                                        <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-1">Sr. no
                                        </td>
                                        <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-1 w-[200px]">Name</td>
                                        <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-1">Actions</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($educations as $education)
                                        <tr class="{{$loop->iteration%2 ===0?'bg-primaryDark/10':''}}">
                                            <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 text-sm w-[100px]">{{$loop->iteration}}</td>
                                            <td class="border-[1px] border-primaryLight/50 font-bold text-black px-4 text-sm w-[200px]">{{ $education->name }}</td>
                                            <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 text-sm ">
                                                <div class="flex h-full">
                                                    <button   data-id="{{ $education->id }}"
                                                              data-name="{{ $education->name }}" class="bg-info text-white px-2 rounded-[3px]" title="Edit Office"><i class="fa fa-pen text-[9px]"></i></button>
                                                    <form action="{{ route('settings.education.destroy', $education->id) }}"
                                                          method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button onclick="return confirm('Are you sure?')" class="bg-danger text-white px-3 rounded-[3px] ml-0.5" title="Delete Office"><i class="fa fa-trash text-[9px]"></i></button>
                                                    </form>

                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="11"
                                                class="border-[1px] border-primaryLight/50 font-medium text-black px-4 text-sm text-center">
                                                No Education found
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>






        </div>








    <!-- Add/Edit Modals for each section -->
    @include('admin.settings.modals.title')
    @include('admin.settings.modals.country')
    @include('admin.settings.modals.county')
    @include('admin.settings.modals.constituency')
    @include('admin.settings.modals.profession')
    @include('admin.settings.modals.education')

    @push('scripts')
        <script>
            $(document).ready(function () {
                // Handle edit buttons for each section
                $('.edit-title, .edit-country, .edit-county, .edit-constituency, .edit-profession, .edit-education').click(function () {
                    const id = $(this).data('id');
                    const name = $(this).data('name');
                    const modalId = '#edit' + $(this).attr('class').split(' ')[2].charAt(5).toUpperCase() + $(this).attr('class').split(' ')[2].slice(6) + 'Modal';
                    const formAction = $(this).closest('tr').find('form').attr('action').replace('destroy', 'update');

                    $(modalId + ' form').attr('action', formAction);
                    $(modalId + ' input[name="name"]').val(name);

                    if ($(this).data('code')) {
                        $(modalId + ' input[name="code"]').val($(this).data('code'));
                    }
                    if ($(this).data('country')) {
                        $(modalId + ' select[name="country_id"]').val($(this).data('country'));
                    }
                    if ($(this).data('county')) {
                        $(modalId + ' select[name="county_id"]').val($(this).data('county'));
                    }

                    $(modalId).modal('show');
                });

                // Dynamic county loading based on country selection
                $('select[name="country_id"]').change(function () {
                    const countryId = $(this).val();
                    const countySelect = $(this).closest('.modal-body').find('select[name="county_id"]');

                    if (countryId) {
                        $.get(`/admin/settings/counties/by-country/${countryId}`, function (data) {
                            countySelect.empty();
                            countySelect.append('<option value="">Select County</option>');
                            $.each(data, function (key, value) {
                                countySelect.append(new Option(value.name, value.id));
                            });
                        });
                    } else {
                        countySelect.empty();
                        countySelect.append('<option value="">Select County</option>');
                    }
                });
            });
        </script>
    @endpush
</x-app-layout>
