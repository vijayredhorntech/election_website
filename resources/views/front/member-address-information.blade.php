<x-front.layout>
    @push('styles')
    <style>
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
            #searchAddress input{
                padding: 15px 30px !important;
                border: 1px solid #7e7e7e !important;
                font-size: 16px !important;
                line-height: 21px !important;
                font-family: var(--body-font) !important;
                font-weight: 300 !important;
                border-radius: 10px !important;
            }
            #searchAddress select{
                padding: 15px 30px !important;
                border: 1px solid #7e7e7e !important;
                font-size: 16px !important;
                line-height: 21px !important;
                font-family: var(--body-font) !important;
                font-weight: 300 !important;
                border-radius: 10px !important;
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
                                    We need your address information to send you the membership card and other important information.
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
                                    <div class="col-md-6" id="searchAddress">

                                    </div>
                                    <div class="col-md-9 col-12">


                                    </div>
                                    <div class="col-md-3 col-12 " style="display: flex; align-items: center;">
                                        <div class="btn-wrapper">
                                            <button type="button" id="searchAddress" class="boxed-btn btn-sanatory"> Search <span class="icon-paper-plan"></span></button>
                                        </div>


                                    </div>
                                    <!-- <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">Address <span class="text-danger">*</span></label>

                                            <select class="form-control" id="addressSelect" name="address" style="color: black; font-weight: 400; width: 100%;">
                                                <option value="">Select Address</option>
                                            </select>
                                            <input type="text" name="address" id="fillAddress" value="{{old('address')}}" class="form-control" style="display: none; color: black; font-weight: 400;">
                                            @error('address')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                        </div>
                                    </div> -->

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">House Name/Number/ Street <span class="text-danger">*</span></label>
                                            <input type="text" placeholder="Enter House Name/Number" name="house_name_number" id="house_name_number" value="{{old('house_name_number')}}" class="form-control" required="" aria-required="true" style="color: black; font-weight: 400;">
                                            @error('house_name_number')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">Address Line 2 </label>
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

                                            <select name="country_code" id="country" class="form-control" required="" aria-required="true" style="color: black; font-weight: 400;">
                                                <option value="">Select Country</option>
                                            </select>
                                            @error('country_code')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">County <span class="text-danger">*</span></label>

                                            <select name="county_code" id="county" class="form-control" required="" aria-required="true" style="color: black; font-weight: 400;">
                                                <option value="">Select County</option>
                                            </select>
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
                                            <input type="text" name="postcode" placeholder="Enter Post Code" id="postal_code" value="{{old('postcode')}}" class="form-control" required="" aria-required="true" style="text-transform: uppercase; color: black; font-weight: 400;">
                                            @error('postcode')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
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
                document.addEventListener("DOMContentLoaded", function() {
                    // Initialize getAddress.io lookup
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

                    // Define elements
                    const countrySelect = document.getElementById("country");
                    const countySelect = document.getElementById("county");
                    const regionSelect = document.getElementById("region");
                    const constituencySelect = document.getElementById("constituency");
                    const houseNameNumber = document.getElementById("house_name_number");
                    const street = document.getElementById("street");
                    const townCity = document.getElementById("town_city");
                    const postcodeInput = document.getElementById("postcode");

                    // Load countries
                    fetch("/countries")
                        .then(response => response.json())
                        .then(data => {
                            data.forEach(country => {
                                let option = document.createElement("option");
                                option.value = country.code;
                                option.textContent = country.name;
                                countrySelect.appendChild(option);
                            });
                        })
                        .catch(error => console.error("Error fetching countries:", error));

                    // Function to update counties based on country selection
                    async function updateCounties(countryCode) {
                        countySelect.innerHTML = '<option value="">Select County</option>';

                        if (!countryCode) return;

                        try {
                            const response = await fetch(`/counties/${countryCode}`);
                            const data = await response.json();

                            data.forEach(county => {
                                let option = document.createElement("option");
                                option.value = county.code;
                                option.textContent = county.name;
                                countySelect.appendChild(option);
                            });
                        } catch (error) {
                            console.error("Error fetching counties:", error);
                        }
                    }

                    // Function to update regions based on country selection
                    async function updateRegions(countryCode) {
                        regionSelect.innerHTML = '<option value="">Select Region</option>';

                        if (!countryCode) return;

                        try {
                            const response = await fetch(`/regions/${countryCode}`);
                            const data = await response.json();

                            data.forEach(region => {
                                let option = document.createElement("option");
                                option.value = region.code;
                                option.textContent = region.name;
                                regionSelect.appendChild(option);
                            });
                        } catch (error) {
                            console.error("Error fetching regions:", error);
                        }
                    }

                    // Function to update constituencies based on country selection
                    async function updateConstituencies(countryCode) {
                        constituencySelect.innerHTML = '<option value="">Select Constituency</option>';

                        if (!countryCode) return;

                        try {
                            const response = await fetch(`/constituencies/${countryCode}`);
                            const data = await response.json();

                            data.forEach(constituency => {
                                let option = document.createElement("option");
                                option.value = constituency.code;
                                option.textContent = constituency.name;
                                constituencySelect.appendChild(option);
                            });
                        } catch (error) {
                            console.error("Error fetching constituencies:", error);
                        }
                    }

                    // Event listener for country selection
                    countrySelect.addEventListener('change', function() {
                        const countryCode = this.value;
                        updateCounties(countryCode);
                        updateRegions(countryCode);
                        updateConstituencies(countryCode);
                    });

                    // Postcode.io lookup functionality
                    if (searchAddressBtn) {
                        searchAddressBtn.addEventListener('click', async function() {
                            let postcode = postcodeInput.value.trim();
                            if (!postcode) {
                                alert('Please enter a postcode.');
                                return;
                            }

                            try {
                                const response = await fetch(`https://api.postcodes.io/postcodes/${encodeURIComponent(postcode)}`);
                                const data = await response.json();

                                if (data.status === 200 && data.result) {
                                    window.postcodeData = data.result;
                                    await populateLocationFields(data.result);
                                } else {
                                    alert('No data found for this postcode. You can enter your address manually.');
                                }
                            } catch (error) {
                                console.error('Error fetching postcode data:', error);
                                alert('Error fetching postcode data. Please try again.');
                            }
                        });
                    }

                    // Populate location fields from postcode data
                    async function populateLocationFields(postcodeData) {
                        if (townCity) {
                            townCity.value = postcodeData.admin_district || postcodeData.parish || '';
                        }

                        if (postcodeData.country && countrySelect) {
                            let countrySelected = false;
                            for (let i = 0; i < countrySelect.options.length; i++) {
                                if (countrySelect.options[i].textContent === postcodeData.country) {
                                    countrySelect.selectedIndex = i;
                                    countrySelected = true;
                                    break;
                                }
                            }

                            if (countrySelected) {
                                const countryCode = countrySelect.value;

                                // Update all dependent selects
                                await Promise.all([
                                    updateCounties(countryCode),
                                    updateRegions(countryCode),
                                    updateConstituencies(countryCode)
                                ]);

                                // Attempt to match appropriate values
                                if (postcodeData.admin_county && countySelect) {
                                    selectOptionByText(countySelect, postcodeData.admin_county);
                                }
                                if (postcodeData.region && regionSelect) {
                                    selectOptionByText(regionSelect, postcodeData.region);
                                }
                                if (postcodeData.parliamentary_constituency && constituencySelect) {
                                    selectOptionByText(constituencySelect, postcodeData.parliamentary_constituency);
                                }
                            }
                        }
                    }

                    // Helper function to select dropdown option by text
                    function selectOptionByText(selectElement, text) {
                        if (!text || !selectElement) return false;

                        // Direct match
                        for (let i = 0; i < selectElement.options.length; i++) {
                            if (selectElement.options[i].textContent === text) {
                                selectElement.selectedIndex = i;
                                return true;
                            }
                        }

                        // Case-insensitive match
                        for (let i = 0; i < selectElement.options.length; i++) {
                            if (selectElement.options[i].textContent.toLowerCase() === text.toLowerCase()) {
                                selectElement.selectedIndex = i;
                                return true;
                            }
                        }

                        // Partial match
                        for (let i = 0; i < selectElement.options.length; i++) {
                            if (selectElement.options[i].textContent.toLowerCase().includes(text.toLowerCase()) ||
                                text.toLowerCase().includes(selectElement.options[i].textContent.toLowerCase())) {
                                selectElement.selectedIndex = i;
                                return true;
                            }
                        }

                        console.log(`Could not find a match for "${text}" in ${selectElement.id}`);
                        return false;
                    }
                });
            </script>
        @endpush
</x-front.layout>
