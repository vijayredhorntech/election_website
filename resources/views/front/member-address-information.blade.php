<x-front.layout>
    @push('styles')
    <style>
        .gradient-bg {
            background: linear-gradient(to right, #d53369, #daae51);
        }
    </style>
    @endpush

    <section class="bg-gray-100 lg:py-40 md:py-24 sm:py-24 py-16 mt-24 px-4 bg-center bg-cover"
        style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url({{asset('assets/images/GettyImages-2157434514.jpg')}})">
        <div class="container lg:max-w-3xl  bg-white mx-auto  text-gray-800 rounded-[5px]">
            <div class="bg-white px-4 py-12 flex flex-col items-center text-center rounded-[5px] shadow-lg shadow-gray-800">
                <span class="text-black font-bold text-2xl">Fill your address information</span>
                <span class="text-gray-500 font-medium text-sm mt-2">
                    We need your address information to send you the membership card and other important information.
                </span>
                @if(session('error'))
                <div class="text-red-600 text-sm font-semibold mt-4">{{session('error')}}</div>
                @endif @if(session('success'))
                <div class="text-green-600 text-sm font-semibold mt-4">{{session('success')}}</div>
                @endif
                <form action="{{route('storeMemberAddressInformation')}}" enctype="multipart/form-data" method="POST" class="w-full mt-8 lg:px-8">
                    @csrf
                    <div class=" w-full flex flex-col items-start">
                        <div class="mt-4 w-full gap-4 grid lg:grid-cols-3 md:grid-cols-3 grid-cols-1">
                            <div class="flex flex-col items-start w-full gap-1 lg:col-span-2 md:col-span-2 col-span-1">
                                <label for="" class="text-gray-500 text-sm">Post Code</label>
                                <input type="text" name="postcode" id="postcode" value="{{old('postcode')}}" class="w-full bg-gray-100 rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black" placeholder="Post Code.....">
                                @error('postcode')<span class="text-red-600 text-sm font-semibold">{{$message}}</span>@enderror
                            </div>
                            <div class="flex flex-col items-start w-full gap-1">
                                <label for="" class="text-gray-500 text-sm">&nbsp;</label>
                                <button type="button" id="searchAddress" class="w-full text-center bg-red-500 px-4 py-3 rounded-[5px] text-white font-semibold hover:bg-red-700 transition ease-in duration-200 cursor-pointer">Search</button>
                            </div>
                            <!-- <div class="flex flex-col items-start w-full gap-1">
                                <label for="" class="text-gray-500 text-sm">City</label>
                                <input type="text" name="city" class="w-full bg-gray-100 rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black" placeholder="City.....">
                                @error('city')<span class="text-red-600 text-sm font-semibold">{{$message}}</span>@enderror
                            </div> -->
                        </div>

                        <div class="mt-4 flex flex-col items-start w-full gap-1">
                            <label for="" class="text-gray-500 text-sm">Address</label>
                            <select id="addressSelect" name=""
                                class="w-full bg-gray-100 rounded-[3px] border-[1px] px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black border-red-600">
                                <option value="">Select Address</option>
                            </select>
                            <input type="text" name="address" id="fillAddress" value="{{old('address')}}" class="hidden">
                            <!-- <input type="text" name="address" id="addrconess" value="{{old('address')}}" class="w-full bg-gray-100 rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black" placeholder="Address....."> -->
                            @error('address')<span class="text-red-600 text-sm font-semibold">{{$message}}</span>@enderror
                        </div>
                        <div class="mt-4 w-full gap-4 grid lg:grid-cols-3 md:grid-cols-3 grid-cols-1">
                            <div class="flex flex-col items-start w-full gap-1">
                                <label for="" class="text-gray-500 text-sm">House Name/Number</label>
                                <input type="text" name="house_name_number" id="house_name_number" value="{{old('house_name_number')}}" class="w-full bg-gray-100 rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black" placeholder="Enter your house name/number.....">
                                @error('house_name_number')<span class="text-red-600 text-sm font-semibold">{{$message}}</span>@enderror
                            </div>
                            <div class="flex flex-col items-start w-full gap-1">
                                <label for="" class="text-gray-500 text-sm">Street</label>
                                <input type="text" name="street" id="street" value="{{old('street')}}" class="w-full bg-gray-100 rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black" placeholder="Enter your street.....">
                                @error('street')<span class="text-red-600 text-sm font-semibold">{{$message}}</span>@enderror
                            </div>
                            <div class="flex flex-col items-start w-full gap-1">
                                <label for="" class="text-gray-500 text-sm">Town/City</label>
                                <input type="text" name="town_city" id="town_city" value="{{old('town_city')}}" class="w-full bg-gray-100 rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black" placeholder="Enter your town/city.....">
                                @error('town_city')<span class="text-red-600 text-sm font-semibold">{{$message}}</span>@enderror
                            </div>
                        </div>

                        <div class="mt-4 w-full gap-4 grid lg:grid-cols-3 md:grid-cols-3 grid-cols-1">
                            <div class="flex flex-col items-start w-full gap-1">
                                <label for="" class="text-gray-500 text-sm">Country</label>
                                <select name="country_id" id="country" class="w-full bg-gray-100 rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black">
                                    <option value="">Select Country</option>
                                </select>
                                @error('country_id')<span class="text-red-600 text-sm font-semibold">{{$message}}</span>@enderror
                            </div>
                            <div class="flex flex-col items-start w-full gap-1">
                                <label for="" class="text-gray-500 text-sm">County</label>
                                <select name="county_id" id="county" class="w-full bg-gray-100 rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black">
                                    <option value="">Select County</option>
                                </select>
                                @error('county_id')<span class="text-red-600 text-sm font-semibold">{{$message}}</span>@enderror
                            </div>
                            <div class="flex flex-col items-start w-full gap-1 relative">
                                <label for="" class="text-gray-500 text-sm">Constituency</label>
                                <input type="text" name="constituency_id" id="constituency" value="{{ old('constituency_id') }}" class="w-full bg-gray-100 rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-black">
                                <div>
                                    <ul id="constituency-results" class="absolute z-10 bg-white border border-gray-300 rounded-md mt-1 w-full hidden"></ul>
                                </div>
                                @error('constituency_id')<span class="text-red-600 text-sm font-semibold">{{$message}}</span>@enderror
                            </div>
                        </div>

                    </div>
                    <div class="w-full flex mt-8">
                        <button type="submit" class="w-full text-center bg-red-500 px-4 py-3 rounded-full text-white font-semibold hover:bg-red-700 transition ease-in duration-200 cursor-pointer"> Save and Continue <i class="fa fa-persson ml-2"></i></button>
                    </div>
                </form>

                <span class="text-gray-500 font-medium text-sm mt-2"> Read more about how we use your data in our <a
                        href="" class="text-red-600">privacy policy</a> here. You can unsubscribe at any time.</span>

                <div class="bg-gray-100 border-[1px] border-gray-200 px-4 py-8 mt-12 rounded-[10px] flex flex-col items-start gap-4 w-full">
                    <span class="font-semibold text-black text-xl">What is Membership?</span>
                    <a href="" class="text-red-600">Learn More <i class="fa fa-angle-right"></i> </a>
                </div>

            </div>

        </div>
    </section>

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