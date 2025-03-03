<x-front.layout>
    @push('styles')
    <style>
        .gradient-bg {
            .gradient-bg {
                background: linear-gradient(to right, #d53369, #daae51);
            }

            .form-group label {
                color: #333;
                font-weight: 500;
                margin-bottom: 8px;
            }

            .form-control::placeholder {
                color: #999;
                opacity: 0.7;
            }
        }
    </style>
    @endpush


    <div class="about-us-section-area about-bg margin-bottom-60" style="background-image: url({{asset('assets/images/about-bg.png')}});">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="about-inner donation-single">
                        <h1 class="title" style="color:white">Address Information</h1>
                    </div>
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{{route('index')}}">Home</a></li>
                            <li><a href="{{route('joinUs')}}">Address Information</a></li>
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
                                <h6 class="subtitle">Fill your address information</h6>
                                <p class="description style-01">
                                    We need your address details to send you your membership card and other important updates. Ensure your information is accurate to stay connected with One Nation
                                </p>

                                @if(session('error'))
                                <div class="text-red-600 text-sm font-semibold mt-4" style="color: orangered; font-weight: 500">{{session('error')}}</div>
                                @endif @if(session('success'))
                                <div class="text-green-600 text-sm font-semibold mt-4" style="color: green; font-weight: 500">{{session('success')}}</div>
                                @endif
                            </div>
                        </div>
                        <div class="contact-form style-01">
                            <form action="{{route('storeMemberAddressInformation')}}" enctype="multipart/form-data" method="post" class="contact-page-form" novalidate="novalidate">
                                @csrf
                                <div class="row">
                                    <div class="col-md-9 col-12" id="searchAddress">

                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">House Name/Number <span class="text-danger">*</span></label>
                                            <input type="text" placeholder="Enter House Name/Number" name="house_name_number" id="house_name_number" value="{{old('house_name_number')}}" class="form-control" required="" aria-required="true" style="color: black; font-weight: 400;">
                                            @error('house_name_number')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">Street <span class="text-danger">*</span></label>
                                            <input type="text" name="street" placeholder="Enter Street Name" id="street" value="{{old('street')}}" class="form-control" required="" aria-required="true" style="color: black; font-weight: 400;">
                                            @error('street')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">Town/City <span class="text-danger">*</span></label>
                                            <input type="text" name="town_city" id="town_city" placeholder="Enter Town/City" value="{{old('town_city')}}" class="form-control" required="" aria-required="true" style="color: black; font-weight: 400;">
                                            @error('town_city')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">Country <span class="text-danger">*</span></label>
                                            <select name="country" id="region" class="form-control" required="" aria-required="true" style="color: black; font-weight: 400;">
                                                <option value="">Select Country</option>
                                                @foreach($countries as $country)
                                                  <option value="{{$country->name}}" {{$country->id===1?'selected':''}}>{{$country->name}}</option>

                                                @endforeach

                                            </select>
                                            @error('country')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">County <span class="text-danger">*</span></label>
                                            <input type="text" name="county_code" id="county" placeholder="Enter County" value="{{old('county')}}" class="form-control" required="" aria-required="true" style="color: black; font-weight: 400;">

                                            @error('county_code')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">Region </label>

                                            <select name="region_code" id="region" class="form-control" required="" aria-required="true" style="color: black; font-weight: 400;">
                                                <option value="">Select Region</option>
                                            </select>
                                            @error('region_code')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">Constituency <span class="text-danger">*</span></label>

                                            <select name="constituency_code" id="constituency" class="form-control" required="" aria-required="true" style="color: black; font-weight: 400;">
                                                <option value="">Select Constituency</option>
                                            </select>
                                            @error('constituency_code')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="">Post Code <span class="text-danger">*</span></label>
                                        <input type="text" placeholder="Enter House Name/Number" name="house_name_number" id="postal_code"  class="form-control" required="" aria-required="true" style="color: black; font-weight: 400;">
                                        @error('house_name_number')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                    </div>
                                    </div>
                                    <!-- <div class="col-md-6 col-12">
                                        <div class="form-group relative">
                                            <label for="">Constituency</label>

                                            <input type="text" name="constituency_code" id="constituency" value="{{ old('constituency_code') }}" value="{{old('national_insurance_number')}}" class="form-control" required="" aria-required="true">
                                            <div style="position: absolute; top: 90%; left: 0; width: 100%; height:max-content; z-index: 10;  padding: 0px 20px; border-radius: 4px;">
                                                <ul id="constituency-results" style="background-color: white; max-height: 200px; overflow-y: auto;"></ul>
                                            </div>
                                            @error('constituency_code')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                        </div>
                                    </div> -->

                                </div>
                                <div class="btn-wrapper" style="width: 100%; display: flex; justify-content: end">
                                    <button type="submit" class="boxed-btn btn-sanatory"> Save address information <span class="icon-paper-plan"></span></button>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('scripts')
    <script src="https://getaddress-cdn.azureedge.net/scripts/jquery.getAddress-3.0.1.min.js"></script>
    <script>
        $('#searchAddress').getAddress({
            api_key: 'uz1Ks6ukRke3TO_XZBrjeA22850',
            output_fields: {
                line_1: '#house_name_number',
                line_2: '#street',
                line_3: '#line3',
                post_town: '#town_city',
                county: '#county',
                postcode: '#postal_code'
            }
        });
    </script>
    @endpush
</x-front.layout>
