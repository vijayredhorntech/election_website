<x-app-layout>

    @section('breadcrumb')
    <nav>
        <!-- breadcrumb -->
        <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
            <li class="text-sm leading-normal">
                <a class="text-black opacity-50" {{route('dashboard')}}>Dashboard</a>
            </li>
            <li class="text-sm pl-2 capitalize leading-normal text-black before:float-left before:pr-2 before:text-black before:content-['/']"
                aria-current="page">Contact Queries</li>
        </ol>
        <h6 class="mb-0 font-bold text-black capitalize">Contact Queries</h6>
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
            <span class="text-white font-semibold lg:text-xl">Contact Queries</span>
        </div>
        <!-- <div>
            <button class="bg-primaryLight/70 hover:bg-primaryLight text-white px-3 py-1 rounded-[3px] text-sm font-semibold transition ease-in duration-2000"
                onclick=" document.getElementById('createNewDesignationForm').classList.toggle('hidden')">Create New Designation</button>
        </div> -->
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
                                <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Email</td>
                                <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Subject</td>
                                <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Message</td>
                                <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Created At</td>
                                <td class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($contacts as $contact)
                            <tr class="{{$loop->iteration%2 ===0?'bg-primaryDark/10':''}}">
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm">{{$loop->iteration}}</td>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm">{{$contact->name}}</td>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm">{{$contact->email}}</td>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm">{{$contact->subject}}</td>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm">{{$contact->message}}</td>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm">{{ $contact->created_at->format('d-m-Y, h:i A') }}</td>
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-1 text-sm">
                                    <a href="{{route('contact.index'}}" class="bg-info text-white px-3 py-1 rounded-[3px]" title="Edit Query"><i class="fa fa-pen text-xs"></i></a>
                                    <a href="{{route('contact.index'}}" class="bg-danger text-white px-3 py-1 rounded-[3px] ml-0.5" title="Delete Query"><i class="fa fa-trash text-xs"></i></a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7"
                                    class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm text-center">
                                    No queries found
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