<div class="bg-white p-8 rounded-lg max-w-md mx-4">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold text-black">{{ $data['title'] }}</h2>
        <button onclick="{{ $onclick }}" class="text-gray-500 hover:text-gray-700 cursor-pointer">
            <i class="fa fa-times"></i>
        </button>
    </div>
    <p class="text-gray-600 text-sm leading-relaxed">
        {{ $data['content'] }}
    </p>
</div>