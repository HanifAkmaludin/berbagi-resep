@extends('templates.template')

@section('title', 'Simpan Resep')
@section('content')
    @include('components.navbar')
    <section class="">
        <div class="container">
            <h1 class="font-semibold text-[30px] my-5">Simpan Resep</h1>
            <div class="flex flex-wrap gap-9">
                @if(count($resep) != 0)
                    @include('components.cards')
                @endif
            </div>
        </div>
    </section>
@endsection