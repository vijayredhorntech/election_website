<div class="w-full">
    <div class="flex flex-col gap-1">
        <label for="postcode" class="font-semibold text-sm text-black">Post Code <span class="text-danger">*</span></label>
        <input type="text" id="postcode" name="postcode" value="{{ $data->postcode ?? old('postcode') }}" placeholder="Enter code....." class="text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
    </div>
</div>
<div class="w-full">
    <div class="flex flex-col gap-1">
        <label for="address" class="font-semibold text-sm text-black">Address <span class="text-danger">*</span></label>
        <input type="text" id="address" name="address" value="{{ $data->address ?? old('address') }}" placeholder="Enter address....." class="text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
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
    <div class="flex flex-col gap-1">
        <label for="city" class="font-semibold text-sm text-black">City <span class="text-danger">*</span></label>
        <input type="text" name="city" value="{{ $data->city ?? old('city') }}" placeholder="Enter city....." class="text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
    </div>
</div>
<div class="w-full">
    <x-constituency :data="$data->constituency ?? null" />
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        let countrySelect = document.getElementById('country');
        let countySelect = document.getElementById('county');

        function updateCounties(countryCode, selectedCountyCode = null) {
            countySelect.innerHTML = '<option value="">Select county</option>';

            if (countryCode) {
                fetch(`/counties/${countryCode}`)
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


    document.getElementById('postcode').addEventListener('blur', function() {
        let postcode = this.value;
        let addressField = document.getElementById('address');


        if (postcode) {
            fetch(`https://api.postcodes.io/postcodes/${postcode}`)
                .then(response => response.json())
                .then(data => {
                    if (data.status === 200) {
                        let result = data.result;
                        let address = `${result.parliamentary_constituency}, ${result.admin_district}, ${result.region}, ${result.country}`;
                        addressField.value = address;
                    } else {
                        addressField.placeholder = 'Invalid postcode enter manually';
                    }
                })
                .catch(error => console.error('Error fetching address:', error));
        }
    });
</script>