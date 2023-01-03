@extends("templates.template")

@section('title',  $resep->nama_resep)
@section('content')
    <section class="pb-10">
        <a href="{{ route('resep.list') }}" class="absolute top-5 left-5 rotate-180 text-primary border border-primary hover:bg-primary hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </a>
        <div class="container mx-auto">
            <div class="mt-10">
                <div class="w-full h-[300px] rounded-3xl overflow-hidden relative">
                    <img src="{{ Storage::url($resep->foto_resep) }}" alt="" class="h-full w-full object-cover object-center absolute">
                    <div class="w-full h-full bg-resep absolute flex items-end z-50">
                        <div class="mx-[39px] flex flex-col gap-[10px] pb-10">
                            <p class="font-medium text-[36px] leading-[22px] text-white">{{ $resep->nama_resep }}</p>
                        </div>
                    </div>
                </div>
                <div class="mt-10 flex flex-wrap justify-between gap-10">
                    <div class="w-col-2 border border-gray-200 p-10 rounded-2xl max-h-[560px]">
                        <h1 class="font-medium text-xl leading-[22px] mb-5">Detail Resep</h1>
                        <p class="mb-5 max-h-[200px] overflow-y-scroll scroll-bar">{{ $resep->deskripsi }}</p>
                        <p class="font-medium text-base mb-2">Pembuat : <span class="font-normal">Chef {{ $resep->chef->nama }}</span></p>
                        <p class="font-medium text-base mb-2">Kategori : <span class="font-normal">{{ $resep->kategori->nama_kategori }}</span></p>
                        <p class="font-medium text-base">Pengeluaran saat Masak : <span class="font-normal">Rp.{{ number_format($resep->pengeluaran_masak) }}</span></p>
                    </div>
                    <div class="w-col-2 border border-gray-200 p-10 rounded-2xl">
                        <h1 class="font-medium text-xl leading-[22px] mb-5">Bahan-Bahan</h1>
                        <div class="flex flex-col gap-3">
                            @foreach($resep->resep_bahan as $rb )
                                <p>{{ $rb->takaran }} @foreach($rb->bahan_bahan as $bb) {{ $bb->nama_bahan }} @endforeach</p>
                            @endforeach
                        </div>
                    </div>
                    <div class="w-full border border-gray-200 p-10 rounded-2xl">
                        <p class="font-medium text-xl leading-[22px] mb-5">Langkah-Langkah</p>
                        <div class="flex gap-10 flex-wrap">
                            @foreach($resep->cara_pembuatan as $cp)
                                <div class="flex flex-col w-col-3">
                                    <div class="w-full h-[300px] overflow-hidden rounded-xl">
                                        @if($cp->foto_cara_pembuatan != null)
                                            <img src="{{ Storage::url($cp->foto_cara_pembuatan) }}" alt="" class="w-full h-full object-cover object-center">
                                        @endif
                                    </div>
                                    <div class="py-5 px-4 mt-3 rounded-xl">
                                        <p>{{ $cp->langkah_langkah }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection