@extends('layouts.master')

@section('title', 'Login')

@section('content')
<div class="flex h-screen overflow-y-hidden">
    {{-- LEFT --}}
    <div class="w-1/2 flex flex-col justify-center items-center bg-white">
        <div class="max-w-md w-full px-6">
            <div class="flex flex-row justify-center items-center gap-2 mb-6">
                <img src="{{ asset('/assets/Handbag.png') }}" alt="handbag-icon" class="w-5 h-5 filter redHandbag" width="20px" height="20px">
                <h1 class="text-xl text-gray-600 font-semibold text-center">SIMS Web App</h1>
            </div>
            <span class="flex mx-auto items-center text-center justify-center w-[250px]">
                <p class="text-2xl font-semibold text-gray-700 mb-8">Masuk atau buat akun untuk memulai</p>
            </span>
            <form action="/api/login" method="POST">
                @csrf
                <div class="flex items-center border-2 py-2.5 px-3 rounded-md mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                    </svg>
                    <input class="pl-2 outline-none border-none w-full text-sm text-gray-700" type="email" name="email" value="" placeholder="masukan email anda" required/>
                </div>
                <div class="flex items-center border-2 py-2.5 px-3 rounded-md mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                    </svg>
                    <input class="pl-2 outline-none border-none w-full text-sm text-gray-700" type="password" name="password" id="" placeholder="masukan password anda" required/>
                </div>
                <button type="submit"
                        class="w-full px-2 py-3 bg-Primary text-white text-sm font-medium rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500">
                    Masuk
                </button>
            </form>
        </div>
    </div>
    {{-- RIGHT --}}
    <div class="w-1/2 bg-[#F13B2F] flex items-center justify-center">
        <img src="/assets/Frame 98699.png" alt="Illustration" class="w-3/4">
    </div>
</div>

{{-- <script>
    document.getElementById("login-form").addEventListener("submit", function(event) {
        event.preventDefault();

        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;

        fetch('/api/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                email: email,
                password: password
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                localStorage.setItem('jwt', data.token);
                window.location.href = '/dashboard';
            } else {
                alert(data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan, coba lagi nanti.');
        });
    });
</script> --}}
@endsection
