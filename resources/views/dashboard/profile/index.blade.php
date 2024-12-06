@extends('layouts.dashboard')

@section('title', 'Profile')

@section('core')
<div class="bg-white rounded-lg w-full">
    <div class="flex flex-col items-start relative mt-2">
        <div class="relative group">
            <div class="w-28 h-28 rounded-full overflow-hidden border-2 border-gray-300">
                <img src="{{ asset('/assets/IlhamNurUtomo_Foto_Bekasi.png') }}" alt="avatart" id="avatar-preview" class="w-full h-full object-cover" width="15px" height="15px">
            </div>
            <label for="upload-image" class="absolute bottom-0 border border-gray-300 right-0 bg-white p-1 rounded-full text-gray-500 shadow-lg cursor-pointer group-hover:bg-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                    <path fill-rule="evenodd" d="M11.013 2.513a1.75 1.75 0 0 1 2.475 2.474L6.226 12.25a2.751 2.751 0 0 1-.892.596l-2.047.848a.75.75 0 0 1-.98-.98l.848-2.047a2.75 2.75 0 0 1 .596-.892l7.262-7.261Z" clip-rule="evenodd" />
                </svg>
            </label>
            <input type="file" id="upload-image" class="hidden" accept="image/*" onchange="previewImage(event)">
        </div>
        <h2 class="mt-4 text-lg font-semibold text-gray-700">Ilham Nur Utomo</h2>
    </div>
    <div class="mt-6">
        <form action="#">
            <div class="grid grid-cols-3 gap-4">
                <div class="col-span-2">
                    <label for="nama" class="block text-gray-600 text-sm font-semibold mb-2">Nama Kandidat</label>
                    <div class="inline-flex border items-center rounded-md py-2.5 px-4 w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                        </svg>
                        <span class="text-sm text-gray-700 pl-2">Ilham Nur Utomo</span>
                    </div>
                </div>
                <div>
                    <label for="posisi" class="block text-gray-600 text-sm font-semibold mb-2">Posisi Kandidat</label>
                    <div class="inline-flex border items-center rounded-md py-2.5 px-4 w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                            <path fill-rule="evenodd" d="M4.78 4.97a.75.75 0 0 1 0 1.06L2.81 8l1.97 1.97a.75.75 0 1 1-1.06 1.06l-2.5-2.5a.75.75 0 0 1 0-1.06l2.5-2.5a.75.75 0 0 1 1.06 0ZM11.22 4.97a.75.75 0 0 0 0 1.06L13.19 8l-1.97 1.97a.75.75 0 1 0 1.06 1.06l2.5-2.5a.75.75 0 0 0 0-1.06l-2.5-2.5a.75.75 0 0 0-1.06 0ZM8.856 2.008a.75.75 0 0 1 .636.848l-1.5 10.5a.75.75 0 0 1-1.484-.212l1.5-10.5a.75.75 0 0 1 .848-.636Z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-sm text-gray-700 pl-2">Website Programmer</span>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function () {
            const preview = document.getElementById('avatar-preview');
            preview.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>