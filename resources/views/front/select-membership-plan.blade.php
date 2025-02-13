<x-front.layout>
    @push('styles')
    <style>
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
    @endpush

    <section class="bg-gray-100 lg:py-40 md:py-24 sm:py-24 py-16 mt-24 px-4 bg-center bg-cover"
        style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url({{asset('assets/images/GettyImages-2157434514.jpg')}})">
        <div class="container lg:max-w-xl  bg-white mx-auto  text-gray-800 rounded-[5px]">
            <div class="bg-white px-4 py-12 flex flex-col items-center text-center rounded-[5px] shadow-lg shadow-gray-800">
                <span class="text-black font-bold text-2xl">Pick your membership rate</span>
                <span class="text-gray-500 font-medium text-sm mt-2">
                    Your donation will help us build a better future for the UK.
                </span>
                @if(session('error'))
                <div class="text-red-600 text-sm font-semibold mt-4">{{session('error')}}</div>
                @endif @if(session('success'))
                <div class="text-green-600 text-sm font-semibold mt-4">{{session('success')}}</div>
                @endif
                <form action="{{route('memberShipPayment')}}" method="get" class="w-full mt-8 lg:px-8">
                    @csrf
                    <div class="flex flex-col gap-4 justify-center space-x-4 mb-8">
                        @php
                        $memberShipPlans = [
                        [
                        'id' => '1',
                        'type' => '',
                        'amount' => '5.88',
                        'label' => 'Membership 1',
                        ],
                        [
                        'id' => '2',
                        'type' => '',
                        'amount' => '10.88',
                        'label' => 'Membership 2',
                        ],
                        [
                        'id' => '3',
                        'type' => '',
                        'amount' => '15.88',
                        'label' => 'Membership 3',
                        ],

                        ];
                        @endphp

                        @foreach($memberShipPlans as $plan)
                        <label class="inline-flex items-start w-full">
                            <input type="radio" name="memberShip" value="{{$plan['id']}}" class="hidden" {{$loop->iteration===1?'checked':''}}>
                            <div class="donation-type-btn w-full flex flex-col items-start text-2xl justify-start px-6 py-4 font-semibold rounded-[3px] cursor-pointer border-2  {{$loop->iteration===1?'bg-[#b30d00] text-white border-[#b30d00]':'bg-white text-[#b30d00] border-[#b30d00] hover:border-[#daae51]'}} " data-type="{{$plan['id']}}">
                                £ {{$plan['amount']}}/ MO
                                <span class="text-[20px]">{{$plan['label']}}</span>
                                <p class="text-sm">{{$plan['type']}}</p>
                            </div>
                        </label>
                        @endforeach
                    </div>
                    <!-- Donate Button -->
                    <div class="w-full flex justify-end">
                        <button class="w-full flex items-center justify-center text-center bg-[#b30d00] text-white py-4 px-6 rounded-lg hover:opacity-90 transition-all duration-300 shadow-lg">
                            Continue <i class="fa fa-angle-right ml-2"></i>
                        </button>
                    </div>
                </form>

            </div>

        </div>
    </section>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const donationTypeBtns = document.querySelectorAll('input[name="memberShip"]');




            // Handle donation type selection
            donationTypeBtns.forEach(btn => {
                btn.addEventListener('change', function() {
                    const donationType = this.value;
                    const allTypeButtons = document.querySelectorAll('.donation-type-btn');

                    // Update button styles
                    allTypeButtons.forEach(typeBtn => {
                        if (typeBtn.dataset.type === donationType) {
                            typeBtn.classList.remove('bg-white', 'text-[#d53369]');
                            typeBtn.classList.add('bg-[#b30d00]', 'text-white');
                        } else {
                            typeBtn.classList.remove('bg-[#b30d00]', 'text-white');
                            typeBtn.classList.add('bg-white', 'text-[#d53369]');
                        }
                    });

                });
            });
        });
    </script>
    @endpush
</x-front.layout>