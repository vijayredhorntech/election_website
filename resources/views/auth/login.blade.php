<x-guest-layout>
    <div class="w-full absolute top-0 left-0 w-full h-full grid lg:grid-cols-2 md:grid-cols-2 grid-cols-1 lg:bg-gradient-to-r md:bg-gradient-to-r from-black/90 to-black/20 bg-black/40">
        <div class="w-full h-full flex flex-col justify-center items-center lg:px-4 md:px-4 sm:px-32 px-4">
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif
            @if(session('error'))
                <div class="text-red-600 text-sm font-semibold mt-4">{{session('error')}}</div>
            @endif
            @if(session('success'))
                <div class="text-green-600 text-sm font-semibold mt-4">{{session('success')}}</div>
            @endif

            <!-- Form -->
            <form method="POST" action="{{ route('login') }}" class="lg:w-max md:w-max w-full bg-white p-6 rounded-[5px] shadow-lg shadow-gray-600 flex flex-col items-center w-full">
                <img src="{{asset('assets/images/logo.png')}}" alt="" class="h-[100px] w-auto">
                <div class="w-full flex flex-col items-center py-4">
                    <span class="text-primaryDark font-semibold lg:text-lg md:text-lg sm:text-lg text-sm text-center">One Nation</span>
                </div>

                @csrf
                <div class="w-full mt-4 flex flex-col gap-4">
                    <div class="lg:w-[400px] md:w-[350px] w-full flex flex-col gap-1">
                        <label for="email" class="font-semibold text-sm text-black">Email</label>
                        <x-text-input class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark" id="email"  type="email" name="email" :value="old('email')"  required placeholder="Enter your email....."/>
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
                    </div>

                    <div class="lg:w-[400px] md:w-[350px] w-full flex flex-col gap-1" id="password-field">
                        <label for="password" class="font-semibold text-sm text-black">Password</label>
                        <x-text-input id="password" class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark" type="password" name="password" required autocomplete="current-password" placeholder="Enter your password....." />
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
                    </div>
                </div>

                <div class="mt-2 w-full">
                    @if (Route::has('password.request'))
                        <div class="mr-1">
                            <a class="text-sm underline hover:no-underline" href="{{ route('password.request') }}">
                                {{ ('Forgot Password?') }}
                            </a>
                        </div>
                    @endif

                    <x-primary-button class=" mt-4 w-full bg-primaryDark/80 rounded-[3px] text-white px-4 py-3 font-semibold text-md border-[1px] border-primaryDark hover:bg-primaryDark transition ease-in duration-2000 flex justify-center" type="submit">
                        {{ __('Sign in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
        <div class="w-full lg:flex md:flex hidden">
        </div>
    </div>

    <script>
        document.getElementById('login_with_otp').addEventListener('change', function() {
            var passwordField = document.getElementById('password-field');
            passwordField.style.display = this.checked ? 'none' : 'flex';
        });
    </script>
</x-guest-layout>
