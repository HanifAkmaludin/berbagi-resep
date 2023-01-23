@foreach($resep as $r)
<div class="w-col-mobile h-[400px] rounded-[30px] overflow-hidden relative sm:w-col-2-card md:w-col-tablet lg:w-col-4">
    <img src="{{ url()->current().Storage::url($r->foto_resep) }}" alt="" class="h-[508px] w-[436px] object-cover object-center absolute">
    <div class="w-full h-full bg-resep absolute flex items-end">
        <div class="flex flex-col gap-[10px] pb-5 relative w-full mx-[30px] sm:mx-[39px] md:mx-[30px] lg:mx-[39px]">
            <p class="font-medium text-[25px] leading-[22px] text-white lg:text-[20px]">{{ $r->nama_resep }}</p>
            <p class="font-light text-[15px] leading-[22px] text-white"><span class="text-ylw">Chef</span> {{ $r->chef->nama }}</p>
            <a href="{{ route('resep.detail', ['id' => $r->id]) }}" class="font-medium text-xs leading-[22px] text-secondary bg-white w-[120px] h-[30px] flex items-center gap-2 rounded-[10px] px-3">Lihat Resep <i class="fa-solid fa-chevron-right text-secondary"></i></a>
            <form action="{{ route('resep.simpan', ['id' => $r->id]) }}" method="POST">
                @csrf
                <button type="submit" class="absolute bottom-7 right-0">
                    @if(count($simpan) != 0)
                        @for($i = 0; $i < count($resep); $i++)
                            @if(array_key_exists($i, $simpan))
                                @if($r->id == $simpan[$i]->resep_id)
                                    <i class="fa-solid fa-bookmark text-white text-3xl"></i>
                                    @break
                                @endif
                                <i class="fa-regular fa-bookmark text-white text-3xl"></i> 
                                @break
                            @endif
                        @endfor
                    @else
                        <i class="fa-regular fa-bookmark text-white text-3xl"></i> 
                    @endif
                </button>
           </form>
        </div>
    </div>
    @if(array_key_exists("path", parse_url(url()->current())))
        @if(parse_url(url()->current())["path"] === "/resep/resepku")
            <div class="absolute inline-block text-left top-5 right-5">
                <div class="dropdown-btn">
                    <button id="dropdownCard" class="dropdown-btn-card inline-flex items-center p-1 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50" type="button"> 
                        <svg class="w-6 h-6 " aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path class="" d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path></svg>
                    </button>
                </div>
                <div id="dropdown-card" class="hidden transition-all duration-300 absolute right-0 z-10 mt-2 w-[160px] origin-top-right rounded-xl bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                    <div class="py-2 px-2" >
                        <a href="{{ route('resep.update', ['id' => $r->id]) }}" class="text-gray-700 block px-4 py-2 text-sm rounded-lg hover:bg-slate-200"   id="menu-item-0">Update</a>
                        <a href="{{ route('resep.destroy', ['id' => $r->id]) }}" class="text-gray-700 block px-4 py-2 text-sm rounded-lg hover:bg-slate-200"   id="menu-item-1">Delete</a>
                    </div>
                </div>
            </div>
        @endif
    @endif
</div>
@endforeach


