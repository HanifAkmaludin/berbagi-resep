<section class="py-[32px]">
    <div class="container">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="font-semibold text-2xl leading-[22px]">Berbagi.<span class="text-primary">Resep</span></h1>
            </div>
            <div>
                @if(session()->has('logged'))
                <ul class="flex gap-7 font-medium text-sm text-secondary">
                    <li class="leading-[22px]"><a href="{{ route('resep.list') }}">Resep</a></li>
                    @if(session()->get("idUserRole") == 2)
                    <li class="leading-[22px]"><a href="{{ route('resep.store') }}">Tambah resep</a></li>
                    @endif
                    <li class="leading-[22px]"><div class="relative inline-block text-left">
                        <div class="dropdown-profile">
                          <button type="button" id="dropdownChef" data-dropdown-toggle="dropdown" class="bg-transparent inline-flex justify-center text-sm font-medium text-gray-700 transition-all duration-300" aria-expanded="true" aria-haspopup="true">
                            Profile
                            <svg class="-mr-1 ml-2 h-5 w-5 -rotate-90" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#EB5757" aria-hidden="true">
                              <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                            </svg>
                          </button>
                        </div>
                        <div id="dropdown" class="hidden transition-all duration-300 absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-xl bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                          <div class="py-2 px-2" role="none">
                            @if(session()->get('idUserRole') == 1)
                                <a href="{{ route('chef.register') }}" class="text-gray-700 block px-4 py-2 text-sm rounded-lg hover:bg-slate-200" role="menuitem" tabindex="-1" id="menu-item-0">Daftar Chef</a>
                            @endif
                            @if(session()->get('idUserRole') == 2)
                                <a href="{{ route('resep.resepku') }}" class="text-gray-700 block px-4 py-2 text-sm rounded-lg hover:bg-slate-200" role="menuitem" tabindex="-1" id="menu-item-0">ResepKu</a>
                            @endif
                            <a href="{{ route('resep.simpan_resep') }}" class="text-gray-700 block px-4 py-2 text-sm rounded-lg hover:bg-slate-200" role="menuitem" tabindex="-1" id="menu-item-0">Simpan Resep</a>
                            <a href="{{ route('logout') }}" class="text-gray-700 block px-4 py-2 text-sm rounded-lg hover:bg-slate-200" role="menuitem" tabindex="-1" id="menu-item-0">Sign out</a>
                          </div>
                        </div>
                      </div>
                    </li>
                </ul>
                @endif
            </div>
            @if(!session()->has('logged'))
                <div class="flex gap-5">
                    <a href="{{ route('login') }}" class="rounded-[50px] bg-primary font-medium text-sm leading-[22px] w-[120px] h-[49px] flex items-center justify-center text-white hover:bg-primary/80 duration-300">Login</a>
                    <a href="{{ route('register') }}" class="rounded-[50px] border border-primary font-medium text-sm leading-[22px] w-[120px] h-[49px] flex items-center justify-center hover:bg-primary duration-300 hover:text-white">Register</a>
                </div>
            @endif
        </div>
    </div>
</section>

{{-- <button id="dropdownNavbarButton" data-dropdown-toggle="dropdownNavbar" class="flex justify-between items-center py-2 pr-4 pl-3 w-full font-medium text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-gray-400 dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Dropdown <svg class="ml-1 w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
            <!-- Dropdown menu -->
            <div id="dropdownNavbar" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                <ul class="py-1 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownNavbarButton">
                  <li>
                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                  </li>
                  <li>
                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                  </li>
                  <li>
                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                  </li>
                </ul>
                <div class="py-1">
                  <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">Sign out</a>
                </div>
            </div> --}}