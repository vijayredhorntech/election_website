<!-- <div class="w-full"> -->
{{-- Postcode Input --}}
<div class="w-full">
    <label for="postcode" class="font-semibold text-sm text-black">
        Post Code <span class="text-danger">*</span>
    </label>
    <div class="flex gap-2">
        <input type="text" id="postcode" name="postcode" value="{{ old('postcode') }}"
            placeholder="Enter code....."
            class="text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 
                       placeholder-black text-black focus:outline-none focus:ring-0 
                       focus:border-primaryLight/80 transition ease-in duration-2000 w-full">
        <button type="button" id="searchAddress" class="px-4 py-1.5 bg-success text-green rounded-md">
            Search
        </button>
    </div>
</div>

{{-- Address Dropdown --}}
<div class="w-full hidden" id="addressDropdownContainer">
    <label for="addressSelect" class="font-semibold text-sm text-black">
        Select Address <span class="text-danger">*</span>
    </label>
    <select id="addressSelect" name="addressSelect"
        class="text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 
                   placeholder-black text-black focus:outline-none focus:ring-0 
                   focus:border-primaryLight/80 transition ease-in duration-2000 w-full">
    </select>
</div>

{{-- Auto-populated Address Fields --}}
<div class="w-full hidden">
    <label class="font-semibold text-sm text-black">Address Name/Number</label>
    <input type="text" id="addressName" name="addressName"
        class="w-full text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 
                      text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 
                      transition ease-in duration-2000" disabled>
</div>

<div class="w-full hidden">
    <label class="font-semibold text-sm text-black mt-2">Street</label>
    <input type="text" id="street" name="street"
        class="w-full text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 
                      text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 
                      transition ease-in duration-2000" disabled>
</div>

<div class="w-full hidden">
    <label class="font-semibold text-sm text-black mt-2">Town</label>
    <input type="text" id="town" name="town"
        class="w-full text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 
                      text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 
                      transition ease-in duration-2000" disabled>
</div>

{{-- Manual Edit Toggle --}}
<div class="mt-3 flex items-center gap-2 hidden">
    <input type="checkbox" id="manualEdit" name="manualEdit" class="w-4 h-4">
    <label for="manualEdit" class="text-sm text-black">Manually Edit Address</label>
</div>
<!-- </div> -->

<script>
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
            addressDropdown.innerHTML = ''; // Clear previous options

            addresses.forEach((entry, index) => {
                let option = document.createElement('option');
                let dpa = entry.DPA;
                option.value = index;
                option.textContent = `${dpa.ADDRESS}`;
                addressDropdown.appendChild(option);
            });

            document.getElementById('addressDropdownContainer').classList.remove('hidden');
            document.getElementById('manualEdit').classList.remove('hidden');
            // Auto-fill fields with the first result
            populateFields(addresses[0].DPA);
        } catch (error) {
            console.error('Error fetching addresses:', error);
        }
    });

    document.getElementById('addressSelect').addEventListener('change', function(event) {
        let selectedIndex = event.target.value;
        let postcode = document.getElementById('postcode').value.trim();

        fetch(`https://api.os.uk/search/places/v1/postcode?postcode=${postcode}&key=w5BpfTQcT8orZALfM9kvBzhP9FknhnZc`)
            .then(response => response.json())
            .then(data => {
                let selectedDPA = data.results[selectedIndex].DPA;
                populateFields(selectedDPA);
            })
            .catch(error => console.error('Error fetching address:', error));
    });

    document.getElementById('manualEdit').addEventListener('change', function(event) {
        let isManual = event.target.checked;
        document.getElementById('addressName').disabled = !isManual;
        document.getElementById('street').disabled = !isManual;
        document.getElementById('town').disabled = !isManual;
    });

    function populateFields(dpa) {
        document.getElementById('addressName').value = `${dpa.ORGANISATION_NAME || ''} ${dpa.BUILDING_NUMBER || ''}`.trim();
        document.getElementById('street').value = dpa.THOROUGHFARE_NAME || '';
        document.getElementById('town').value = dpa.POST_TOWN || '';
    }
</script>