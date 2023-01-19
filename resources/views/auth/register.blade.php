@extends('templates.template')

@section('title', 'Register')
@section('content')
<section class="">
    <a href="{{ route('homepage') }}" class="mt-5 mb-7 ml-5 rotate-180 text-primary border border-primary hover:bg-primary hover:text-white font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center md:absolute md:mt-0 md:mb-0 md:ml-0 lg:top-10 lg:left-10">
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </a>
    <div class="container flex px-[25px] -mt-[90px] justify-center items-center min-h-[100vh] sm:-mt-[60px] md:mt-[20px] lg:-mt-0 lg:px-0">
        <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-2xl shadow-md sm:p-6 md:p-8">
            <form action="{{ route('signup') }}" method="POST" class="space-y-6" action="#">
                @csrf
                <h5 class="text-3xl uppercase font-medium text-gray-900 text-center">Register</h5>
                @if($errors->any())
                    <div class="msg-parent flex justify-between items-center bg-primary py-3 px-4 mt-5 rounded-lg mb-4 text-white">
                        <h1 class="font-light text-sm">{{$errors->first()}}</h1>
                        <p class="font-light msg-button cursor-pointer">X</p>
                    </div>
                @endif
                <div>
                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                    <input type="nama" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukan nama ...." required autocomplete="off">
                </div>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                    <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukan email ..." required autocomplete="off">
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Your password</label>
                    <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required autocomplete="off">
                </div>
                <button type="submit" class="w-full text-white bg-primary hover:bg-primary/80 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Register</button>
                <div class="text-sm font-medium text-gray-500">
                    Already have an account? <a href="{{ route('login') }}" class="text-blue-700 hover:underline">Sign in</a>
                </div>
            </form>
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

