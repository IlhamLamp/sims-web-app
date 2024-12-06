@extends('layouts.master')

@section('title', isset($title))

@section('content')
<div class="flex h-screen">
    <div class="flex h-full w-full">
        <aside id="sidebar" class="bg-Primary text-white h-full flex flex-col transform transition-all duration-300 lg:w-56 lg:min-w-[60px] lg:max-w-[240px] w-20">

            <div class="flex items-center justify-between p-4 my-4">
                <div class="flex items-center w-full">
                    <div class="flex flex-row justify-start items-center gap-2 flex-1">
                        <img src="{{ asset('/assets/Handbag.png') }}" alt="handbag-icon" width="20px" height="20px">
                        <h1 class="text-sm font-semibold text-center">SIMS Web App</h1>
                    </div>
                    <button id="hamburger-btn" class="focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="flex-1">
                <ul>
                    <li class="flex items-center px-4 py-3 hover:bg-red-600 group">
                        <img src="{{ asset('/assets/Package.png') }}" alt="handbag-icon" width="20px" height="20px">
                        <span class="pl-2 text-sm hidden lg:block group-hover:text-gray-200">Produk</span>
                    </li>
                    <li class="flex items-center px-4 py-3 hover:bg-red-600 group">
                        <img src="{{ asset('/assets/User.png') }}" alt="handbag-icon" width="20px" height="20px">
                        <span class="pl-2 text-sm hidden lg:block group-hover:text-gray-200">Profil</span>
                    </li>
                    <li class="flex items-center px-4 py-3 hover:bg-red-600 group">
                        <img src="{{ asset('/assets/SignOut.png') }}" alt="handbag-icon" width="20px" height="20px">
                        <span class="pl-2 text-sm hidden lg:block group-hover:text-gray-200">Logout</span>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex">
            <section class="flex-1 w-full p-6">
                @yield('core')
            </section>
        </div>
    </div>
</div>

<script>
    const sidebar = document.getElementById('sidebar');
    const hamburgerBtn = document.getElementById('hamburger-btn');

    // Toggle Sidebar
    hamburgerBtn.addEventListener('click', () => {
        if (sidebar.classList.contains('lg:w-56')) {
            sidebar.classList.replace('lg:w-56', 'w-20');
            Array.from(sidebar.querySelectorAll('span')).forEach(el => el.classList.add('hidden'));
        } else {
            sidebar.classList.replace('w-20', 'lg:w-56');
            Array.from(sidebar.querySelectorAll('span')).forEach(el => el.classList.remove('hidden'));
        }
    });
</script>
@endsection
