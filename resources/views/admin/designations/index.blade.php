<x-app-layout>

    @section('breadcrumb')
    <nav>
        <!-- breadcrumb -->
        <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
            <li class="text-sm leading-normal">
                <a class="text-black opacity-50" {{route('dashboard')}}>Dashboard</a>
            </li>
            <li class="text-sm pl-2 capitalize leading-normal text-black before:float-left before:pr-2 before:text-black before:content-['/']"
                aria-current="page">Designations</li>
        </ol>
        <h6 class="mb-0 font-bold text-black capitalize">Designations List</h6>
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
            <span class="text-white font-semibold lg:text-xl">Designations</span>
        </div>
        <div>
            <button class="bg-primaryLight/70 hover:bg-primaryLight text-white px-3 py-1 rounded-[3px] text-sm font-semibold transition ease-in duration-2000"
                onclick=" document.getElementById('createNewDesignationForm').classList.toggle('hidden')">Create New Designation</button>
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
                    <form id="createNewDesignationForm" action="{{$formData['url']}}" method="{{$formData['method']}}" class="{{$formData['type']==='Create'?'hidden':''}} w-full grid lg:grid-col-3 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 bg-white mt-4 gap-4 pb-4">
                        @csrf
                        <div class="w-full">
                            <div class="flex flex-col gap-1 ">
                                <label for="name" class="font-semibold text-sm text-black">Designation Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" value="{{ isset($designation->name) ? $designation->name : '' }}" placeholder="Enter designation name....." class=" text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
                            </div>
                        </div>
                        <div class="w-full">
                            <div class="flex flex-col gap-1 ">
                                <label for="name" class="font-semibold text-sm text-black">Designation Description <span class="text-danger">*</span></label>
                                <input type="text" name="description" value="{{ isset($designation->description) ? $designation->description : '' }}" placeholder="Enter designation description....." class=" text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
                            </div>
                        </div>
                        <div class="w-full">
                            <div class="flex flex-col gap-1  ">
                                <label for="name" class="font-semibold text-sm text-black">&nbsp</label>
                                <button class="w-max px-4 py-1.5 rounded-[3px] text-white bg-success hover:bg-primaryLight transition ease-in duration-2000 text-md font-semibold">{{$formData['type']==='Create'?'Create Designation':'Update Designation'}}</button>
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
                                <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Designation</td>
                                <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Description</td>
                                <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Created At</td>
                                <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($designations as $designation)
                            <tr class="{{$loop->iteration%2 ===0?'bg-primaryDark/10':''}}">
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm">{{$loop->iteration}}</td>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm">{{$designation->name}}</td>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm">{{$designation->description}}</td>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm">{{ $designation->created_at->format('d-m-Y, h:i A') }}</td>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-1 text-sm">
                                    <a href="{{route('designations.edit',['id'=>$designation->id])}}" class="bg-info text-white px-3 py-1 rounded-[3px]" title="Edit Designation"><i class="fa fa-pen text-xs"></i></a>
                                    <a href="{{route('designations.delete',['id'=>$designation->id])}}" class="bg-danger text-white px-3 py-1 rounded-[3px] ml-0.5" title="Delete Designation"><i class="fa fa-trash text-xs"></i></a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5"
                                    class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm text-center">
                                    No designations found
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