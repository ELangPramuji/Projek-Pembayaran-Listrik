@extends('admin_layout.admin_header')

@section('isi')
    @if (session()->has('Berhasil'))
        <div class="fixed inset-x-0 top-20 pb-2 sm:pb-5 z-50">
            <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
                <div class="rounded-lg bg-indigo-600 p-2 shadow-lg sm:p-3">
                    <div class="flex flex-wrap relative items-center justify-between">
                        <div class="flex p-2 flex-1 items-center font-medium text-white">
                            <p>{{ session('Berhasil') }}</p>
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
    <header class="shadow-md">
        <div class="mx-auto max-w-7xl px-2 py-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-extrabold tracking-tight text-black">Data Pelanggan</h1>
        </div>
    </header>
    <form action="/hero/search" method="GET">
        @csrf
        <div class="flex max-w-sm mx-auto mt-6">
            <input id="search" name="search"
                class="w-full py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                type="search" placeholder="Search">
            <button
                class="inset-y-0 right-0 flex items-center px-4 text-gray-700 bg-gray-100 border border-gray-300 rounded-r-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M14.795 13.408l5.204 5.204a1 1 0 01-1.414 1.414l-5.204-5.204a7.5 7.5 0 111.414-1.414zM8.5 14A5.5 5.5 0 103 8.5 5.506 5.506 0 008.5 14z" />
                </svg>
            </button>
        </div>
    </form>
    <div class="container mt-3 mx-auto px-4 sm:px-6 lg:px-8 py-8 bg-white">
        <table id="datapelanggan" class="table-auto w-full text-center">
            <thead>
                <tr class="border-6">
                    <th class="px-4 py-2">No</th>
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Nomor Meteran</th>
                    <th class="px-4 py-2">Nomor Telepon</th>
                    <th class="px-4 py-2">Alamat</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Update</th>
                    <th class="px-4 py-2">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                @foreach ($DataPelanggan as $semuadata)
                    <tr class="border-4">
                        <td class="px-4 py-2">{{ $no++ }}</td>
                        <td class="px-4 py-2">{{ $semuadata->name }}</td>
                        <td class="px-4 py-2">{{ $semuadata->email }}</td>
                        <td class="px-4 py-2">{{ $semuadata->no_meteran }}</td>
                        <td class="px-4 py-2">{{ $semuadata->telepon }}</td>
                        <td class="px-4 py-2">{{ $semuadata->alamat }}</td>
                        <td class="px-4 py-2">{{ $semuadata->status }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('ubahdata', $semuadata->id) }}"
                                class="flex items-center justify-center px-1 font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('hapusdata', $semuadata->id) }}">
                                @csrf
                                @method('delete')
                                <button type="submit"
                                    class="flex items-center justify-center px-1 font-medium text-blue-600 dark:text-blue-500 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
