<div>
    <h2 class="text-lg font-bold mb-4 text-gray-800 border-b pb-2">Address</h2>
    <div class="grid lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-4">
        <div class="w-full">
            <div class="flex flex-col gap-1">
                <label for="postcode" class="font-semibold text-sm text-black">Post Code <span class="text-danger">*</span></label>
                <input type="text" id="postcode" name="postcode" value="{{ isset($member->postcode) ? $member->postcode : old('postcode') }}" placeholder="Enter code....." class="text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
            </div>
        </div>
        <div class="w-full">
            <div class="flex flex-col gap-1">
                <label for="address" class="font-semibold text-sm text-black">Address <span class="text-danger">*</span></label>
                <input type="text" id="address" name="address" value="{{ isset($member->address) ? $member->address : '' }}" placeholder="Enter address....." class="text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
            </div>
        </div>
        <div class="w-full">
            <div class="flex flex-col gap-1">
                <label for="country" class="font-semibold text-sm text-black">Country <span class="text-danger">*</span></label>
                <select id="country" name="country" class="text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
                    <option value="">Select country</option>
                    @foreach ($countries as $country)
                    <option value="{{$country->code}}">{{$country->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="w-full">
            <div class="flex flex-col gap-1">
                <label for="county" class="font-semibold text-sm text-black">County <span class="text-danger">*</span></label>
                <select id="county" name="county" class="text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
                    <option value="">Select county</option>
                </select>
            </div>
        </div>
        <div class="w-full">
            <div class="flex flex-col gap-1">
                <label for="city" class="font-semibold text-sm text-black">City <span class="text-danger">*</span></label>
                <input type="text" name="city" value="{{ isset($member->city) ? $member->city : '' }}" placeholder="Enter city....." class="text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
            </div>
        </div>
        <div class="w-full">
            <x-constituency />
        </div>
    </div>
</div>

<script>
    document.getElementById('country').addEventListener('change', function() {
        let countryCode = this.value;
        let countySelect = document.getElementById('county');

        countySelect.innerHTML = '<option value="">Select county</option>';

        if (countryCode) {
            fetch(`/counties/${countryCode}`)
                .then(response => response.json())
                .then(data => {
                    data.forEach(county => {
                        let option = document.createElement('option');
                        option.value = county.code;
                        option.textContent = county.name;
                        countySelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error fetching counties:', error));
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