@extends('layouts.master')

@section('title', isset($title))

@section('content')
<div class="flex h-screen">
    <div class="flex h-full">

        <!-- Sidebar -->
        <aside id="sidebar" class="bg-Primary text-white h-full flex flex-col transform transition-all duration-300 lg:w-64 lg:min-w-[64px] lg:max-w-[240px] w-16">
            <!-- Logo + Hamburger -->
            <div class="flex items-center justify-between py-4 px-6">
                <div class="flex items-center w-full">
                    <div class="font-bold text-lg flex-1">SIMS</div>
                    <button id="hamburger-btn" class="focus:outline-none">
                        <!-- Hamburger Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="flex-1">
                <ul>
                    <li class="flex items-center px-4 py-3 hover:bg-red-600 group">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 mr-4 group-hover:text-gray-200">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V11M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                        <span class="hidden lg:block group-hover:text-gray-200">Produk</span>
                    </li>
                    <li class="flex items-center px-4 py-3 hover:bg-red-600 group">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 mr-4 group-hover:text-gray-200">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 3h4v4H5V3zm7 0h4v4h-4V3zM5 9h4v4H5V9zm7 0h4v4h-4V9zM5 15h4v4H5v-4zm7 0h4v4h-4v-4z" />
                        </svg>
                        <span class="hidden lg:block group-hover:text-gray-200">Profil</span>
                    </li>
                    <li class="flex items-center px-4 py-3 hover:bg-red-600 group">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 mr-4 group-hover:text-gray-200">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25m0 13.5V15m3-3h-4.5m-4.5 0H5.25m2.25-5.25H7.5v9M6.75 9H4.5m8.25-3.75h5.25m-9.75 13.5H7.5M6.75 15h6M9 18.75H7.5M12.75 18.75H10.5M12 12H5.25" />
                        </svg>
                        <span class="hidden lg:block group-hover:text-gray-200">Logout</span>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Header -->
            <header class="bg-white shadow-lg p-4 flex items-center justify-between">
                <h1 class="text-lg font-bold">Dashboard</h1>
            </header>

            <!-- Main Content -->
            <main id="main-content" class="flex-1 p-6 bg-white">
                <h1 class="text-2xl font-bold mb-4">Dashboard</h1>
                <p>Selamat datang di halaman dashboard.</p>
            </main>
        </div>
    </div>
</div>

<script>
    const sidebar = document.getElementById('sidebar');
    const hamburgerBtn = document.getElementById('hamburger-btn');

    // Toggle Sidebar
    hamburgerBtn.addEventListener('click', () => {
        if (sidebar.classList.contains('lg:w-64')) {
            sidebar.classList.replace('lg:w-64', 'w-16');
            Array.from(sidebar.querySelectorAll('span')).forEach(el => el.classList.add('hidden'));
        } else {
            sidebar.classList.replace('w-16', 'lg:w-64');
            Array.from(sidebar.querySelectorAll('span')).forEach(el => el.classList.remove('hidden'));
        }
    });
</script>
@endsection
