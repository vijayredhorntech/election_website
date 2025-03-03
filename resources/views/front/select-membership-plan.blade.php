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

    <div class="about-us-section-area about-bg margin-bottom-60" style="background-image: url({{asset('assets/images/about-bg.png')}});">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="about-inner donation-single">
                        <h1 class="title" style="color:white">Membership Plans</h1>
                    </div>
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{{route('index')}}">Home</a></li>
                            <li><a href="{{route('joinUs')}}">Plans</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="donation-content-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="volunteer-form style-01">
                        <div class="donate-programm">
                            <div class="content">
                                <h6 class="subtitle">Your Support Empower One Nation </h6>
                                <p class="description style-01">
                                    Your generous support empowers One Nation to strengthen communities, drive change, and build a brighter future for Great Britain.
                                </p>

                                @if(session('error'))
                                <div class="text-red-600 text-sm font-semibold mt-4">{{session('error')}}</div>
                                @endif @if(session('success'))
                                <div class="text-green-600 text-sm font-semibold mt-4">{{session('success')}}</div>
                                @endif
                            </div>
                        </div>
                        <div class="contact-form style-01">
                            <form action="{{route('paymentGateway',['email'=>$email,'id'=>1])}}" method="post" class="contact-page-form" novalidate="novalidate">
                                @csrf
                                <h6 class="title"> Membership plan</h6>

                                @php
                                $memberShipPlans = [
                                [
                                'id' => '1',
                                'amount' => '3',
                                ],
                                ];
                                @endphp

                                @foreach($memberShipPlans as $plan)
                                <div class="row">
                                    <div class="form-question" style="padding-left: 20px">
                                        <div class="check-box-wrapper">
                                            <div class="check-box">
                                                <label class="container-box">
                                                    £ {{$plan['amount']}}/ MO
                                                    <input type="radio" value="{{$plan['id']}}" name="memberShip" {{$loop->iteration===1?'checked':''}}>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach


                                <div class="btn-wrapper" style="width: 100%; display: flex; justify-content: end">
                                    <button type="submit" class="boxed-btn btn-sanatory"> Continue <span class="icon-paper-plan"></span></button>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>









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
