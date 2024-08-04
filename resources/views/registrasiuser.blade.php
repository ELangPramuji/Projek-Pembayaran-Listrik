@extends('admin_layout.admin_header')

@section('isi')
    <div class="h-screen w-screen my-4 font-poppins flex justify-center items-center dark:bg-gray-900">
        <div class="grid gap-8">
            <div id="back-div" class="bg-gradient-to-r from-blue-500 to-purple-500 rounded-[26px] m-4">
                <div
                    class="border-[20px] border-transparent rounded-[20px] dark:bg-gray-900 bg-white shadow-lg xl:p-10 2xl:p-10 lg:p-10 md:p-10 sm:p-2 m-2">
                    <h1 class="pb-6 font-bold dark:text-gray-400 text-4xl text-center cursor-default">Form Registrasi
                        Pelanggan</h1>
                    <form action="/registrasiuser" method="post" class="space-y-3">
                        @csrf
                        @method('post')
                        <div>
                            <label for="text" class="mb-2  dark:text-gray-400 text-lg">Nama Lengkap</label>
                            <input id="text" name="name"
                                class="border p-3 mt-3 dark:bg-indigo-700 dark:text-gray-300  dark:border-gray-700 shadow-md placeholder:text-base focus:scale-105 ease-in-out duration-300 border-gray-300 rounded-lg w-full"
                                type="text" placeholder="Masukkan Nama Lengkap" required />
                        </div>
                        <div>
                            <label for="email" class="mb-2 dark:text-gray-400 text-lg">Email</label>
                            <input id="email" name="email"
                                class="border p-3 mt-3 shadow-md dark:bg-indigo-700 dark:text-gray-300  dark:border-gray-700 placeholder:text-base focus:scale-105 ease-in-out duration-300 border-gray-300 rounded-lg w-full"
                                type="email" placeholder="Masukkan Email" required />
                        </div>
                        <div>
                            <label for="telepon" class="mb-2 dark:text-gray-400 text-lg">Nomor Telepon</label>
                            <input id="telepon" name="telepon"
                                class="border p-3 mt-3 shadow-md dark:bg-indigo-700 dark:text-gray-300  dark:border-gray-700 placeholder:text-base focus:scale-105 ease-in-out duration-300 border-gray-300 rounded-lg w-full"
                                type="number" placeholder="Masukkan Nomor Teleon" required />
                        </div>
                        <div>
                            <label for="alamat" class="mb-2 dark:text-gray-400 text-lg">Alamat</label>
                            <input id="alamat" name="alamat"
                                class="border p-3 mt-3 shadow-md dark:bg-indigo-700 dark:text-gray-300  dark:border-gray-700 placeholder:text-base focus:scale-105 ease-in-out duration-300 border-gray-300 rounded-lg w-full"
                                type="text" placeholder="Masukkan Alamat" required />
                        </div>
                        <input type="hidden" name="no_meteran">
                        <button
                            class="bg-gradient-to-r dark:text-gray-300 from-blue-500 to-purple-500 shadow-lg mt-6 p-2 text-white rounded-lg w-full hover:scale-105 hover:from-purple-500 hover:to-blue-500 transition duration-300 ease-in-out"
                            type="submit">
                            Registrasi
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

