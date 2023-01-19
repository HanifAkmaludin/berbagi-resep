@extends('templates.template')

@section('title', 'Tambah Resep')
@section('content')
    <section class="pb-10 md:pt-12">
        <a href="{{ route('resep.list') }}" class="mt-5 mb-7 ml-5 rotate-180 text-primary border border-primary hover:bg-primary hover:text-white font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center md:absolute md:top-10 md:left-10 md:mt-0 md:mb-0 md:ml-0">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </a>
        <div class="container px-[25px] lg:px-0">
            <h1 class="font-semibold text-4xl leading-[40px] text-center mb-10">Tambah <span class="text-primary">Resep</span></h1>
            <div class="flex flex-col items-center">
                @if(session("success"))
                    <div class="msg-parent w-full md:w-[60%] lg:w-[40%] mx-auto flex justify-between items-center bg-green-500 py-3 px-4 mt-2 rounded-lg mb-4 text-white">
                        <h1 class="font-light"> {{ session("success") }}</h1>
                        <p class="font-light msg-button cursor-pointer">X</p>
                    </div>
                @endif
                <form action="{{ route('resep.create') }}" method="POST" enctype="multipart/form-data" class="flex flex-col p-7 gap-5 bg-white border border-gray-200 w-full rounded-3xl md:justify-between md:flex-row md:p-10 md:gap-10 lg:gap-0">
                    @csrf
                    <div>
                        <div class="mb-5">
                            <label for="nama_resep" class="block mb-2 text-base font-medium text-gray-900">Nama</label>
                            <input type="text" name="nama_resep" id="nama_resep" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500" placeholder="Masukan nama ...">
                        </div>
                        <div class="mb-5">
                            <label for="deskripsi" class="block mb-2 text-base font-medium text-gray-900">Deskripsi</label>
                            <textarea id="deskripsi" name="deskripsi" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Tulisankan Deskripsi ..."></textarea>
                        </div>
                        <div class="mb-5">
                            <label for="foto_resep" class="block mb-2 text-base font-medium text-gray-900">Foto</label>
                            <input type="file" name="foto_resep" id="foto_resep" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none file:bg-red-400 file:border-none file:text-white file:py-2 file:px-3">
                        </div>
                        <div class="mb-5">
                            <label for="pengeluaran_masak" class="block mb-2 text-base font-medium text-gray-900">Pengeluaran Masak</label>
                            <input type="number" name="pengeluaran_masak" id="pengeluaran_masak" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500" placeholder="Contoh : Rp.100000">
                        </div>
                        <div class="flex flex-col">
                            <label for="bahan_bahan" class="block mb-2 text-base font-medium text-gray-900">Bahan-Bahan</label>
                            <div class="flex mt-3 mb-3">
                                <label for="takaran" class="inline-block w-[40%] mb-2 text-sm font-medium text-gray-900">Takaran</label>
                                <label for="bahan_bahan" class="inline-block w-[60%] mb-2 text-sm font-medium text-gray-900">Nama Bahan</label>
                            </div>
                            <div class="form-bahan flex flex-col gap-4">
                                <div class="input-bahan flex gap-3 w-full">
                                    <input type="text" name="takaran[]" id="takaran" placeholder="1 st" class="block w-[30%] p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500">
                                    <input type="text" name="nama_bahan[]" id="nama_bahan" placeholder="gula" class="border border-red-400 block w-[70%] p-2 text-gray-900 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500">
                                    <span class="close-button cursor-pointer text-white flex justify-center items-center bg-primary py-1 px-3 rounded-lg hover:bg-primary/80">X</span>
                                </div>
                                <div class="input-bahan flex gap-3 w-full">
                                    <input type="text" name="takaran[]" id="takaran" placeholder="3 butir" class="block w-[30%] p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500">
                                    <input type="text" name="nama_bahan[]" id="nama_bahan" placeholder="telor" class="border border-red-400 block w-[70%] p-2 text-gray-900 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500">
                                    <span class="close-button cursor-pointer text-white flex justify-center items-center bg-primary py-1 px-3 rounded-lg hover:bg-primary/80">X</span>
                                </div>
                                <div class="input-bahan flex gap-3 w-full">
                                    <input type="text" name="takaran[]" id="takaran" placeholder="1/2 kg" class="block w-[30%] p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500">
                                    <input type="text" name="nama_bahan[]" id="nama_bahan" placeholder="ayam" class="border border-red-400 block w-[70%] p-2 text-gray-900 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500">
                                    <span class="close-button cursor-pointer text-white flex justify-center items-center bg-primary py-1 px-3 rounded-lg hover:bg-primary/80">X</span>
                                </div>
                            </div>
                            <a href="#" class="tambah-bahan rounded-[50px] bg-primary font-medium text-sm leading-[22px] w-[150px] h-[30px] flex items-center justify-center text-white hover:bg-primary/80 duration-300 mt-[30px]">Tambah bahan + </a>
                        </div>
                    </div>
                    <div>
                        <div>
                            <label for="langkah_langkah" class="block mb-2 text-base font-medium text-gray-900">Langkah-Langkah</label>
                            <div class="form-langkah-langkah flex flex-col gap-3">
                                <div class="input-langkah-langkah flex gap-4">
                                    <input type="text" name="langkah_langkah[]" id="langkah_langkah" placeholder="Tulis langkah-langkah pembuatan resep disini ..." class="block w-[70%] p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500">
                                    <input type="file" name="foto_cara_pembuatan[]" id="foto_cara_pembuatan" class="block w-[30%] text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none file:h-full file:bg-red-400 file:border-none file:text-white file:py-2 file:px-3">
                                    <span class="close-button cursor-pointer text-white flex justify-center items-center bg-primary py-1 px-3 rounded-lg hover:bg-primary/80">X</span>
                                </div>
                                <div class="input-langkah-langkah flex gap-4">
                                    <input type="text" name="langkah_langkah[]" id="langkah_langkah" placeholder="Tulis langkah-langkah pembuatan resep disini ..." class="block w-[70%] p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500">
                                    <input type="file" name="foto_cara_pembuatan[]" id="foto_cara_pembuatan" class="block w-[30%] text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none file:h-full file:bg-red-400 file:border-none file:text-white file:py-2 file:px-3">
                                    <span class="close-button cursor-pointer text-white flex justify-center items-center bg-primary py-1 px-3 rounded-lg hover:bg-primary/80">X</span>
                                </div>
                                <div class="input-langkah-langkah flex gap-4">
                                    <input type="text" name="langkah_langkah[]" id="langkah_langkah" placeholder="Tulis langkah-langkah pembuatan resep disini ..." class="block w-[70%] p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500">
                                    <input type="file" name="foto_cara_pembuatan[]" id="foto_cara_pembuatan" class="block w-[30%] text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none file:h-full file:bg-red-400 file:border-none file:text-white file:py-2 file:px-3">
                                    <span class="close-button cursor-pointer text-white flex justify-center items-center bg-primary py-1 px-3 rounded-lg hover:bg-primary/80">X</span>
                                </div>
                            </div>
                            <a href="#" class="tambah-cara-pembuatan rounded-[50px] bg-primary font-medium text-sm leading-[22px] w-[230px] h-[30px] flex items-center justify-center text-white hover:bg-primary/80 duration-300 mt-[30px]">Tambah Cara Pembuatan +</a>
                        </div>
                        <div class="mt-10 mb-7">
                            <label for="nama_kategori" class="block mb-2 text-base font-medium text-gray-900">Kategori</label>
                            <input type="text" name="nama_kategori" id="nama_kategori" placeholder="Contoh : Cepat Saji" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <button type="submit" class="text-white bg-primary hover:bg-primary/80 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('click', function(e){
            if(e.target.classList.contains('tambah-bahan')){
                const formParentInput = document.querySelector('.form-bahan');
                const parentInput = formParentInput.lastElementChild;
                const clone = parentInput.cloneNode(true);
                clone.children[0].value = "";
                clone.children[1].value = "";
                if(clone.classList.contains('hidden')){
                    clone.classList.remove('hidden');
                }
                formParentInput.appendChild(clone);
            }

            if(e.target.classList.contains('close-button')){
                const parentInputElement = e.target.parentElement;
                parentInputElement.classList.add('hidden');
            }

            if(e.target.classList.contains('tambah-cara-pembuatan')){
                const formParentInput = document.querySelector('.form-langkah-langkah');
                const parentInput = formParentInput.lastElementChild;
                const clone = parentInput.cloneNode(true);
                clone.children[0].value = "";
                clone.children[1].value = "";
                if(clone.classList.contains('hidden')){
                    clone.classList.remove('hidden');
                }
                formParentInput.appendChild(clone);
            }

            if(e.target.classList.contains('close-button')){
                const parentInputElement = e.target.parentElement;
                parentInputElement.classList.add('hidden');
            }
        })
        const msgButton = document.querySelector('.msg-button');
        const msgParent = document.querySelector('.msg-parent');
        msgButton.addEventListener('click', function(){
            msgParent.classList.add('hidden');
        });
    </script>
@endsection

{{-- // parentInput.insertAdjacentHTML('afterend', clone);
// const lastElementInput = parentInput.lastElementChild;
// let elementInput = document.createElement('input');
// elementInput.setAttribute('type', 'text');
// elementInput.setAttribute('name', `bahan_bahan_${++i}`);
// elementInput.setAttribute('id', `bahan_bahan_${i}`);
// elementInput.setAttribute('placeholder', `Contoh : 1/2 kg ayam`);
// console.log(lastElementInput);
// parentInput.appendChild(elementInput);
// const elementInput = document.querySelector(`.input-bahan input`);
// const parentInput = elemetInput.parentElement;
// elementInput.appendAfter(elemetInput);
// const previousElement = tambahBahan.previousElementSibling;
// const newElement = `${previousElement}`;
// previousElement.setAttribute("name", `bahan_bahan_${++i}`);
// inputElement.insertAdjacentHTML('afterend', newElement);
// console.log(previousElement); --}}
{{-- 
// const tambahBahan = document.querySelector('.tambah-bahan');
// const formParentInput = document.querySelector('.form-bahan');
// const parentInput = formParentInput.lastElementChild;
// let i = 0;
// tambahBahan.addEventListener('click', function() {
//     const clone = parentInput.cloneNode(true);
//     formParentInput.appendChild(clone);
//     console.log(clone);
// }); --}}

{{--         // const buttonClose = document.querySelectorAll('.form-bahan .input-bahan .close-button-bahan');
        // buttonClose.forEach((btn) => {
        //     btn.addEventListener('click', function(){
        //         const parentElementClose = btn.parentElement;
        //         parentElementClose.classList.add('hidden');
        //     });
        // }) --}}


