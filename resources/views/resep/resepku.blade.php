@extends('templates.template')

@section('title', "ResepKu")
@section('content')
    @include('components.navbar')
    <section class="pt-[90px] px-[25px] md:pt-[100px]">
        <div class="container">
            <h1 class="font-semibold text-[30px] my-5">ResepKu</h1>
            @if(session("success"))
                <div class="msg-parent w-full md:w-[60%] lg:w-[40%] mx-auto flex justify-between items-center bg-primary py-3 px-4 mb-5 rounded-lg text-white">
                    <h1 class="font-light"> {{ session("success") }}</h1>
                    <p class="font-light msg-button cursor-pointer">X</p>
                </div>
            @endif
            <div class="flex flex-wrap gap-9 justify-center sm:justify-start">
                @if(count($resep) != 0)
                    @include('components.cards')
                @endif
            </div>
        </div>
    </section>
    {{-- <script>
        const msgButton = document.querySelector('.msg-button');
        const msgParent = document.querySelector('.msg-parent');
        msgButton.addEventListener('click', function(){
            msgParent.classList.add('hidden');
        });
    </script> --}}
@endsection