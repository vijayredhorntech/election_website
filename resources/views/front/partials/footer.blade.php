<footer class="bg-gray-900 text-white pt-16 pb-8">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- About Section -->
            <div>
                <h4 class="text-xl font-semibold mb-4">About One Nation</h4>
                <p class="text-gray-400 mb-4">One Nation is committed to building a stronger, more united society through inclusive policies and grassroots engagement.</p>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="text-xl font-semibold mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('about') }}" class="text-gray-400 hover:text-white">About Us</a></li>
                    <li><a href="{{ route('leadership') }}" class="text-gray-400 hover:text-white">Leadership</a></li>
                    <li><a href="{{ route('policies') }}" class="text-gray-400 hover:text-white">Policies</a></li>
                    <li><a href="{{ route('events') }}" class="text-gray-400 hover:text-white">Events</a></li>
                    <li><a href="{{ route('news') }}" class="text-gray-400 hover:text-white">News</a></li>
                </ul>
            </div>

            <!-- Important Links -->
            <div>
                <h4 class="text-xl font-semibold mb-4">Important Links</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('privacy') }}" class="text-gray-400 hover:text-white">Privacy Policy</a></li>
                    <li><a href="{{ route('terms') }}" class="text-gray-400 hover:text-white">Terms & Conditions</a></li>
                    <li><a href="{{ route('code-of-conduct') }}" class="text-gray-400 hover:text-white">Code of Conduct</a></li>
                    <li><a href="{{ route('faq') }}" class="text-gray-400 hover:text-white">FAQs</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h4 class="text-xl font-semibold mb-4">Contact Us</h4>
                <ul class="space-y-2 text-gray-400">
                    <li><i class="fas fa-map-marker-alt mr-2"></i> 123 Party Street, London, UK</li>
                    <li><i class="fas fa-phone mr-2"></i> +44 123 456 7890</li>
                    <li><i class="fas fa-envelope mr-2"></i> info@onenation.org</li>
                </ul>
            </div>
        </div>

        <!-- Copyright -->
        <div class="border-t border-gray-800 mt-12 pt-8">
            <div class="text-center text-gray-400">
                <p>&copy; {{ date('Y') }} One Nation. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer> 