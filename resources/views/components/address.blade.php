<div class="w-full">
    <label for="" class="text-gray-500 text-sm">Post Code <span class="text-danger">*</span></label>
    <input type="text" name="postcode" placeholder="Enter Post Code" id="postcode" value="{{old('postcode')}}" class="w-full bg-gray-100 rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black" required="" aria-required="true" style="text-transform: uppercase; color: black; font-weight: 400;">
    @error('postcode')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
</div>

<div class="w-full">
    <label for="" class="text-gray-500 text-sm">&nbsp;</label>
    <button type="button" id="searchAddress" class="w-full text-center px-4 py-3 rounded-[5px] text-white font-semibold transition ease-in duration-200 cursor-pointer" style="background-color: rgb(247 44 91 / 0.7);">Search</button>
</div>

<div class="w-full">
    <label for="" class="text-gray-500 text-sm">House Name/Number <span class="text-danger">*</span></label>
    <input type="text" placeholder="Enter House Name/Number" name="house_name_number" id="house_name_number" value="{{old('house_name_number')}}" class="w-full bg-gray-100 rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black" required="" aria-required="true">
    @error('house_name_number')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
</div>
<div class="w-full">
    <label for="" class="text-gray-500 text-sm">Street <span class="text-danger">*</span></label>
    <input type="text" name="street" placeholder="Enter Street Name" id="street" value="{{old('street')}}" class="w-full bg-gray-100 rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black" required="" aria-required="true">
    @error('street')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
</div>
<div class="w-full">
    <label for="" class="text-gray-500 text-sm">Town/City <span class="text-danger">*</span></label>
    <input type="text" name="town_city" id="town_city" placeholder="Enter Town/City" value="{{old('town_city')}}" class="w-full bg-gray-100 rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black" required="" aria-required="true">
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