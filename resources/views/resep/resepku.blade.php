@extends('templates.template')

@section('title', "ResepKu")
@section('content')
    @include('components.navbar')
    <section class="">
        <div class="container">
            <h1 class="font-semibold text-[30px] my-5">ResepKu</h1>
            @if(session("success"))
                <div class="msg-parent w-[40%] mx-auto flex justify-between items-center bg-primary py-3 px-4 mb-5 rounded-lg text-white">
                    <h1 class="font-light"> {{ session("success") }}</h1>
                    <p class="font-light msg-button cursor-pointer">X</p>
                </div>
            @endif
            <div class="flex flex-wrap gap-9">
                @if(count($resep) != 0)
                    @include('components.cards')
                @endif
            </div>
        </div>
    </section>
@endsection