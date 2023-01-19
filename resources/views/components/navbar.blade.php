{{-- <section id="navbar" class="fixed w-full z-[9999] bg-white md:py-[32px]">
    <div class="container relative flex items-center justify-between py-[32px] md:py-0">
        <div class="absolute z-[999] w-full flex justify-between left-0 px-[25px] h-full items-center bg-white shadow-lg">
          <div>
              <h1 class="font-semibold text-xl md:text-2xl leading-[22px]">Berbagi.<span class="text-primary">Resep</span></h1>
          </div>
          <div class="hamburger flex flex-col gap-[5px] lg:hidden">
            <span
                class="block w-[25px] h-[3px] bg-secondary rounded-[20px] duration-300"
            ></span>
            <span
                class="block w-[25px] h-[3px] bg-secondary rounded-[20px] duration-300"
            ></span>
            <span
                class="block w-[25px] h-[3px] bg-secondary rounded-[20px] duration-300"
            ></span>
          </div>
        </div>
        <div class="navbar-links absolute w-full bottom-0 h-0 bg-white shadow-lg left-0 flex justify-center items-center overflow-y-hidden py-1 rounded-xl duration-300">
          <div class="w-full px-[25px]">
            @if(session()->has('logged'))
              <ul class="flex flex-col items-center gap-4 font-medium text-sm text-secondary">
                  <li class="leading-[22px] w-full text-center"><a href="{{ route('resep.list') }}" class="block w-full rounded-lg py-1 hover:bg-primary hover:text-white duration-300">Resep</a></li>
                  @if(session()->get("idUserRole") == 2)
                  <li class="leading-[22px] w-full text-center"><a href="{{ route('resep.store') }}" class="block w-full rounded-lg py-1 hover:bg-primary hover:text-white duration-300">Tambah resep</a></li>
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
          <div class="navbar-links-home flex flex-col gap-4 w-full px-[25px]">
            <div class="w-full">
              <ul class="flex flex-col gap-3 items-center font-medium text-sm text-secondary md:gap-7">
                <li class="leading-[22px] w-full text-center"><a href="#home" class="block w-full rounded-lg py-1 hover:bg-primary hover:text-white duration-300">Home</a></li>
                <li class="leading-[22px] w-full text-center"><a href="#menu" class="block w-full py-1 rounded-lg hover:bg-primary hover:text-white duration-300">Menu</a></li>
                <li class="leading-[22px] w-full text-center"><a href="#comment" class="block w-full py-1 rounded-lg hover:bg-primary hover:text-white duration-300">comments</a></li>
              </ul>
            </div>
            <div class="flex gap-4 justify-center">
                <a href="{{ route('login') }}" class="rounded-[50px] bg-primary font-medium text-sm leading-[22px] w-[120px] h-[35px] flex items-center justify-center text-white hover:bg-primary/80 duration-300 md:w-[120px] md:h-[49px]">Login</a>
                <a href="{{ route('register') }}" class="rounded-[50px] border border-primary font-medium text-sm leading-[22px] w-[120px] h-[35px] flex items-center justify-center hover:bg-primary duration-300 hover:text-white md:w-[120px] md:h-[49px]">Register</a>
            </div>
          </div>
        </div>
      @endif
    </div>
</section> --}}

<section id="navbar" class="fixed w-full bg-white z-[9999] px-2 py-4 border-gray-200 shadow-lg md:py-2">
  <div class="container flex flex-wrap items-center justify-between mx-auto px-[25px] md:px-0">
    <a href="#" class="flex items-center">
      <h1 class="font-semibold text-xl md:text-2xl leading-[22px]">Berbagi.<span class="text-primary">Resep</span></h1>
    </a>
    <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-dropdown" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <svg class="w-6 h-6 text-secondary" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
      <ul class="flex flex-col py-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:items-center md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0">
        @if(session()->has('logged'))
        <li>
          <a href="{{ route('resep.list') }}" class="block py-2 pl-3 pr-4 text-secondary hover:text-white hover:bg-primary rounded md:bg-transparent md:hover:text-primary md:hover:bg-transparent md:p-0" aria-current="page">Resep</a>
        </li>
        <li>
          @if(session()->get("idUserRole") == 2)
          <a href="{{ route('resep.store') }}" class="block py-2 pl-3 pr-4 text-secondary hover:text-white hover:bg-primary rounded  md:hover:bg-transparent md:hover:text-primary  md:border-0 md:p-0 ">Tambah Resep</a>
          @endif
        </li>
        <li>
            <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-secondary hover:text-white hover:bg-primary rounded md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto">Profile <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
            <!-- Dropdown menu -->
            <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded shadow w-44">
                <ul class="py-1 text-sm text-gray-700" aria-labelledby="dropdownLargeButton">
                  <li>
                    @if(session()->get('idUserRole') == 1)
                    <a href="{{ route('chef.register') }}" class="block px-4 py-2 hover:bg-gray-100">Daftar Chef</a>
                    @elseif(session()->get('idUserRole') == 2)
                    <a href="{{ route('resep.resepku') }}" class="block px-4 py-2 hover:bg-gray-100">ResepKu</a>
                    @endif
                  </li>
                  <li>
                    <a href="{{ route('resep.simpan_resep') }}" class="block px-4 py-2 hover:bg-gray-100">Simpan Resep</a>
                  </li>
                </ul>
                <div class="py-1">
                  <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign out</a>
                </div>
            </div>
        </li>
        @elseif(!session()->has('logged'))
        <li>
          <a href="#home" class="block py-2 pl-3 pr-4 text-secondary hover:text-white hover:bg-primary rounded md:bg-transparent md:hover:bg-transparent md:hover:text-primary md:p-0" aria-current="page">Home</a>
        </li>
        <li>
          <a href="#menu" class="block py-2 pl-3 pr-4 text-secondary hover:text-white hover:bg-primary rounded md:bg-transparent md:hover:bg-transparent md:hover:text-primary md:p-0" aria-current="page">Resep</a>
        </li>
        <li>
          <a href="#comment" class="block py-2 pl-3 pr-4 text-secondary hover:text-white hover:bg-primary rounded md:bg-transparent md:hover:bg-transparent md:hover:text-primary md:p-0" aria-current="page">comment</a>
        </li>
        <li class="flex mt-4 gap-4 justify-center md:mt-0">
          <a href="{{ route('login') }}" class="rounded-[50px] bg-primary font-medium text-sm leading-[22px] w-[120px] h-[35px] flex items-center justify-center text-white hover:bg-primary/80 duration-300 md:w-[110px] md:h-[35px] lg:w-[120px] lg:h-[49px]">Login</a>
          <a href="{{ route('register') }}" class="rounded-[50px] border border-primary font-medium text-sm leading-[22px] w-[120px] h-[35px] flex items-center justify-center hover:bg-primary duration-300 hover:text-white md:w-[110px] md:h-[35px] lg:w-[120px] lg:h-[49px]">Register</a>
        </li>
        @endif
      </ul>
    </div>
  </div>
</section>

