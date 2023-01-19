@extends('templates.template')

@section('title', 'List Resep')
@section('content')
    @include('components.navbar')
    <section class="pt-[90px] px-[25px] md:pt-[100px]">
        <div class="container">
            @if(session("success"))
                <div class="msg-parent w-full md:w-[60%] lg:w-[40%] mx-auto flex justify-between items-center bg-green-500 py-3 px-4 mt-5 rounded-lg mb-4 text-white">
                    <h1 class="font-light"> {{ session("success") }}</h1>
                    <p class="font-light msg-button cursor-pointer">X</p>
                </div>
            @endif
            @if($errors->any())
                <div class="msg-parent w-full md:w-[60%] lg:w-[40%] mx-auto flex justify-between items-center bg-primary py-3 px-4 mt-5 rounded-lg mb-4 text-white">
                    <h1 class="font-light text-sm">{{$errors->first()}}</h1>
                    <p class="font-light msg-button cursor-pointer">X</p>
                </div>
            @endif
            <h1 class="font-semibold text-[30px] my-5">Welcome, {{ ($user->roles_id == 2) ? "Chef " . $user->nama : $user->nama}}</h1>
            <div class="flex flex-wrap gap-9 justify-center sm:justify-start">
                @if(count($resep) != 0)
                    @include('components.cards')
                @endif
            </div>
        </div>
    </section>
    <script>
        const msgButton = document.querySelector('.msg-button');
        const msgParent = document.querySelector('.msg-parent');
        msgButton.addEventListener('click', function(){
            msgParent.classList.add('hidden');
        });
    </script>
@endsection
