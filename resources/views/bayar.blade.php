@extends('guest_layout.guest_navbar')

@section('isi')
    @if (session()->has('payed'))
        <div class="fixed inset-x-0 top-20 pb-2 sm:pb-5 z-50">
            <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
                <div class="rounded-lg bg-indigo-600 p-2 shadow-lg sm:p-3">
                    <div class="flex flex-wrap relative items-center justify-between">
                        <div class="flex p-2 flex-1 items-center font-medium text-white">
                            <p>{{ session('payed') }}</p>
                        </div>
                        <button class="absolute -top-2 -right-2 hover:text-gray-100"
                            onclick="return this.parentNode.parentNode.parentNode.parentNode.remove();">
                            <span class="sr-only">Dismiss</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                                class="h-6 w-6 text-white">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="h-screen w-screen font-poppins flex justify-center items-center dark:bg-gray-900">
        <div class="grid gap-8">
            <div id="back-div" class="bg-gradient-to-r from-blue-500 to-purple-500 rounded-[26px] m-4">
                <div
                    class="border-[20px] border-transparent rounded-[20px] dark:bg-gray-900 bg-white shadow-lg xl:p-10 2xl:p-10 lg:p-10 md:p-10 sm:p-2 m-2">
                    <h1 class="pt-8 pb-6 font-bold dark:text-gray-400 text-3xl text-center cursor-default">FORM PEMBAYARAN
                    </h1>
                    <form action="{{ route('submitpembayaran') }}" method="post" class="space-y-4">
                        @csrf
                        @method('post')
                        <div>
                            <label for="no_meteran" class="mb-2 dark:text-gray-400 text-lg">Nomer Meteran</label>
                            <input id="no_meteran" name="no_meteran"
                                class="border p-3 mt-3 dark:bg-indigo-700 dark:text-gray-300  dark:border-gray-700 shadow-md placeholder:text-base focus:scale-105 ease-in-out duration-300 border-gray-300 rounded-lg w-full"
                                type="no_meteran" placeholder="Masukkan Nomer Meteran" required />
                        </div>
                        <button
                            class="bg-gradient-to-r dark:text-gray-300 from-blue-500 to-purple-500 shadow-lg mt-6 p-2 text-white rounded-lg w-full hover:scale-105 hover:from-purple-500 hover:to-blue-500 transition duration-300 ease-in-out"
                            type="submit">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
