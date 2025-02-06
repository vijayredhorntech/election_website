<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-5xl mx-auto">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-gray-800">Create New Member</h1>
                <p class="text-gray-600 mt-1">Fill in the information below to register a new member</p>
            </div>

            <!-- Form -->
            <form action="{{$formData['url']}}" method="{{$formData['method']}}" class="bg-white rounded-lg shadow-sm">
                @csrf

                <!-- Personal Information Section -->
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Personal Information</h2>
                    <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label for="title" class="block text-sm font-medium text-gray-700">Title<span class="text-red-500">*</span></label>
                            <select name="title" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                                <option value="">Select title...</option>
                                <option value="Mr">Mr</option>
                                <option value="Mrs">Mrs</option>
                                <option value="Ms">Ms</option>
                                <option value="Dr">Dr</option>
                            </select>
                        </div>

                        <div class="space-y-2">
                            <label for="first_name" class="block text-sm font-medium text-gray-700">First Name<span class="text-red-500">*</span></label>
                            <input type="text" name="first_name" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" placeholder="Enter first name">
                        </div>

                        <div class="space-y-2">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name<span class="text-red-500">*</span></label>
                            <input type="text" name="last_name" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" placeholder="Enter last name">
                        </div>

                        <div class="space-y-2">
                            <label for="profession" class="block text-sm font-medium text-gray-700">Profession<span class="text-red-500">*</span></label>
                            <input type="text" name="profession" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" placeholder="Enter profession">
                        </div>
                    </div>
                </div>

                <!-- Address Information Section -->
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Address Information</h2>
                    <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label for="post_code" class="block text-sm font-medium text-gray-700">Post Code<span class="text-red-500">*</span></label>
                            <input type="text" name="post_code" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" placeholder="Enter post code">
                        </div>

                        <div class="space-y-2">
                            <label for="address" class="block text-sm font-medium text-gray-700">Address<span class="text-red-500">*</span></label>
                            <input type="text" name="address" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" placeholder="Enter address">
                        </div>

                        <div class="space-y-2">
                            <label for="country" class="block text-sm font-medium text-gray-700">Country<span class="text-red-500">*</span></label>
                            <input type="text" name="country" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" placeholder="Enter country">
                        </div>

                        <div class="space-y-2">
                            <label for="county" class="block text-sm font-medium text-gray-700">County<span class="text-red-500">*</span></label>
                            <input type="text" name="county" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" placeholder="Enter county">
                        </div>

                        <div class="space-y-2">
                            <label for="city" class="block text-sm font-medium text-gray-700">City<span class="text-red-500">*</span></label>
                            <input type="text" name="city" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" placeholder="Enter city">
                        </div>

                        <div class="space-y-2">
                            <label for="constituency" class="block text-sm font-medium text-gray-700">Constituency<span class="text-red-500">*</span></label>
                            <input type="text" name="constituency" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" placeholder="Enter constituency">
                        </div>
                    </div>
                </div>

                <!-- Referral Section -->
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Referral Information</h2>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-2">
                            <input type="checkbox" id="referral_checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                            <label for="referral_checkbox" class="text-sm font-medium text-gray-700">I have a referral code</label>
                        </div>

                        <div id="referral_code_input" class="hidden">
                            <div class="max-w-md space-y-2">
                                <label for="referral_code" class="block text-sm font-medium text-gray-700">Referral Code<span class="text-red-500">*</span></label>
                                <input type="text" id="referral_code" name="referral_code" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" placeholder="Enter referral code">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="p-6 flex justify-end">
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200">
                        Create Member
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('referral_checkbox').addEventListener('change', function() {
            const referralInput = document.getElementById('referral_code_input');
            referralInput.classList.toggle('hidden', !this.checked);
        });
    </script>
</x-app-layout>