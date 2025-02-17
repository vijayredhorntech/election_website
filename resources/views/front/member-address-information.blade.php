<x-front.layout>
    @push('styles')
    <style>
        .gradient-bg {
            background: linear-gradient(to right, #d53369, #daae51);
        }
    </style>
    @endpush


        <div class="about-us-section-area about-bg margin-bottom-60" style="background-image: url({{asset('assets/images/about-bg.png')}});">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="about-inner donation-single">
                            <h1 class="title">Address Information</h1>
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
                                        We need your address information to send you the membership card and other important information.
                                    </p>

                                    @if(session('error'))
                                        <div class="text-red-600 text-sm font-semibold mt-4">{{session('error')}}</div>
                                    @endif @if(session('success'))
                                        <div class="text-green-600 text-sm font-semibold mt-4">{{session('success')}}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="contact-form style-01">
                                <form action="{{route('storeMemberAddressInformation')}}" enctype="multipart/form-data" method="post" class="contact-page-form" novalidate="novalidate">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="">Post Code</label>
                                                <input type="text" name="postcode" id="postcode" value="{{old('postcode')}}" class="form-control" required="" aria-required="true">
                                                @error('postcode')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                            </div>
                                            <div class="flex flex-col items-start w-full gap-1">
                                                <label for="" class="text-gray-500 text-sm">&nbsp;</label>
                                                <button type="button" id="searchAddress" class="w-full text-center bg-red-500 px-4 py-3 rounded-[5px] text-white font-semibold hover:bg-red-700 transition ease-in duration-200 cursor-pointer">Search</button>
                                                @error('city')<span class="text-red-600 text-sm font-semibold">{{$message}}</span>@enderror

                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="">Address</label>

                                                <select class="form-control" id="addressSelect" name="">
                                                    <option value="">Select Address</option>
                                                </select>
                                                <input type="text" name="address" id="fillAddress" value="{{old('address')}}" class="hidden">
                                                @error('address')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="">House Name/Number</label>

                                                <input type="text" name="house_name_number" id="house_name_number" value="{{old('house_name_number')}}" class="form-control" required="" aria-required="true">
                                                @error('house_name_number')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="">Street</label>
                                                <input type="text" name="street" id="street" value="{{old('street')}}" class="form-control" required="" aria-required="true">
                                                @error('street')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="">Town/City</label>
                                                <input type="text" name="town_city" id="town_city" value="{{old('town_city')}}" class="form-control" required="" aria-required="true">
                                                @error('town_city')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="">Country</label>

                                                <select name="country_id" id="country" class="form-control" required="" aria-required="true">
                                                    <option value="">Select Country</option>
                                                </select>
                                                @error('country_id')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="">County</label>

                                                <select name="county_id" id="county" class="form-control" required="" aria-required="true">
                                                    <option value="">Select Country</option>
                                                </select>
                                                @error('county_id')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                            </div>
                                        </div>


                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="">Constituency</label>

                                                <input type="text" name="constituency_id" id="constituency" value="{{ old('constituency_id') }}" value="{{old('national_insurance_number')}}" class="form-control" required="" aria-required="true">
                                                <div>
                                                    <ul id="constituency-results" class="absolute z-10 bg-white border border-gray-300 rounded-md mt-1 w-full hidden"></ul>
                                                </div>
                                                @error('constituency_id')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="">Primary Mobile Number</label>

                                                <input type="number" name="primary_mobile_number" placeholder="Primary mobile number" value="{{old('primary_mobile_number')}}" class="form-control" required="" aria-required="true">
                                                @error('primary_mobile_number')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="">ALternate Mobile Number</label>

                                                <input type="number" name="alternate_mobile_number" placeholder="Alternate mobile number" value="{{old('alternate_mobile_number')}}" class="form-control" required="" aria-required="true">
                                                @error('alternate_mobile_number')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-wrapper" style="width: 100%; display: flex; justify-content: end">
                                        <button type="submit" class="boxed-btn btn-sanatory"> Save basic informations  <span class="icon-paper-plan"></span></button>
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
        document.getElementById('constituency').addEventListener('input', function() {
            let constituencyName = this.value.trim();
            let resultsContainer = document.getElementById('constituency-results');

            if (constituencyName.length < 2) { // Avoid unnecessary API calls for short inputs
                resultsContainer.innerHTML = '';
                resultsContainer.classList.add('hidden');
                return;
            }

            fetch(`/constituencies/${constituencyName}`)
                .then(response => response.json())
                .then(data => {
                    resultsContainer.innerHTML = '';
                    if (data.length > 0) {
                        resultsContainer.classList.remove('hidden');
                        data.forEach(constituency => {
                            let div = document.createElement('div');
                            div.classList.add('py-2', 'cursor-pointer', 'text-sm', 'hover:bg-gray-100', 'border-b-[1px]', 'border-b-gray-200');
                            div.textContent = `${constituency.name} (${constituency.code})`;
                            div.addEventListener('click', function() {
                                document.getElementById('constituency').value = constituency.name;
                                resultsContainer.classList.add('hidden');
                            });
                            resultsContainer.appendChild(div);
                        });
                    } else {
                        resultsContainer.classList.add('hidden');
                    }
                })
                .catch(error => {
                    console.error('Error fetching constituencies:', error);
                    resultsContainer.classList.add('hidden');
                });
        });
        document.addEventListener("DOMContentLoaded", function() {
            const countrySelect = document.getElementById("country");

            fetch("/countries")
                .then(response => response.json())
                .then(data => {
                    data.forEach(country => {
                        let option = document.createElement("option");
                        option.value = country.code; // Use 'code' as value
                        option.textContent = country.name; // Use 'name' as display text
                        countrySelect.appendChild(option);
                    });
                })
                .catch(error => console.error("Error fetching countries:", error));
        });
        document.getElementById('searchAddress').addEventListener('click', async function() {
            let postcode = document.getElementById('postcode').value.trim();
            if (!postcode) {
                alert('Please enter a postcode.');
                return;
            }

            let apiUrl = `https://api.os.uk/search/places/v1/postcode?postcode=${postcode}&key=w5BpfTQcT8orZALfM9kvBzhP9FknhnZc`;

            try {
                let response = await fetch(apiUrl);
                let data = await response.json();
                let addresses = data.results;

                if (addresses.length === 0) {
                    alert('No addresses found for this postcode.');
                    return;
                }

                let addressDropdown = document.getElementById('addressSelect');
                let houseNameNumber = document.getElementById('house_name_number');
                let street = document.getElementById('street');
                let townCity = document.getElementById('town_city');
                // addressDropdown.innerHTML = ''; // Clear previous options

                addresses.forEach((entry, index) => {
                    let option = document.createElement('option');
                    let dpa = entry.DPA;
                    option.value = index;
                    option.textContent = `${dpa.ADDRESS}`;
                    addressDropdown.appendChild(option);
                });
                addressDropdown.onchange = function() {
                    let selectedIndex = this.value;
                    fillAddress.value = addresses[selectedIndex].DPA.ADDRESS;
                    let selectedAddress = addresses[selectedIndex];
                    houseNameNumber.value = selectedAddress.DPA.ORGANISATION_NAME + ', ' + selectedAddress.DPA.BUILDING_NUMBER;
                    street.value = selectedAddress.DPA.THOROUGHFARE_NAME;
                    townCity.value = selectedAddress.DPA.POST_TOWN;
                }
                // document.getElementById('addressDropdownContainer').classList.remove('hidden');
                // document.getElementById('manualEdit').classList.remove('hidden');
                // Auto-fill fields with the first result
                // populateFields(addresses[0].DPA);
            } catch (error) {
                console.error('Error fetching addresses:', error);
            }
        });

        const countrySelect = document.getElementById('country');
        const countySelect = document.getElementById('county');

        function updateCounties(countryCode, selectedCountyCode = null) {
            console.log(countryCode);
            countySelect.innerHTML = '<option value="">Select county</option>';

            if (countryCode) {
                fetch(`/counties/${countryCode}`) // Fetch counties based on selected country
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(county => {
                            let option = document.createElement('option');
                            option.value = county.code;
                            option.textContent = county.name;
                            if (selectedCountyCode && county.code === selectedCountyCode) {
                                option.selected = true;
                            }
                            countySelect.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error fetching counties:', error));
            }
        }
        countrySelect.addEventListener('change', function() {
            updateCounties(this.value);
        });
    </script>
    @endpush
</x-front.layout>
