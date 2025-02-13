<nav
    class="sticky top-0 z-40 relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-[3px] lg:flex-nowrap lg:justify-start bg-white shadow-lg shadow-black/10"
    navbar-main navbar-scroll="false">
    <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
        @yield('breadcrumb')
        <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
            <div class="flex items-center md:ml-auto md:pr-4">
            </div>
            <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
                <!-- online builder btn  -->
                <!-- <li class="flex items-center">
                  <a class="inline-block px-8 py-2 mb-0 mr-4 text-xs font-bold text-center text-blue-500 uppercase align-middle transition-all ease-in bg-transparent border border-blue-500 border-solid rounded-lg shadow-none cursor-pointer leading-pro hover:-translate-y-px active:shadow-xs hover:border-blue-500 active:bg-blue-500 active:hover:text-blue-500 hover:text-blue-500 tracking-tight-rem hover:bg-transparent hover:opacity-75 hover:shadow-none active:text-black active:hover:bg-transparent" target="_blank" href="https://www.creative-tim.com/builder/soft-ui?ref=navbar-dashboard&amp;_ga=2.76518741.1192788655.1647724933-1242940210.1644448053">Online Builder</a>
                </li> -->


                @if(\Illuminate\Support\Facades\Auth::user())
                <li class="flex items-center ml-2">
                    @php
                    $financialYear = \App\Models\FinancialYear::get()->all();
                    @endphp
                    <form action="{{route('set-financial-year')}}" method="POST"
                        class="block px-0 py-2 text-sm font-semibold text-black transition-all ease-nav-brand">
                        @csrf
                        <select name="id" class="text-sm pl-4 pr-8  py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
                            @foreach($financialYear as $year)
                            <option value="{{$year->id}}" {{$year->active?'selected':''}}>{{$year->year}}</option>
                            @endforeach

                        </select>
                        <button class="w-max px-4 py-1.5 rounded-[3px] border-[1px] border-primaryHeading hover:border-primaryLight text-white bg-primaryHeading hover:bg-primaryLight transition ease-in duration-2000 text-md font-semibold">Set FY</button>

                    </form>
                </li>
                @endif
                <li class="flex items-center pl-4 xl:hidden"
                    onclick="document.getElementById('sideBar').classList.toggle('-translate-x-full')">
                    <a href="javascript:;" class="block p-0 text-sm text-black transition-all ease-nav-brand"
                        sidenav-trigger>
                        <div class="w-4.5 overflow-hidden">
                            <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-black transition-all"></i>
                            <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-black transition-all"></i>
                            <i class="ease relative block h-0.5 rounded-sm bg-black transition-all"></i>
                        </div>
                    </a>
                </li>


                <!-- notifications -->

            </ul>
        </div>
    </div>
</nav>