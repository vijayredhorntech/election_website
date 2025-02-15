<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Main Styling -->
    <style>
        /* width */
        ::-webkit-scrollbar {
            width: 3px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: green;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: white;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        .gradient {
            background: linear-gradient(90deg, #d53369 0%, #daae51 100%);
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>

    @stack('styles')
</head>

<body class="leading-normal tracking-normal text-white gradient" style="font-family: 'Public Sans', sans-serif;">
    <!--Nav-->
    <nav class="fixed w-full z-30 top-0 bg-white shadow">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
            <div class="pl-4 flex items-center">
                <a class="toggleColour flex items-center gap-2 no-underline hover:no-underline font-bold text-2xl lg:text-4xl text-gray-800" href="{{route('index')}}">
                    <img src="{{asset('assets/images/logo.png')}}" class="h-20 w-auto object-cover" alt=""> One Nation
                </a>
            </div>
            <div class="block lg:hidden pr-4">
                <button id="nav-toggle" class="flex items-center p-1 text-pink-800 hover:text-gray-900 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                    <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                    </svg>
                </button>
            </div>
            <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden mt-2 lg:mt-0 lg:bg-transparent text-black p-4 lg:p-0 z-20 bg-white">
                <ul class="list-reset lg:flex justify-end flex-1 items-center">
                    {{-- <li class="mr-3">--}}
                    {{-- <a class="inline-block py-2 px-4 text-black font-bold no-underline" href="#">Active</a>--}}
                    {{-- </li>--}}

                </ul>
                <a href="{{route('joinUs')}}" class="mx-auto lg:mx-0 hover:underline bg-black text-gray-100 font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                    Join Us
                </a>
                <a href="{{route('donate')}}" id="navAction" class="mx-auto hover:underline ml-2 font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out gradient text-white">
                    Donate <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>
        <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
    </nav>
    {{ $slot}}
    <footer class="bg-white">
        <div class="container mx-auto px-8">
            <div class="w-full flex flex-col md:flex-row py-6">
                <div class="flex-1 mb-6 text-black">
                    <a class="toggleColour flex flex-col items-start gap-2 text-white no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="{{route('index')}}">
                        <img src="{{asset('assets/images/logo.png')}}" class="h-20 w-auto object-cover" alt=""> One Nation
                    </a>
                </div>
                <div class="flex-1">
                    <p class="uppercase text-gray-500 md:mb-6">Links</p>
                    <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">FAQ</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Help</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Support</a>
                        </li>
                    </ul>
                </div>
                <div class="flex-1">
                    <p class="uppercase text-gray-500 md:mb-6">Legal</p>
                    <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Privacy Policy</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Terms & Conditions</a>
                        </li>
                    </ul>
                </div>
                <div class="flex-1">
                    <p class="uppercase text-gray-500 md:mb-6">Social</p>
                    <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500"><i class="fa-brands fa-facebook"></i></a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500"><i class="fa-brands fa-instagram"></i></a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500"><i class="fa-brands fa-x-twitter"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="flex-1">
                    <p class="uppercase text-gray-500 md:mb-6">Company</p>
                    <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Address: company address</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Phone: 0123456789</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Email: company@gmail.com</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <div>
        <p class="text-center p-3">Developed By: <a href="https://himsoftsolution.com/" class="text-black font-bold">Him Soft Solution</a></p>
    </div>
</body>
<script>
    var scrollpos = window.scrollY;
    var header = document.getElementById("header");
    var navcontent = document.getElementById("nav-content");
    var navaction = document.getElementById("navAction");
    var brandname = document.getElementById("brandname");
    var toToggle = document.querySelectorAll(".toggleColour");

    // document.addEventListener("scroll", function() {
    //     /*Apply classes for slide in bar*/
    //     scrollpos = window.scrollY;

    //     if (scrollpos > 10) {
    //         // header.classList.add("bg-white");
    //         navaction.classList.remove("bg-white");
    //         navaction.classList.add("gradient");
    //         navaction.classList.remove("text-gray-800");
    //         navaction.classList.add("text-white");
    //         //Use to switch toggleColour colours
    //         for (var i = 0; i < toToggle.length; i++) {
    //             toToggle[i].classList.add("text-gray-800");
    //             toToggle[i].classList.remove("text-white");
    //         }
    //         header.classList.add("shadow");
    //         navcontent.classList.remove("bg-gray-100");
    //         navcontent.classList.add("bg-white");
    //     } else {
    //         // header.classList.remove("bg-white");
    //         navaction.classList.remove("gradient");
    //         navaction.classList.add("bg-white");
    //         navaction.classList.remove("text-white");
    //         navaction.classList.add("text-gray-800");
    //         //Use to switch toggleColour colours
    //         for (var i = 0; i < toToggle.length; i++) {
    //             toToggle[i].classList.add("text-white");
    //             toToggle[i].classList.remove("text-gray-800");
    //         }

    //         header.classList.remove("shadow");
    //         navcontent.classList.remove("bg-white");
    //         navcontent.classList.add("bg-gray-100");
    //     }
    // });
</script>
<script>
    /*Toggle dropdown list*/
    /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

    var navMenuDiv = document.getElementById("nav-content");
    var navMenu = document.getElementById("nav-toggle");

    document.onclick = check;

    function check(e) {
        var target = (e && e.target) || (event && event.srcElement);

        //Nav Menu
        if (!checkParent(target, navMenuDiv)) {
            // click NOT on the menu
            if (checkParent(target, navMenu)) {
                // click on the link
                if (navMenuDiv.classList.contains("hidden")) {
                    navMenuDiv.classList.remove("hidden");
                } else {
                    navMenuDiv.classList.add("hidden");
                }
            } else {
                // click both outside link and outside menu, hide menu
                navMenuDiv.classList.add("hidden");
            }
        }
    }

    function checkParent(t, elm) {
        while (t.parentNode) {
            if (t == elm) {
                return true;
            }
            t = t.parentNode;
        }
        return false;
    }
</script>
@stack('scripts')

</html>
