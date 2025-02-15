<x-front.layout>
    @push('styles')
    <style>
        .gradient-bg {
            background: linear-gradient(to right, #d53369, #daae51);
        }
    </style>
    @endpush

    <section class="bg-gray-100 py-8 mt-24">
        <div class="container mx-auto px-2 pt-4 pb-12 text-gray-800">
            <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                Secure Donation
            </h1>
            <div class="w-full mb-4">
                <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>


            <div class="flex flex-wrap lg:flex-row flex-col-reverse">
                <div class="w-full lg:w-1/2 p-6">
                    <h3 class="text-3xl text-gray-800 font-bold leading-none mb-3">
                        Help build One Nation's campaign fund
                    </h3>

                    <img class="rounded-md py-6 w-full h-auto " src="{{asset('assets/images/GettyImages-2157434514.jpg')}}" alt="">
                    <p class="text-gray-600 mb-4">
                        Copyright One Nation Party. All rights reserved.
                    </p>

                    <p class="text-gray-600 mb-8">
                        <a href="" class="underline">Privacy Policy</a> &nbsp <a href="" class="underline"> Terms &
                            Conditions</a>
                    </p>
                </div>
                <div class="w-full lg:w-1/2 lgp-20 md:p-20 p-6">
                    <div class="bg-white p-6 rounded-md">
                        <form action="#" method="POST" class="space-y-4">
                            <!-- First Name -->
                            <div>
                                <label for="firstName" class="block text-[#d53369] font-medium">First Name</label>
                                <input type="text" id="firstName" name="firstName" required
                                    class="w-full px-4 py-3 rounded-lg border-2 border-[#d53369] focus:border-[#daae51] focus:outline-none text-[#d53369] placeholder-[#d53369]/50"
                                    placeholder="Enter First Name">
                            </div>

                            <!-- Last Name -->
                            <div>
                                <label for="lastName" class="block text-[#d53369] font-medium">Last Name</label>
                                <input type="text" id="lastName" name="lastName" required
                                    class="w-full px-4 py-3 rounded-lg border-2 border-[#d53369] focus:border-[#daae51] focus:outline-none text-[#d53369] placeholder-[#d53369]/50"
                                    placeholder="Enter Last Name">
                            </div>

                            <!-- Email ID -->
                            <div>
                                <label for="email" class="block text-[#d53369] font-medium">Email ID</label>
                                <input type="email" id="email" name="email" required
                                    class="w-full px-4 py-3 rounded-lg border-2 border-[#d53369] focus:border-[#daae51] focus:outline-none text-[#d53369] placeholder-[#d53369]/50"
                                    placeholder="Enter Email ID">
                            </div>

                            <!-- Phone Number -->
                            <div>
                                <label for="phone" class="block text-[#d53369] font-medium">Phone Number</label>
                                <input type="tel" id="phone" name="phone" required
                                    class="w-full px-4 py-3 rounded-lg border-2 border-[#d53369] focus:border-[#daae51] focus:outline-none text-[#d53369] placeholder-[#d53369]/50"
                                    placeholder="Enter Phone Number">
                            </div>
                            <div class="flex flex-col gap-1 relative">
                                <label for="constituency" class="block text-[#d53369] font-medium">Constituency</label>
                                <input type="text" id="constituency" name="constituency" placeholder="Enter constituency..." class="w-full px-4 py-3 rounded-lg border-2 border-[#d53369] focus:border-[#daae51] focus:outline-none text-[#d53369] placeholder-[#d53369]/50">
                                <div>
                                    <ul id="constituency-results" class="absolute z-10 bg-white border border-gray-300 rounded-md mt-1 w-full hidden"></ul>
                                </div>
                            </div>
                            <!-- Terms and Conditions -->
                            <div class="flex items-center">
                                <input type="checkbox" id="terms" name="terms" required class="w-5 h-5 text-[#d53369] border-2 border-[#d53369] rounded-md">
                                <label for="terms" class="ml-2 text-[#d53369]">I accept the Terms and Conditions</label>
                            </div>

                            <!-- Submit Button -->
                            <div class="w-full flex justify-end">
                                <a href="{{route('paymentMethod')}}" id="donateBtn" class="w-full text-center gradient-bg text-white py-4 px-6 rounded-lg hover:opacity-90 transition-all duration-300 shadow-lg">
                                    Donate
                                </a>
                            </div>
                        </form>
                    </div>

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
    @endpush
</x-front.layout>