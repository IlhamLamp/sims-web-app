@extends('layouts.dashboard')

@section('title', 'Tambah Produk')

@section('core')

<div class="bg-white rounded-lg w-full">
    <h1 class="text-xl font-bold text-gray-700 mt-2 mb-4">Tambah Produk</h1>
    
    <!-- Form -->
    <div class="p-6 space-y-">
        <form action="#">
            <div class="grid grid-cols-3 gap-6">
                <div>
                    <label for="kategori" class="text-sm font-medium text-gray-900 block mb-2">Kategori</label>
                    <select name="kategori" id="kategori" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5" required>
                        <option value="" disabled selected>Pilih kategori</option>
                        <option value="Olahraga">Olahraga</option>
                        <option value="Elektronik">Elektronik</option>
                        <option value="Pakaian">Pakaian</option>
                    </select>
                </div>
                <div class="col-span-2">
                    <label for="nama" class="text-sm font-medium text-gray-900 block mb-2">Nama Barang</label>
                    <input type="text" name="nama" id="nama" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5" placeholder="Masukan nama barang" required="">
                </div>
                <div>
                    <label for="harga_beli" class="text-sm font-medium text-gray-900 block mb-2">Harga Beli</label>
                    <input type="number" name="harga_beli" id="harga_beli" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5" placeholder="Masukan harga beli" required="" oninput="validateNumberInput(this)">
                </div>
                <div>
                    <label for="harga_jual" class="text-sm font-medium text-gray-900 block mb-2">Harga Jual</label>
                    <input type="number" name="harga_jual" id="harga_jual" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5" placeholder="Masukan harga jual" required="" oninput="validateNumberInput(this)">
                </div>
                <div>
                    <label for="stok" class="text-sm font-medium text-gray-900 block mb-2">Stok</label>
                    <input type="number" name="stok" id="stok" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5" placeholder="Masukan jumlah stok barang" required="" oninput="validateNumberInput(this)">
                </div>
                <div class="col-span-3">
                    <label for="file-upload" name="file-upload" type="file" class="text-sm font-medium text-gray-900 block mb-2">Upload Image</label>
                    <div class="w-full relative border-2 border-blue-500 border-dashed p-6" id="dropzone">
                        <input type="file" class="absolute inset-0 w-full h-full opacity-0 z-50" />
                        <div class="flex flex-col text-center items-center justify-center">
                            <img src="{{ asset('/assets/Image.png') }}" alt="upload-icon" width="60px" height="60px">
                            <p class="mt-1 text-xs text-blue-500">
                                upload gambar disini
                            </p>
                        </div>
                        <img src="" alt="img" class="mt-4 mx-auto max-h-40 hidden" id="preview">
                    </div>
                </div>
            </div>
            <div class="text-right mt-4">
                <button
                    class="px-8 py-2 border border-blue-600 bg-white text-blue-600 text-sm font-medium rounded-md hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-700">
                    Batalkan
                </button>
                <button type="submit"
                    class="px-8 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

<script>
    function validateNumberInput(input) {
        let validateInput = input.value.replace(/[^0-9]/g, '');
        input.value = validateInput;
    }

    var dropzone = document.getElementById('dropzone');

    dropzone.addEventListener('dragover', e => {
        e.preventDefault();
        dropzone.classList.add('border-blue-500');
    });

    dropzone.addEventListener('dragleave', e => {
        e.preventDefault();
        dropzone.classList.remove('border-blue-500');
    });

    dropzone.addEventListener('drop', e => {
        e.preventDefault();
        dropzone.classList.remove('border-blue-500');
        var file = e.dataTransfer.files[0];
        displayPreview(file);
    });

    var input = document.getElementById('file-upload');

    input.addEventListener('change', e => {
        var file = e.target.files[0];
        displayPreview(file);
    });

    function displayPreview(file) {
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = () => {
            var preview = document.getElementById('preview');
            preview.src = reader.result;
            preview.classList.remove('hidden');
        };
    }
</script>