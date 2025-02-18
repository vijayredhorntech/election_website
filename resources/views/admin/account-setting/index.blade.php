<x-app-layout>

    @section('breadcrumb')
    <nav>
        <!-- breadcrumb -->
        <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
            <li class="text-sm leading-normal">
                <a class="text-black opacity-50" {{route('dashboard')}}>Dashboard</a>
            </li>
            <li class="text-sm pl-2 capitalize leading-normal text-black before:float-left before:pr-2 before:text-black before:content-['/']"
                aria-current="page">Account Setting
            </li>
        </ol>
        <h6 class="mb-0 font-bold text-black capitalize">Account Setting</h6>
    </nav>
    @endsection

    @section('extraLib')
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    @endsection

    <!-- Modal for creating new expense category -->
    <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-black">
                        Create New Expense Category
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-black hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form id="expense-category-form" class="p-4 md:p-5" action="{{route('expense.category.store')}}" method="POST">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Name</label>
                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-black dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type category name" required="">
                        </div>
                    </div>
                    <button type="submit" class="text-black inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                        </svg>
                        Add Expense Category
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal for creating new constituency -->
    <div id="constituency-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-black">
                        Create New Constituency
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-black hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form id="constituency-form" class="p-4 md:p-5" action="{{route('constituencies.store')}}" method="POST">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Name</label>
                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-black dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type category name" required="">
                        </div>
                    </div>
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Code</label>
                            <input type="text" name="code" id="code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-black dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type constituency code" required="">
                        </div>
                    </div>
                    <button type="submit" class="text-black inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                        </svg>
                        Add new category
                    </button>
                </form>
            </div>
        </div>
    </div>


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
            <span class="text-white font-semibold lg:text-xl">Account Setting</span>
        </div>
        <!-- <div>
            <button class="bg-primaryLight/70 hover:bg-primaryLight text-white px-3 py-1 rounded-[3px] text-sm font-semibold transition ease-in duration-2000"
                onclick=" document.getElementById('allot').classList.toggle('hidden')">Allot Budget</button>
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

    <div class="flex flex-wrap -mx-3">
        <div class="w-full max-w-full px-3  lg:w-2/3 lg:flex-none">
            <div
                class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-[3px] border-0 border-solid bg-white bg-clip-border">
                <div class="w-full bg-primaryHeading rounded-t-[3px] py-4 px-2">
                    <span class="text-white font-semibold lg:text-xl ">Expense Setting</span>
                </div>
                <div class="flex-auto p-4">
                    <!-- Add Expense Category Button -->
                    <!-- <button type="" onclick="" class="btn btn-primary">Add</button> -->
                    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-black bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                        Add Expense Category
                    </button>
                    <!-- <button id="openModal" class="block text-black bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Add Expense Category
                    </button> -->
                    <!-- existing categories -->
                    <div class="mt-4">
                        <h4 class="text-lg font-bold">Existing Categories</h4>
                        <ul class="list-disc pl-5">
                            @foreach ($expenseCategories as $expenseCategory)
                            <li>{{$expenseCategory->name}}
                                <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" type="button" class="text-blue-500" onclick="editExpenseCategory({{$expenseCategory}})">Edit</button>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- popup for editing  -->
        <div class="w-full max-w-full px-3  lg:w-1/3 lg:flex-none">
            <div
                class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-[3px] border-0 border-solid bg-white bg-clip-border">
                <div class="w-full bg-primaryHeading rounded-t-[3px] py-4 px-2">
                    <span class="text-white font-semibold lg:text-xl ">Constituecies Setting</span>
                </div>
                <div class="flex-auto p-4">
                    <button data-modal-target="constituency-modal" data-modal-toggle="constituency-modal" class="block text-black bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                        Add Constituency
                    </button>
                    <div style="display: flex; justify-content: center; align-items: center">
                        <h4 class="text-lg font-bold">Existing Constituencies</h4>
                        <ul class="list-disc pl-5" id="constituencies-list">
                            @foreach ($constituencies as $constituency)
                            <li>{{$constituency->name}} ({{$constituency->code}})
                            </li>
                            @endforeach
                        </ul>
                        <div class="flex justify-center">
                            <button id="load-more" class="btn btn-primary" data-page="1" data-limit="10">Load More</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        let name = document.getElementById('name');
        let expenseCategoryForm = document.getElementById('expense-category-form');

        function editExpenseCategory(expense) {
            let url = "{{route('expense.category.update', ':id')}}";
            url = url.replace(':id', expense.id);
            name.value = expense.name;
            expenseCategoryForm.action = url;
        }

        let constituencyName = document.getElementById('constituency-name');
        let constituencyCode = document.getElementById('constituency-code');
        let constituencyForm = document.getElementById('constituency-form');

        function editConstituency(constituency) {
            console.log(constituency);
            let url = "{{route('constituencies.update', ':id')}}";
            url = url.replace(':id', constituency.id);
            constituencyName.value = constituency.name;
            constituencyCode.value = constituency.code;
            constituencyForm.action = url;
        }
    </script>
    @endpush
</x-app-layout>