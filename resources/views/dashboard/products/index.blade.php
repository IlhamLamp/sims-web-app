@extends('layouts.dashboard')

@section('title', 'Produk')

@section('core')
<div class="bg-white rounded-lg w-full">
    <h1 class="text-xl font-bold text-gray-700 mt-2 mb-4">Daftar Produk</h1>

    <div class="flex items-center justify-between mx-auto mb-4">
        {{-- SEARCH FILTER --}}
        <div class="flex justify-start gap-6">
            <div class="flex items-center border-2 py-2 px-3 rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
                <input class="pl-2 outline-none border-none text-sm text-gray-700" type="text" name="search-produk" value="" placeholder="Cari barang" required/>
            </div>
            <div class="relative inline-block text-left">
                <div class="group">
                    <button type="button"
                        class="inline-flex items-center justify-between gap-8 py-2 px-3 border-2 border-gray-700 font-medium text-gray-800 bg-white focus:outline-none focus:ring-gray-800 rounded-md">
                        <div class="inline-flex">
                            <img src="{{ asset('/assets/Package.png') }}" alt="package-icon" width="15px" height="15px" class="invert">
                            <span class="text-sm pl-2 text-center">Semua</span>
                        </div>
                        <svg class="w-4 h-4 ml-2 -mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 12l-5-5h10l-5 5z" />
                        </svg>
                    </button>
                    <div class="absolute left-0 w-40 mt-1 origin-top-left bg-white divide-y divide-gray-100 rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition duration-300">
                        <div class="py-1">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Option 1</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Option 2</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Option 3</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- EXPORT, ADD --}}
        <div class="flex justify-end gap-6">
            <button type="button" class="inline-flex gap-2 items-center justify-between py-2 px-3 border border-transparent text-base font-medium rounded-md text-white bg-green-700 hover:bg-green-800">
                <img src="{{ asset('/assets/MicrosoftExcelLogo.png') }}" alt="handbag-icon" width="15px" height="15px">
                <span class="text-sm text-center">Export Excel</span>
            </button>
            <button type="button" class="inline-flex gap-2 items-center justify-between py-2 px-3 border border-transparent text-base font-medium rounded-md text-white bg-red-700 hover:bg-red-800">
                <img src="{{ asset('/assets/PlusCircle.png') }}" alt="handbag-icon" width="15px" height="15px">
                <span class="text-sm text-center">Tambah Produk</span>
            </button>
        </div>
    </div>

    {{-- TABLE DATA --}}
    <div class="border border-gray-200 rounded-md overflow-hidden">
        <table class="table-auto min-w-full border-collapse border">
            <thead>
                <tr class="bg-gray-100">
                    <th class="text-gray-600 font-medium text-sm px-4 py-2">No</th>
                    <th class="text-gray-600 font-medium text-sm px-4 py-2">Image</th>
                    <th class="text-gray-600 font-medium text-sm px-4 py-2">Nama Produk</th>
                    <th class="text-gray-600 font-medium text-sm px-4 py-2">Kategori Produk</th>
                    <th class="text-gray-600 font-medium text-sm px-4 py-2">Harga Beli (Rp)</th>
                    <th class="text-gray-600 font-medium text-sm px-4 py-2">Harga Jual (Rp)</th>
                    <th class="text-gray-600 font-medium text-sm px-4 py-2">Stok Produk</th>
                    <th class="text-gray-600 font-medium text-sm px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="px-4 py-2 text-sm text-gray-800 text-center">1</td>
                    <td class="px-4 py-2 text-sm text-gray-800 text-center">
                        <img src="https://via.placeholder.com/40" alt="Produk 1" class="mx-auto">
                    </td>
                    <td class="px-4 py-2 text-sm text-gray-800 text-center">Jersey Liverpool</td>
                    <td class="px-4 py-2 text-sm text-gray-800 text-center">Alat Olahraga</td>
                    <td class="px-4 py-2 text-sm text-gray-800 text-center">1,250,000</td>
                    <td class="px-4 py-2 text-sm text-gray-800 text-center">1,625,000</td>
                    <td class="px-4 py-2 text-sm text-gray-800 text-center">120</td>
                    <td class="px-4 py-2 text-sm text-gray-800 text-center space-x-4">
                        <button type="button" class="text-blue-500 hover:underline">
                            <img src="{{ asset('/assets/edit.png') }}" alt="handbag-icon" width="15px" height="15px">
                        </button>
                        <button type="button" class="text-blue-500 hover:underline">
                            <img src="{{ asset('/assets/delete.png') }}" alt="handbag-icon" width="15px" height="15px">
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="flex justify-between items-center mt-2">
        <span class="text-sm text-gray-600">Show 10 from 50</span>
        <div class="flex justify-center items-center">
            <nav class="relative z-0 inline-flex -space-x-px" aria-label="Pagination">
                <a href="#"
                    class="relative inline-flex items-center px-2 py-2 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                    <span class="sr-only">Previous</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                </a>
                <a href="#"
                    class="relative inline-flex items-center px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">1</a>
                <a href="#"
                    class="relative inline-flex items-center px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">2</a>
                <span
                    class="relative inline-flex items-center px-4 py-2 bg-white text-sm font-medium text-gray-700">...</span>
                <a href="#"
                    class="relative inline-flex items-center px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">8</a>
                <a href="#"
                    class="relative inline-flex items-center px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">9</a>
                <a href="#"
                    class="relative inline-flex items-center px-2 py-2 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                    <span class="sr-only">Next</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </a>
            </nav>
        </div>
    </div>
</div>
@endsection
