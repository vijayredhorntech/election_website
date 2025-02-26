<aside style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url({{asset('assets/img/bg1.jpg')}}); background-size: cover; background-position: center;"
    class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl shadow-none bg-slate-850 max-w-64 ease-nav-brand z-990 xl:left-0 xl:translate-x-0"
    aria-expanded="false" id="sideBar">

    <div class="h-24 border-b-white border-b-[1px]">
        <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times text-white  xl:hidden" sidenav-close onclick="document.getElementById('sideBar').classList.toggle('-translate-x-full')"></i>
        <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap text-white text-slate-700" href="{{route('dashboard')}}" target="_blank">
            <img src="{{asset('assets/images/logo.png')}}" class=" h-full max-w-full transition-all duration-200 inline ease-nav-brand max-h-16" alt="main_logo" />
            <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand text-xl">One Nation</span>
        </a>
    </div>

    <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent bg-gradient-to-r from-transparent via-white to-transparent" />

    <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
        <ul class="flex flex-col pl-0 mb-0">
            <li class="mt-0.5 w-full">
                <a href="{{route('dashboard')}}" class="{{Route::currentRouteName()==='dashboard'?'bg-primaryLight':''}} hover:bg-primaryLight  py-2.7 border-b-[1px] border-b-primaryLight  text-white/90  text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-[3px] px-4 font-semibold transition-colors">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-[3px] bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fa fa-tv"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease text-lg">Dashboard</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a href="{{route('designations.index')}}" class="{{Route::currentRouteName()==='designations.index'?'bg-primaryLight':''}} hover:bg-primaryLight  py-2.7 border-b-[1px] border-b-primaryLight  text-white/90  text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-[3px] px-4 font-semibold transition-colors">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-[3px] bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fa-regular fa-id-badge"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease text-lg">Designations</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a href="{{route('office.index')}}" class="{{Route::currentRouteName()==='office.index'?'bg-primaryLight':''}} hover:bg-primaryLight  py-2.7 border-b-[1px] border-b-primaryLight  text-white/90  text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-[3px] px-4 font-semibold transition-colors">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-[3px] bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fa-regular fa-building"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease text-lg">Offices</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a href="{{route('employees.index')}}" class="{{Route::currentRouteName()==='employees.index'?'bg-primaryLight':''}} hover:bg-primaryLight  py-2.7 border-b-[1px] border-b-primaryLight  text-white/90  text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-[3px] px-4 font-semibold transition-colors">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-[3px] bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease text-lg">Employees</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a href="{{route('member.index')}}" class="{{Route::currentRouteName()==='member.index'?'bg-primaryLight':''}} hover:bg-primaryLight  py-2.7 border-b-[1px] border-b-primaryLight  text-white/90  text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-[3px] px-4 font-semibold transition-colors">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-[3px] bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fa-solid fa-people-group"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease text-lg">Members</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a href="{{route('events.index')}}" class="{{Route::currentRouteName()==='events.index'?'bg-primaryLight':''}} hover:bg-primaryLight  py-2.7 border-b-[1px] border-b-primaryLight  text-white/90  text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-[3px] px-4 font-semibold transition-colors">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-[3px] bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fa-solid fa-calendar-days"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease text-lg">Events</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a href="{{route('budget.index')}}" class="{{Route::currentRouteName()==='budget.index'?'bg-primaryLight':''}} hover:bg-primaryLight  py-2.7 border-b-[1px] border-b-primaryLight  text-white/90  text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-[3px] px-4 font-semibold transition-colors">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-[3px] bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fa-solid fa-database"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease text-lg">Budget</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a href="{{route('report.index')}}" class="{{Route::currentRouteName()==='report.index'?'bg-primaryLight':''}} hover:bg-primaryLight  py-2.7 border-b-[1px] border-b-primaryLight  text-white/90  text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-[3px] px-4 font-semibold transition-colors">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-[3px] bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fa-solid fa-file"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease text-lg">Reports</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a href="{{route('account-setting.index')}}" class="{{Route::currentRouteName()==='account-setting.index'?'bg-primaryLight':''}} hover:bg-primaryLight  py-2.7 border-b-[1px] border-b-primaryLight  text-white/90  text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-[3px] px-4 font-semibold transition-colors">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-[3px] bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fa-solid fa-gear"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease text-lg">Account Settings</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a href="{{route('designations.index')}}" class="{{Route::currentRouteName()===''?'bg-primaryLight':''}} hover:bg-primaryLight  py-2.7 border-b-[1px] border-b-primaryLight  text-white/90  text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-[3px] px-4 font-semibold transition-colors">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-[3px] bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fa-solid fa-user-gear"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease text-lg">Profile Settings</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="mx-4">
        <!-- load phantom colors for card after: -->
        <p class="invisible hidden text-gray-800 text-red-500 text-red-600 text-blue-500 bg-gray-500/30 bg-cyan-500/30 bg-emerald-500/30 bg-orange-500/30 bg-red-500/30 after:bg-gradient-to-tl after:from-zinc-800 after:to-zinc-700 dark:bg-gradient-to-tl dark:from-slate-750 dark:to-gray-850 after:from-blue-700 after:to-cyan-500 after:from-orange-500 after:to-yellow-500 after:from-green-600 after:to-lime-400 after:from-red-600 after:to-orange-600 after:from-slate-600 after:to-slate-300 text-emerald-500 text-cyan-500 text-slate-400"></p>
        <div class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none rounded-2xl bg-clip-border" sidenav-card>
            <img class="w-16 mx-auto" src="{{asset('assets/images/logo.png')}}" alt="sidebar illustrations" />
            <div class="flex-auto w-full p-4 pt-0 text-center">
                <div class="transition-all duration-200 ease-nav-brand">
                    <p class="mb-0 text-xs font-semibold leading-tight text-white">Version 1.0.0</p>
                </div>
            </div>
        </div>
        <form action="{{route('logout')}}" method="post">
            @csrf
            <button class="inline-block w-full px-8 py-2 text-xs font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-primaryDark border-0 rounded-lg shadow-md select-none bg-150 bg-x-25 hover:shadow-xs hover:-translate-y-px"><i class="fa fa-right-from-bracket mr-2"></i>Logout</button>

        </form>
    </div>


</aside>