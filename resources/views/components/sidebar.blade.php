<div x-data="{ sidebarOpen: false, userMenuOpen: false }">
    <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200">
        <div class="px-3 py-3 lg:px-5 lg:pl-3 flex items-center justify-between">
            <div class="flex items-center justify-start">
                <!-- Toggle sidebar button -->
                <button @click="sidebarOpen = !sidebarOpen" aria-controls="logo-sidebar"
                    :aria-expanded="sidebarOpen.toString()" type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>
                <a href="/dashboard" class="flex ms-2 md:me-24">
                    <span
                        class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap text-gray-900">Targetin</span>
                </a>
            </div>

            <div class="flex items-center">
                <div class="relative" x-data="{ open: false }">
                    <!-- Tombol profil -->
                    <button @click="open = !open" type="button"
                        class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 focus:outline-none"
                        aria-expanded="false" aria-haspopup="true">
                        <span class="sr-only">Open user menu</span>
                        <div
                            class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                            <span class="font-medium text-gray-600 dark:text-gray-300">{{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                            </span>
                        </div>
                    </button>

                    <!-- Dropdown menu -->
                    <div x-show="open" @click.away="open = false" x-transition
                        class="absolute right-0 top-full mt-2 w-48 bg-white rounded-sm shadow-lg z-50"
                        style="display: none;">
                        <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign
                            out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    </div>
                </div>

            </div>
    </nav>

    <!-- Mobile overlay -->
    <div x-show="sidebarOpen" x-transition.opacity class="fixed inset-0 z-30 bg-black/40 sm:hidden"
        @click="sidebarOpen = false" style="display: none;"></div>

    <!-- Sidebar -->
    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" @keydown.escape.window="sidebarOpen = false"
        id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 bg-white border-r border-gray-200 transition-transform duration-200 ease-in-out sm:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="/dashboard" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                        {{-- <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21"
                            aria-hidden="true">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg> --}}
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="/tambah" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                        {{-- <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21"
                            aria-hidden="true">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg> --}}
                        <span class="ms-3">Tambah Goal</span>
                    </a>
                </li>
                <li>
                    <a href="/kelola" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                        {{-- <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21"
                            aria-hidden="true">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg> --}}
                        <span class="ms-3">Kelola</span>
                    </a>
                </li>
                <li>
                    <a href="/riwayat" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                        {{-- <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21"
                            aria-hidden="true">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg> --}}
                        <span class="ms-3">Riwayat</span>
                    </a>
                </li>
                <li>
                    <a href="/tambahTask"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                        {{-- <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21"
                            aria-hidden="true">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg> --}}
                        <span class="ms-3">Tugas</span>
                    </a>
                </li>
                <li>
                    <a href="/tambahReminder"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                        {{-- <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21"
                            aria-hidden="true">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg> --}}
                        <span class="ms-3">Pengingat</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <!-- Content -->
    <div class="p-4 sm:ml-64">
        <div class="p-4 mt-14">
            {{ $slot }}
        </div>
    </div>

</div>
