@extends('templates.template')

@section('content')
    <section class="lg:py-10">
        <a href="{{ route('resep.list') }}" class="mt-5 mb-7 ml-5 rotate-180 text-primary border border-primary hover:bg-primary hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center md:absolute md:top-5 md:left-5 md:mt-0 md:mb-0 md:ml-0 lg:top-10 lg:left-10">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </a>
        <div class="container flex px-[25px] -mt-[20px] justify-center items-center min-h-[100vh] sm:-mt-[60px] md:mt-[20px] lg:-mt-0 lg:px-0">
            <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-2xl shadow-md sm:p-6 md:p-8">
                <form action="{{ route('chef.create', ['id' => session()->get('idUser')]) }}" method="POST" class="space-y-6" action="#">
                    @csrf
                    <h5 class="text-3xl uppercase font-medium text-gray-900 text-center">Daftar Chef</h5>
                    <div>
                        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 ">Nama</label>
                        <input type="nama" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukan nama ..." required autocomplete="off">
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Email</label>
                        <input type="email" name="email" id="email" placeholder="Masukan Email ..." class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required autocomplete="off">
                    </div>
                    <div>
                        <label for="no_telepon" class="block mb-2 text-sm font-medium text-gray-900 ">No Telepon</label>
                        <input type="number" name="no_telepon" id="no_telepon" placeholder="081234567890" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required autocomplete="off">
                    </div>
                    <div>
                        <label for="tanggal_lahir" class="block mb-2 text-sm font-medium text-gray-900 ">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5" required autocomplete="off">
                    </div>
                    <div>
                        <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-900 ">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5" required>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <button type="submit" class="w-full text-white bg-primary hover:bg-primary/80 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Daftar</button>
                </form>
            </div>
        </div>
    </section>
@endsection