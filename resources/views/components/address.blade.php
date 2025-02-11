<div class="w-full">
    <div class="flex flex-col gap-1">
        <label for="postcode" class="font-semibold text-sm text-black">Post Code <span class="text-danger">*</span></label>
        <input type="text" id="postcode" name="postcode" value="{{ $data->postcode ?? old('postcode') }}" placeholder="Enter code....." class="text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
    </div>
</div>
<div class="w-full">
    <div class="flex flex-col gap-1">
        <label for="address" class="font-semibold text-sm text-black">Address <span class="text-danger">*</span></label>
        <select id="address" name="address"
            class="text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
            <option value="">Select address</option>
        </select>
    </div>
</div>
<div class="w-full">
    <div class="flex flex-col gap-1">
        <label for="street" class="font-semibold text-sm text-black">Street <span class="text-danger">*</span></label>
        <input type="text" id="street" name="street" value="{{ $data->street ?? old('street') }}" placeholder="Enter street....." class="text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
    </div>
</div>
<div class="w-full">
    <div class="flex flex-col gap-1">
        <label for="city" class="font-semibold text-sm text-black">Town <span class="text-danger">*</span></label>
        <input type="text" name="city" value="{{ $data->city ?? old('city') }}" placeholder="Enter city....." class="text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
    </div>
</div>
<div class="w-full">
    <div class="flex flex-col gap-1">
        <label for="country" class="font-semibold text-sm text-black">Country <span class="text-danger">*</span></label>
        <select id="country" name="country"
            class="text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
            <option value="">Select country</option>
            @foreach ($countries as $country)
            <option value="{{ $country->code }}"
                {{ isset($data->country) && $data->country->code === $country->code ? 'selected' : '' }}>
                {{ $country->name }}
            </option>
            @endforeach
        </select>
    </div>
</div>

<div class="w-full">
    <div class="flex flex-col gap-1">
        <label for="county" class="font-semibold text-sm text-black">County <span class="text-danger">*</span></label>
        <select id="county" name="county"
            class="text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
            <option value="">Select county</option>
        </select>
    </div>
</div>
<div class="w-full">
    <x-constituency :data="$data->constituency ?? null" />
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const postcodeInput = document.getElementById('postcode');
        const addressSelect = document.getElementById('address');
        const streetInput = document.getElementById('street');
        const cityInput = document.getElementsByName('city')[0]; // Assuming there's one city input field
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

        postcodeInput.addEventListener('blur', function() {
            let postcode = this.value.trim();

            if (!postcode) return;

            fetch(`https://api.os.uk/search/places/v1/postcode?postcode=${postcode}&key=w5BpfTQcT8orZALfM9kvBzhP9FknhnZc`)
                .then(response => response.json())
                .then(data => {
                    addressSelect.innerHTML = '<option value="">Select address</option>';

                    if (data.results) {
                        data.results.forEach(result => {
                            const dpa = result.DPA;
                            console.log(dpa);
                            let option = document.createElement('option');
                            option.value = dpa.ADDRESS;
                            option.textContent = dpa.ADDRESS;
                            addressSelect.appendChild(option);
                        });
                    }
                })
                .catch(error => console.error('Error fetching address:', error));
        });

        addressSelect.addEventListener('change', function() {
            let selectedData = this.value ? JSON.parse(this.value) : null;

            if (selectedData) {
                streetInput.value = selectedData.THOROUGHFARE_NAME || '';
                cityInput.value = selectedData.POST_TOWN || '';

                // Auto-select country from the database
                let countryCode = selectedData.COUNTRY_CODE || '';
                if (countryCode) {
                    for (let option of countrySelect.options) {
                        if (option.value === countryCode) {
                            option.selected = true;
                            updateCounties(countryCode); // Update counties dropdown based on country
                            break;
                        }
                    }
                }
            }
        });

        // Listen for changes in country dropdown
        countrySelect.addEventListener('change', function() {
            updateCounties(this.value);
        });

        // Prepopulate county dropdown if editing an existing entry
        let preselectedCountry = countrySelect.value;
        let preselectedCounty = "{{ $data->county->code ?? '' }}";

        if (preselectedCountry) {
            updateCounties(preselectedCountry, preselectedCounty);
        }
    });
</script>