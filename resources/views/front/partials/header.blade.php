<header class="bg-white shadow-md">
    <nav class="container mx-auto px-4 py-4">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('index') }}" class="flex items-center">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="One Nation Logo" class="h-12">
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex space-x-8">
                <a href="{{ route('index') }}" class="text-gray-700 hover:text-primary">Home</a>
                <a href="{{ route('about') }}" class="text-gray-700 hover:text-primary">About</a>
                <a href="{{ route('leadership') }}" class="text-gray-700 hover:text-primary">Leadership</a>
                <a href="{{ route('policies') }}" class="text-gray-700 hover:text-primary">Policies</a>
                <a href="{{ route('events') }}" class="text-gray-700 hover:text-primary">Events & News</a>
                <a href="{{ route('contact') }}" class="text-gray-700 hover:text-primary">Contact</a>
            </div>

            <!-- Action Buttons -->
            <div class="hidden md:flex space-x-4">
                <a href="{{ route('donate') }}" class="bg-primary text-white px-6 py-2 rounded-full hover:bg-primary-dark transition">Donate</a>
                <a href="{{ route('joinUs') }}" class="border-2 border-primary text-primary px-6 py-2 rounded-full hover:bg-primary hover:text-white transition">Join Us</a>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button type="button" class="mobile-menu-button">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="mobile-menu hidden md:hidden mt-4">
            <a href="{{ route('index') }}" class="block py-2 text-gray-700 hover:text-primary">Home</a>
            <a href="{{ route('about') }}" class="block py-2 text-gray-700 hover:text-primary">About</a>
            <a href="{{ route('leadership') }}" class="block py-2 text-gray-700 hover:text-primary">Leadership</a>
            <a href="{{ route('policies') }}" class="block py-2 text-gray-700 hover:text-primary">Policies</a>
            <a href="{{ route('events') }}" class="block py-2 text-gray-700 hover:text-primary">Events & News</a>
            <a href="{{ route('contact') }}" class="block py-2 text-gray-700 hover:text-primary">Contact</a>
            <div class="mt-4 space-y-2">
                <a href="{{ route('donate') }}" class="block w-full text-center bg-primary text-white px-6 py-2 rounded-full hover:bg-primary-dark transition">Donate</a>
                <a href="{{ route('joinUs') }}" class="block w-full text-center border-2 border-primary text-primary px-6 py-2 rounded-full hover:bg-primary hover:text-white transition">Join Us</a>
            </div>
        </div>
    </nav>
</header>

@push('scripts')
<script>
    // Mobile menu toggle
    const mobileMenuButton = document.querySelector('.mobile-menu-button');
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>
@endpush