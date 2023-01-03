@extends('templates.template')

@section('title', 'List Resep')
@section('content')
    @include('components.navbar')
    <section class="">
        <div class="container">
            @if(session("success"))
                <div class="msg-parent w-[40%] mx-auto flex justify-between items-center bg-green-500 py-3 px-4 mt-5 rounded-lg mb-4 text-white">
                    <h1 class="font-light"> {{ session("success") }}</h1>
                    <p class="font-light msg-button cursor-pointer">X</p>
                </div>
            @endif
            @if($errors->any())
                <div class="msg-parent w-[40%] mx-auto flex justify-between items-center bg-primary py-3 px-4 mt-5 rounded-lg mb-4 text-white">
                    <h1 class="font-light text-sm">{{$errors->first()}}</h1>
                    <p class="font-light msg-button cursor-pointer">X</p>
                </div>
            @endif
            <h1 class="font-semibold text-[30px] my-5">Welcome, {{ ($user->roles_id == 2) ? "Chef " . $user->nama : $user->nama}}</h1>
            <div class="flex flex-wrap gap-9">
                @if(count($resep) != 0)
                    @include('components.cards')
                @endif
            </div>
        </div>
    </section>
@endsection
