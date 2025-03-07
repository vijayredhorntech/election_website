<x-app-layout>

    @section('breadcrumb')
    <nav>
        <!-- breadcrumb -->
        <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
            <li class="text-sm leading-normal">
                <a class="text-black opacity-50" {{route('dashboard')}}>Dashboard</a>
            </li>
            <li class="text-sm pl-2 capitalize leading-normal text-black before:float-left before:pr-2 before:text-black before:content-['/']"
                aria-current="page">Office</li>
        </ol>
        <h6 class="mb-0 font-bold text-black capitalize">Office List</h6>
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
            <span class="text-white font-semibold lg:text-xl">Offices</span>
        </div>
        <div>
            <button class="bg-primaryLight/70 hover:bg-primaryLight text-white px-3 py-1 rounded-[3px] text-sm font-semibold transition ease-in duration-2000"
                onclick=" document.getElementById('createNewOfficeDiv').classList.toggle('hidden')">Create New Office</button>
        </div>
    </div>
    <div class="flex flex-wrap  -mx-3 pb-6">
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
                    <form id="createNewOfficeDiv" action="{{$formData['url']}}" method="{{$formData['method']}}" class="{{$formData['type']==='Create' && !$errors->any() ?'hidden':''}} w-full grid lg:grid-col-3 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 bg-white mt-4 gap-4 pb-4">
                        @csrf
                        <div class="w-full lg:col-span-3 md:col-span-3 sm:col-span-2 col-span-1">
                            <div x-data="{
                                search: '',
                                selected: {{ $selectedConstituencies ?? '[]' }},
                                open: false
                            }" class="relative">
                                <label for="search" class="font-semibold text-sm text-black">
                                    Constituencies Under Management
                                </label>

                                <!-- Display selected constituencies -->
                                <div class="flex flex-wrap gap-2 mt-2">
                                    <template x-for="(item, index) in selected" :key="item.id">
                                        <div class="flex items-center bg-blue-500 text-white px-3 py-1 rounded-full">
                                            <span x-text="item.name"></span>
                                            <button type="button" class="ml-2 focus:outline-none" @click="selected.splice(index, 1)">
                                                ✖
                                            </button>
                                        </div>
                                    </template>
                                </div>

                                <!-- Search & Select -->
                                <div class="relative mt-2">
                                    <input
                                        type="text"
                                        id="search"
                                        x-model="search"
                                        placeholder="Search constituencies..."
                                        @focus="open = true"
                                        @click.away="open = false"
                                        class="w-full px-3 py-2 border rounded-md focus:ring focus:ring-blue-300">

                                    <div x-show="open" class="absolute w-full bg-white border rounded-md mt-1 max-h-40 overflow-y-auto shadow-lg z-10">
                                        @foreach ($constituencies as $constituency)
                                        <div
                                            class="px-3 py-2 cursor-pointer hover:bg-blue-100"
                                            x-show="$el.innerText.toLowerCase().includes(search.toLowerCase())"
                                            @click="selected.push({ id: {{ $constituency->id }}, name: '{{ addslashes($constituency->name) }}', code: '{{ $constituency->code }}' }), open = false, search = ''">
                                            {{ $constituency->name }}
                                        </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Hidden inputs for selected constituencies -->
                                <template x-for="item in selected">
                                    <input type="hidden" name="constituencies[]" :value="item.code">
                                </template>
                            </div>
                        </div>

                        <div class="w-full">
                            <div class="flex flex-col gap-1 ">
                                <label for="name" class="font-semibold text-sm text-black">Office Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" value="{{ $office->name ?? old('name') }}" placeholder="Enter name....." class=" text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
                            </div>
                        </div>
                        <div class="w-full">
                            <div class="flex flex-col gap-1 ">
                                <label for="name" class="font-semibold text-sm text-black">Office Description <span class="text-danger">*</span></label>
                                <input type="text" name="description" value="{{ $office->description ?? old('description') }}" placeholder="Enter description....." class=" text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
                            </div>
                        </div>
                        <x-address :data="$office ?? null" />
                        <div class="w-full">
                            <div class="flex flex-col gap-1  ">
                                <label for="name" class="font-semibold text-sm text-black">&nbsp</label>
                                <button class="w-max px-4 py-1.5 rounded-[3px] text-white bg-success hover:bg-primaryLight transition ease-in duration-2000 text-md font-semibold">{{$formData['type']==='Create'?'Create Office':'Update Office'}}</button>
                            </div>
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
                                <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Address</td>
                                <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">In Charge</td>
                                <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Budget</td>
                                <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Remaining Budget</td>
                                <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Employees</td>
                                <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Constituencies </td>
                                <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Members</td>
                                <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Events</td>
                                <!-- <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Status</td> -->
                                <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($offices as $office)
                            <tr class="{{$loop->iteration%2 ===0?'bg-primaryDark/10':''}}">
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm w-[100px]">{{$loop->iteration}}</td>
                                <td class="border-[1px] border-primaryLight/50 font-bold text-black px-4 py-0.5 text-sm w-[200px]">{{$office->name}}</td>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm w-[200px]">
                                    {{ Str::limit($office->house_name_number . ' ' . $office->street . ' ' . $office->town_city . ' ' . $office->postcode, 10) }}
                                </td>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm w-[200px]">
                                    {{$office->in_charge}}
                                </td>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm w-[200px]">£ {{number_format($office->budgets->sum('amount'), 2)}}</td>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm w-[200px]">£ {{number_format($office->budgets->sum('amount') - $office->expenses->sum('amount'), 2)}}</td>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm w-[200px]">{{$office->employees->count()}}</td>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm w-[200px] relative"
                                    x-data="{ showTooltip: false }">

                                    <button
                                        @mouseover="showTooltip = true"
                                        @mouseleave="showTooltip = false"
                                        class="bg-primary text-sm px-3 py-1 text-sm rounded-md hover:bg-primary/80 transition duration-300">
                                        Show
                                    </button>

                                    <!-- Tooltip (Now Appears Above) -->
                                    <!-- <div
                                        x-show="showTooltip"
                                        x-transition
                                        class="fixed left-1/2 bottom-[100%] transform -translate-x-1/2 mb-2 bg-black text-white text-xs rounded-lg p-2 w-48 shadow-lg z-[9999]"
                                        style="display: none;">
                                        <ul class="list-none text-left">
                                            @foreach ($office->constituencies as $constituency)
                                            <li class="py-1 border-b border-gray-700 last:border-none">
                                                <strong>{{$constituency->name}}:</strong> {{$constituency->members_count}}
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div> -->
                                    <div
                                        x-show="showTooltip"
                                        x-transition
                                        class="absolute left-1/2 bottom-full transform -translate-x-1/2 mb-2 bg-black text-white text-xs rounded-lg p-2 w-48 shadow-lg z-10"
                                        style="display: none;">
                                        <ul class="list-none text-left">
                                            @foreach ($office->constituencies as $constituency)
                                            <li class="py-1 border-b border-gray-700 last:border-none">
                                                <strong>{{$constituency->name}}:</strong> {{$constituency->members_count}}
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </td>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm w-[200px]">{{$office->total_members}}</td>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm w-[200px]">{{$office->events->count()}}</td>
                                <!-- <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm">
                                    <a href="{{route('office.status',['id'=>$office->id])}}" class="bg-{{$office->status?"success":"danger"}}/10 border-[1px] border-{{$office->status?"success":"danger"}} font-bold text-{{$office->status?"success":"danger"}} px-4 py-0.5 rounded-[3px]"> {{$office->status?"Active":"Inactive"}}</a>
                                </td> -->

                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-1 text-sm ">
                                    <div class="flex h-full">
                                        <a href="{{route('office.edit',['id'=>$office->id])}}" class="bg-info text-white px-3 py-1 rounded-[3px]" title="Edit Office"><i class="fa fa-pen text-xs"></i></a>
                                        <a href="{{route('office.view',['id'=>$office->id])}}" class="bg-success text-white px-3 py-1 rounded-[3px] ml-0.5" title="View Office"><i class="fa fa-eye text-xs"></i></a>
                                        <!-- <a href="{{route('office.delete',['id'=>$office->id])}}" class="bg-danger text-white px-3 py-1 rounded-[3px] ml-0.5" title="Delete Office"><i class="fa fa-trash text-xs"></i></a> -->

                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="11"
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

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endpush