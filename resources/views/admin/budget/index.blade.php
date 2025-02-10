<x-app-layout>

    @section('breadcrumb')
        <nav>
            <!-- breadcrumb -->
            <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                <li class="text-sm leading-normal">
                    <a class="text-black opacity-50" {{route('dashboard')}}>Dashboard</a>
                </li>
                <li class="text-sm pl-2 capitalize leading-normal text-black before:float-left before:pr-2 before:text-black before:content-['/']"
                    aria-current="page">Budget
                </li>
            </ol>
            <h6 class="mb-0 font-bold text-black capitalize">Budget Management</h6>
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
                <span class="text-white font-semibold lg:text-xl">Budget Management</span>
            </div>
            <div>
                <button class="bg-primaryLight/70 hover:bg-primaryLight text-white px-3 py-1 rounded-[3px] text-sm font-semibold transition ease-in duration-2000"
                        onclick=" document.getElementById('allot').classList.toggle('hidden')">Allot Budget</button>
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
                        <form id="allot" action="{{$formData['url']}}" method="{{$formData['method']}}" class="{{$formData['type']==='Create' && !$errors->any() ?'hidden':''}} w-full grid lg:grid-col-3 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 bg-white mt-4 gap-4 pb-4">
                            @csrf
                            <div class="w-full">
                                <div class="flex flex-col gap-1 ">
                                    <label for="name" class="font-semibold text-sm text-black">Select Office <span class="text-danger">*</span></label>
                                    <select type="text" name="office_name" class=" text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
                                        <option value="1">Office 1</option>
                                        <option value="1">Office 2</option>
                                        <option value="1">Office 3</option>
                                        <option value="1">Office 4</option>
                                    </select>
                                </div>
                            </div>
                            <div class="w-full">
                                <div class="flex flex-col gap-1 ">
                                    <label for="name" class="font-semibold text-sm text-black">Type <span class="text-danger">*</span></label>
                                    <select type="text" name="type" class=" text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
                                        <option value="1">Credit</option>
                                        <option value="1">Debit</option>
                                    </select>
                                </div>
                            </div>
                            <div class="w-full">
                                <div class="flex flex-col gap-1 ">
                                    <label for="name" class="font-semibold text-sm text-black">Amount <span class="text-danger">*</span></label>
                                    <input type="number" name="amount" value="{{ $office->description ?? old('description') }}" placeholder="Enter amount....." class=" text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
                                </div>
                            </div>
                            <div class="w-full">
                                <div class="flex flex-col gap-1 ">
                                    <label for="name" class="font-semibold text-sm text-black">Description <span class="text-danger">*</span></label>
                                    <textarea  name="amount" placeholder="Enter description....." rows="2" class=" text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">

                                    </textarea>
                                </div>
                            </div>
                            <div class="w-full">
                                <div class="flex flex-col gap-1  ">
                                    <label for="name" class="font-semibold text-sm text-black">&nbsp</label>
                                    <button class="w-max px-4 py-1.5 rounded-[3px] text-white bg-success hover:bg-primaryLight transition ease-in duration-2000 text-md font-semibold">Allot Budget</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3  lg:w-2/3 lg:flex-none">
                <div
                    class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-[3px] border-0 border-solid bg-white bg-clip-border">
                    <div class="w-full bg-primaryHeading rounded-t-[3px] py-4 px-2">
                        <span class="text-white font-semibold lg:text-xl ">Budget Details (Office Wise)</span>
                    </div>
                    <div class="flex-auto p-4">
                        <div style="display: flex; justify-content: center; align-items: center">
                            <canvas id="officeWiseBuddgetChart"  height="142"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full max-w-full px-3  lg:w-1/3 lg:flex-none">
                <div
                    class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-[3px] border-0 border-solid bg-white bg-clip-border">
                    <div class="w-full bg-primaryHeading rounded-t-[3px] py-4 px-2">
                        <span class="text-white font-semibold lg:text-xl ">Budget Details (Financial Wise)</span>
                    </div>
                    <div class="flex-auto p-4">
                        <div style="display: flex;  justify-content: center; align-items: center">
                            <canvas id="financialYearWiseOfficeDetails"> </canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @push('scripts')
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <script>
                // Function to initialize both charts
                function initializeCharts() {
                    // Office Budget Chart
                    const officeCtx = document.getElementById('officeWiseBuddgetChart').getContext('2d');

                    const officeData = {
                        labels: ['Office 1', 'Office 2', 'Office 3', 'Office 4', 'Office 5', 'Office 6', 'Office 7', 'Office 8', 'Office 9', 'Office 10'],
                        datasets: [
                            {
                                label: 'Total Budget',
                                data: [100000, 120000, 90000, 150000, 80000, 90000, 150000, 100000, 120000, 90000, 150000],
                                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                                borderColor: 'rgba(54, 162, 235, 1)',
                                borderWidth: 1
                            },
                            {
                                label: 'Used Budget',
                                data: [70000, 80000, 60000, 100000, 50000, 50000, 40000, 30000, 40000, 30000, 50000],
                                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                                borderColor: 'rgba(255, 99, 132, 1)',
                                borderWidth: 1
                            },
                            {
                                label: 'Remaining Budget',
                                data: [30000, 40000, 30000, 50000, 30000, 40000, 110000, 70000, 80000, 60000, 100000],
                                backgroundColor: 'rgba(75, 192, 192, 0.5)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }
                        ]
                    };

                    const officeConfig = {
                        type: 'bar',
                        data: officeData,
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'top',
                                },
                                title: {
                                    display: false,
                                    text: 'Office-wise Budget Distribution'
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    ticks: {
                                        callback: function(value) {
                                            return '₹' + value.toLocaleString();
                                        }
                                    }
                                }
                            }
                        }
                    };

                    // Create office budget chart
                    new Chart(officeCtx, officeConfig);

                    // Financial Year Chart
                    const yearCtx = document.getElementById('financialYearWiseOfficeDetails').getContext('2d');

                    // Generate financial years
                    const generateFinancialYears = () => {
                        const years = [];
                        for (let i = 2025; i <= 2039; i++) {
                            years.push(`${i}-${i + 1}`);
                        }
                        return years;
                    };

                    // Generate colors
                    const generateColors = (count) => {
                        const colors = [];
                        for (let i = 0; i < count; i++) {
                            const hue = (i * 360) / count;
                            colors.push(`hsla(${hue}, 70%, 60%, 0.8)`);
                        }
                        return colors;
                    };

                    const financialYears = generateFinancialYears();
                    const colors = generateColors(financialYears.length);

                    const yearData = {
                        labels: financialYears,
                        datasets: [{
                            data: [
                                1000000, 1200000, 1500000, 1800000, 2000000,
                                2200000, 2500000, 2800000, 3000000, 3200000,
                                3500000, 3800000, 4000000, 4200000, 4500000
                            ],
                            backgroundColor: colors,
                            borderColor: colors.map(color => color.replace('0.8', '1')),
                            borderWidth: 1
                        }]
                    };

                    const yearConfig = {
                        type: 'pie',
                        data: yearData,
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'top',
                                    labels: {
                                        font: {
                                            size: 11
                                        }
                                    }
                                },
                                title: {
                                    display: false,
                                    text: 'Budget Allocation by Financial Year',
                                    font: {
                                        size: 16
                                    }
                                },
                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            const label = context.label || '';
                                            const value = context.formattedValue;
                                            return `${label}: ₹${parseInt(value).toLocaleString()}`;
                                        }
                                    }
                                }
                            }
                        }
                    };

                    // Create financial year chart
                    new Chart(yearCtx, yearConfig);
                }

                // Initialize charts when DOM is loaded
                document.addEventListener('DOMContentLoaded', initializeCharts);
            </script>
        @endpush



</x-app-layout>
