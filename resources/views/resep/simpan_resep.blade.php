@extends('templates.template')

@section('title', 'Simpan Resep')
@section('content')
    @include('components.navbar')
    <section class="pt-[90px] px-[25px] md:pt-[100px]">
        <div class="container">
            <h1 class="font-semibold text-[30px] my-5">Simpan Resep</h1>
            <div class="flex flex-wrap gap-9 justify-center sm:justify-start">
                @if(count($resep) != 0)
                    @include('components.cards')
                @endif
            </div>
        </div>
    </section>
@endsection