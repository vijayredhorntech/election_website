<div class="flex flex-col gap-1 relative">
    <label for="constituency" class="font-semibold text-sm text-black">Constituency <span class="text-danger">*</span></label>
    <input type="text" id="constituency" name="constituency" value="{{ $data->name ?? old('constituency') }}" placeholder="Enter constituency..." class="text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-200">
    <div>
        <ul id="constituency-results" class="absolute z-10 bg-white border border-gray-300 rounded-md mt-1 w-full hidden"></ul>
    </div>
</div>

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
                        div.classList.add('px-4', 'py-2', 'cursor-pointer', 'hover:bg-gray-100');
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
</script>