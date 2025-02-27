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
                                    <div class="col-md-9 col-12">
                                        <div class="form-group">
                                            <label for="">Post Code <span class="text-danger">*</span></label>
                                            <input type="text" name="postcode" placeholder="Enter Post Code" id="postcode" value="{{old('postcode')}}" class="form-control" required="" aria-required="true" style="text-transform: uppercase; color: black; font-weight: 400;">
                                            @error('postcode')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                        </div>


                                    </div>
                                    <div class="col-md-3 col-12 " style="display: flex; align-items: center;">
                                        <div class="btn-wrapper">
                                            <button type="button" id="searchAddress" class="boxed-btn btn-sanatory"> Search <span class="icon-paper-plan"></span></button>
                                        </div>


                                    </div>
                                    <!-- <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">Address <span class="text-danger">*</span></label>

                                            <select class="form-control" id="addressSelect" name="" style="color: black; font-weight: 400;">
                                                <option value="">Select Address</option>
                                            </select>
                                            <input type="text" name="address" id="fillAddress" value="{{old('address')}}" class="hidden" style="display: none; color: black; font-weight: 400;">
                                            @error('address')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                        </div>
                                    </div> -->

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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const countrySelect = document.getElementById("country");
            // const addressSelect = document.getElementById("addressSelect");
            const fillAddress = document.getElementById("fillAddress");
            const houseNameNumber = document.getElementById("house_name_number");
            const street = document.getElementById("street");
            const townCity = document.getElementById("town_city");
            const regionSelect = document.getElementById("region");
            const constituencySelect = document.getElementById("constituency");
            const countySelect = document.getElementById("county");

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

            // Address search functionality
            document.getElementById('searchAddress').addEventListener('click', async function() {
                let postcode = document.getElementById('postcode').value.trim();
                if (!postcode) {
                    alert('Please enter a postcode.');
                    return;
                }

                // Clear previous options
                // addressSelect.innerHTML = '<option value="">Select Address</option>';

                // Using postcode.io API
                let apiUrl = `https://api.postcodes.io/postcodes/${postcode}`;

                try {
                    let response = await fetch(apiUrl);
                    let data = await response.json();

                    if (data.status === 200 && data.result) {
                        // Store API result for later use with address selection
                        window.postcodeData = data.result;

                        // Auto-populate fields from API response
                        populateLocationFields(data.result);

                        // For addresses at this postcode, we'd need a different approach
                        // Postcodes.io doesn't provide individual addresses
                        // Let's fetch addresses list from a hypothetical endpoint in your system
                        // try {
                        //     // This would be your own endpoint that provides addresses for a postcode
                        //     // If you don't have such an endpoint, we'll enable manual entry
                        //     let addressResponse = await fetch(`/api/addresses/${postcode}`);

                        //     if (addressResponse.ok) {
                        //         let addressData = await addressResponse.json();

                        //         // Show addresses if available
                        //         addressData.forEach((address, index) => {
                        //             let option = document.createElement('option');
                        //             option.value = index;
                        //             option.textContent = address.full_address;
                        //             addressSelect.appendChild(option);
                        //         });

                        //         // Show the address select dropdown
                        //         addressSelect.style.display = "block";
                        //         fillAddress.style.display = "none";
                        //     } else {
                        //         // No specific address lookup available, enable manual entry
                        //         // But we've already populated location data from postcode
                        //         enableManualAddressEntry();
                        //     }
                        // } catch (error) {
                        //     // Error or no endpoint available
                        //     console.log('No address lookup available, using manual entry');
                        //     enableManualAddressEntry();
                        // }
                    } else {
                        // Postcode not found
                        alert('No data found for this postcode. You can enter your address manually.');
                        enableManualAddressEntry();
                    }
                } catch (error) {
                    console.error('Error fetching postcode data:', error);
                    enableManualAddressEntry();
                }
            });

            // Populate location fields from postcode data
            // Main population function using async/await
            async function populateLocationFields(postcodeData) {
                // Set town/city from admin_district or parish
                townCity.value = postcodeData.admin_district || postcodeData.parish || '';

                // Auto-select country
                if (postcodeData.country) {
                    let countrySelected = false;

                    // Find and select the country option
                    for (let i = 0; i < countrySelect.options.length; i++) {
                        if (countrySelect.options[i].textContent === postcodeData.country) {
                            countrySelect.selectedIndex = i;
                            countrySelected = true;
                            break;
                        }
                    }

                    if (countrySelected) {
                        // Use the country code value
                        const countryCode = countrySelect.value;

                        // Wait for each dropdown to be populated before trying to select an option
                        // First populate counties
                        await updateCounties(countryCode);
                        // console.log("Counties loaded");

                        // Try to select county
                        // console.log(postcodeData.admin_county);
                        if (postcodeData.admin_county) {
                            const countyFound = selectOptionByText(countySelect, postcodeData.admin_county);
                            // console.log("County selection attempt:", postcodeData.admin_county, countyFound);
                        }

                        // Then populate regions
                        await updateRegions(countryCode);
                        // console.log("Regions loaded");

                        // Try to select region
                        if (postcodeData.region) {
                            const regionFound = selectOptionByText(regionSelect, postcodeData.region);
                            // console.log("Region selection attempt:", postcodeData.region, regionFound);
                        }

                        // Finally populate constituencies
                        await updateConstituencies(countryCode);
                        // console.log("Constituencies loaded");

                        // Try to select constituency
                        if (postcodeData.parliamentary_constituency) {
                            const constituencyFound = selectOptionByText(constituencySelect, postcodeData.parliamentary_constituency);
                            // console.log("Constituency selection attempt:", postcodeData.parliamentary_constituency, constituencyFound);
                        }
                    }
                }
            }

            // Helper function to select dropdown option by text
            // Improved helper function to select option by text
            // Improved helper function to select option by text with debugging
            function selectOptionByText(selectElement, text) {
                if (!text || !selectElement) return false;

                // For debugging: what options are available?
                // console.log(`Options in ${selectElement.id}:`, Array.from(selectElement.options).map(o => o.textContent));

                // First try exact match
                for (let i = 0; i < selectElement.options.length; i++) {
                    if (selectElement.options[i].textContent === text) {
                        selectElement.selectedIndex = i;
                        return true;
                    }
                }

                // If no exact match, try case-insensitive match
                for (let i = 0; i < selectElement.options.length; i++) {
                    if (selectElement.options[i].textContent.toLowerCase() === text.toLowerCase()) {
                        selectElement.selectedIndex = i;
                        return true;
                    }
                }

                // If still no match, try to find a partial match
                for (let i = 0; i < selectElement.options.length; i++) {
                    if (selectElement.options[i].textContent.toLowerCase().includes(text.toLowerCase()) ||
                        text.toLowerCase().includes(selectElement.options[i].textContent.toLowerCase())) {
                        selectElement.selectedIndex = i;
                        return true;
                    }
                }

                // Added console.log for debugging
                console.log(`Could not find a match for "${text}" in ${selectElement.id}`);
                return false;
            }

            // Handle address selection
            // addressSelect.addEventListener('change', function() {
            //     if (this.value !== "") {
            //         // When an address is selected from your system's API
            //         // You would populate address-specific fields here
            //         fillAddress.value = this.options[this.selectedIndex].textContent;

            //         // In a real implementation, you'd have more address details
            //         // like house number and street name from your backend
            //     }
            // });

            // Function to enable manual address entry
            // function enableManualAddressEntry() {
            //     // Hide the dropdown and show the text field
            //     // addressSelect.style.display = "none";
            //     fillAddress.style.display = "block";

            //     // Add a helper message
            //     fillAddress.placeholder = "Enter your full address manually";
            // }

            // Add a "Enter manually" button
            // const addressFieldContainer = addressSelect.parentElement;
            // const manualEntryBtn = document.createElement("button");
            // manualEntryBtn.type = "button";
            // manualEntryBtn.className = "boxed-btn btn-sanatory mt-2";
            // manualEntryBtn.style.cssText = "padding: 5px 10px; font-size: 14px;";
            // manualEntryBtn.textContent = "Enter address manually";
            // manualEntryBtn.addEventListener("click", enableManualAddressEntry);
            // addressFieldContainer.appendChild(manualEntryBtn);

            // Country, county, region, constituency handlers
            // Modified version of the update functions to return Promises for better chaining
            // Convert update functions to async
            async function updateCounties(countryCode) {
                countySelect.innerHTML = '<option value="">Select county</option>';

                if (!countryCode) return;

                try {
                    const response = await fetch(`/counties/${countryCode}`);
                    const data = await response.json();

                    data.forEach(county => {
                        let option = document.createElement('option');
                        option.value = county.code;
                        option.textContent = county.name;
                        countySelect.appendChild(option);
                    });
                } catch (error) {
                    console.error('Error fetching counties:', error);
                }
            }

            async function updateRegions(countryCode) {
                regionSelect.innerHTML = '<option value="">Select region</option>';

                if (!countryCode) return;

                try {
                    const response = await fetch(`/regions/${countryCode}`);
                    const data = await response.json();

                    data.forEach(region => {
                        let option = document.createElement('option');
                        option.value = region.code;
                        option.textContent = region.name;
                        regionSelect.appendChild(option);
                    });
                } catch (error) {
                    console.error('Error fetching regions:', error);
                }
            }

            async function updateConstituencies(countryCode) {
                constituencySelect.innerHTML = '<option value="">Select constituency</option>';

                if (!countryCode) return;

                try {
                    const response = await fetch(`/constituencies/${countryCode}`);
                    const data = await response.json();

                    data.forEach(constituency => {
                        let option = document.createElement('option');
                        option.value = constituency.code;
                        option.textContent = constituency.name;
                        constituencySelect.appendChild(option);
                    });
                } catch (error) {
                    console.error('Error fetching constituencies:', error);
                }
            }

            countrySelect.addEventListener('change', function() {
                updateCounties(this.value);
                updateRegions(this.value);
                updateConstituencies(this.value);
            });
        });
    </script>
    @endpush
</x-front.layout>