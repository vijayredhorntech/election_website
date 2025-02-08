<div class="relative flex flex-col gap-1">
    <label for="title" class="font-semibold text-sm text-black">
        Title <span class="text-danger">*</span>
    </label>

    <input
        type="text"
        id="title"
        name="title"
        value="{{ $title }}"
        placeholder="Enter title..."
        class="text-sm px-4 py-1.5 rounded-[3px] border border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-200">

    <!-- Suggestions List -->
    <div>
        <ul id="title-results" class="absolute z-10 bg-white border border-gray-300 rounded-md mt-1 w-full hidden"></ul>
    </div>
</div>
<script>
    document.getElementById('title').addEventListener('input', function() {
        let titleName = this.value.trim();
        let resultsContainer = document.getElementById('title-results');

        if (titleName.length < 2) { // Avoid unnecessary API calls for short inputs
            resultsContainer.innerHTML = '';
            resultsContainer.classList.add('hidden');
            return;
        }

        fetch(`/titles/${titleName}`)
            .then(response => response.json())
            .then(data => {
                resultsContainer.innerHTML = '';
                if (data.length > 0) {
                    resultsContainer.classList.remove('hidden');
                    data.forEach(title => {
                        let div = document.createElement('div');
                        div.classList.add('px-4', 'py-2', 'cursor-pointer', 'hover:bg-gray-100');
                        div.textContent = `${title.name}`;
                        div.addEventListener('click', function() {
                            document.getElementById('title').value = title.name;
                            resultsContainer.classList.add('hidden');
                        });
                        resultsContainer.appendChild(div);
                    });
                } else {
                    resultsContainer.classList.add('hidden');
                }
            })
            .catch(error => {
                console.error('Error fetching titles:', error);
                resultsContainer.classList.add('hidden');
            });
    });
</script>