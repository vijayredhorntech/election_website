<div class="w-full">
    <label for="" class="text-gray-500 text-sm">Post Code <span class="text-danger">*</span></label>
    <div class="relative">
        <input type="text" name="postcode" placeholder="Enter Post Code" id="postcode" value="{{$data->postcode ?? old('postcode')}}" class="w-full bg-gray-100 rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black" required="" aria-required="true" style="text-transform: uppercase; color: black; font-weight: 400;">
        <button type="button" id="searchAddress" class="absolute right-0 top-0 h-full px-4 text-white font-semibold transition ease-in duration-200 cursor-pointer rounded-r-[3px]" style="background-color: rgb(247 44 91 / 0.7);">Find your Address</button>
    </div>
    @error('postcode')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
</div>

<div class="w-full" id="addressDropdownContainer" style="display: none;">
    <label for="addressSelect" class="text-gray-500 text-sm">Select Address</label>
    <select id="addressSelect" class="w-full bg-gray-100 rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700">
        <option value="">20 Harlech Gardens, Hounslow, Greater London</option>
    </select>
</div>

<div class="w-full">
    <label for="" class="text-gray-500 text-sm">House Name/Number <span class="text-danger">*</span></label>
    <input type="text" placeholder="Enter House Name/Number" name="house_name_number" id="house_name_number" value="{{$data->house_name_number ?? old('house_name_number')}}" class="w-full bg-gray-100 rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black" required="" aria-required="true">
    @error('house_name_number')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
</div>
<div class="w-full">
    <label for="" class="text-gray-500 text-sm">Street <span class="text-danger">*</span></label>
    <input type="text" name="street" placeholder="Enter Street Name" id="street" value="{{$data->street ?? old('street')}}" class="w-full bg-gray-100 rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black" required="" aria-required="true">
    @error('street')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
</div>
<div class="w-full">
    <label for="" class="text-gray-500 text-sm">Town/City <span class="text-danger">*</span></label>
    <input type="text" name="town_city" id="town_city" placeholder="Enter Town/City" value="{{$data->town_city ?? old('town_city')}}" class="w-full bg-gray-100 rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black" required="" aria-required="true">
    @error('town_city')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
</div>


<div class="w-full">
    <label for="" class="text-gray-500 text-sm">Country <span class="text-danger">*</span></label>

    <select name="country_code" id="country" class="w-full bg-gray-100 rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black" required="" aria-required="true">
        <option value="">Select Country</option>
    </select>
    @error('country_code')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
</div>

<div class="w-full">
    <label for="" class="text-gray-500 text-sm">County <span class="text-danger">*</span></label>

    <select name="county_code" id="county" class="w-full bg-gray-100 rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black" required="" aria-required="true">
        <option value="">Select County</option>
    </select>
    @error('county_code')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
</div>

<div class="w-full">
    <label for="" class="text-gray-500 text-sm">Region </label>

    <select name="region_code" id="region" class="w-full bg-gray-100 rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black" required="" aria-required="true">
        <option value="">Select Region</option>
    </select>
    @error('region_code')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
</div>
<div class="w-full">
    <label for="" class="text-gray-500 text-sm">Constituency <span class="text-danger">*</span></label>

    <select name="constituency_code" id="constituency" class="w-full bg-gray-100 rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black" required="" aria-required="true">
        <option value="">Select Constituency</option>
    </select>
    @error('constituency_code')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
</div>

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

        // Store the saved values from the $data variable
        const savedCountryCode = "{{ $data->country_code ?? old('country_code') }}";
        const savedCountyCode = "{{ $data->county_code ?? old('county_code') }}";
        const savedRegionCode = "{{ $data->region_code ?? old('region_code') }}";
        const savedConstituencyCode = "{{ $data->constituency_code ?? old('constituency_code') }}";

        // Load countries
        fetch("/countries")
            .then(response => response.json())
            .then(data => {
                data.forEach(country => {
                    let option = document.createElement("option");
                    option.value = country.code;
                    option.textContent = country.name;
                    // Set selected if matches saved country code
                    if (country.code === savedCountryCode) {
                        option.selected = true;
                    }
                    countrySelect.appendChild(option);
                });

                // Once countries are loaded, if we have a saved country, load the dependent dropdowns
                if (savedCountryCode) {
                    // Load the dependent dropdowns with the saved country
                    Promise.all([
                        updateCounties(savedCountryCode),
                        updateRegions(savedCountryCode),
                        updateConstituencies(savedCountryCode)
                    ]).then(() => {
                        // Now set the selected values for the dependent dropdowns
                        if (savedCountyCode) selectOptionByValue(countySelect, savedCountyCode);
                        if (savedRegionCode) selectOptionByValue(regionSelect, savedRegionCode);
                        if (savedConstituencyCode) selectOptionByValue(constituencySelect, savedConstituencyCode);
                    });
                }
            })
            .catch(error => console.error("Error fetching countries:", error));

        // Helper function to select option by value
        function selectOptionByValue(selectElement, value) {
            if (!value || !selectElement) return false;

            for (let i = 0; i < selectElement.options.length; i++) {
                if (selectElement.options[i].value === value) {
                    selectElement.selectedIndex = i;
                    return true;
                }
            }
            return false;
        }

        // Address search functionality
        document.getElementById('searchAddress').addEventListener('click', async function() {
            let postcode = document.getElementById('postcode').value.trim();
            if (!postcode) {
                alert('Please enter a postcode.');
                return;
            }

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

        // Country, county, region, constituency handlers
        // Modified version of the update functions to return Promises for better chaining
        // Convert update functions to async
        async function updateCounties(countryCode) {
            countySelect.innerHTML = '<option value="">Select County</option>';

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
            regionSelect.innerHTML = '<option value="">Select Region</option>';

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
            constituencySelect.innerHTML = '<option value="">Select Constituency</option>';

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