<x-layout>
    <!-- Success Message -->
    @if (session('success'))
        <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" onclick="this.parentElement.parentElement.style.display='none';">
                    <title>Close</title>
                    <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
                </svg>
            </span>
        </div>
    @endif

    <!-- Dashboard Header -->
    <div class="mb-8">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-3xl font-bold mb-2 text-gray-900 ">Hi, {{ auth()->user()->name }}</h1>
                <p class="mt-2 text-sm text-gray-600">Selamat datang kembali! Berikut adalah ringkasan aktivitas Anda.
                </p>
            </div>
            <div class="mt-4 sm:mt-0">
                <a href="/tambah">
                    <button
                        class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Tambah Data
                    </button>
                </a>
            </div>
        </div>
    </div>
    <!-- Stats Cards: Goals Overview -->
    <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mb-8">
        <!-- Jumlah goal total -->
        <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-blue-100 rounded-md flex items-center justify-center">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 7l6 6-6 6M21 7h-8m8 6h-8m8 6h-8" />
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Jumlah goal total</p>
                        <p class="text-2xl font-semibold text-gray-900">{{ $totalGoals ?? 0 }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jumlah goal selesai -->
        <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-green-100 rounded-md flex items-center justify-center">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Jumlah goal selesai</p>
                        <p class="text-2xl font-semibold text-gray-900">{{ $completedGoals ?? 0 }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jumlah goal belum selesai -->
        <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-yellow-100 rounded-md flex items-center justify-center">
                            <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Jumlah goal belum selesai</p>
                        <p class="text-2xl font-semibold text-gray-900">{{ $pendingGoals ?? 0 }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Progress bar (% pencapaian) -->
        <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
            <div class="p-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-purple-100 rounded-md flex items-center justify-center">
                                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12h18M3 6h18M3 18h18" />
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Progress pencapaian</p>
                            <p class="text-2xl font-semibold text-gray-900">{{ $progressPercent ?? 0 }}%</p>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="w-full bg-gray-200 rounded-full h-3">
                        <div class="bg-purple-600 h-3 rounded-full"
                            style="width: {{ min(100, max(0, $progressPercent ?? 0)) }}%"></div>
                    </div>
                    <div class="mt-1 text-xs text-gray-500">Target keseluruhan</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Goals List Card -->
    <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200 mb-8">
        <div class="p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-900">Daftar Goal</h3>
            </div>

            @if (!empty($recentGoals) && count($recentGoals) > 0)
                <ul class="divide-y divide-gray-200">
                    @foreach ($recentGoals as $goal)
                        @php
                            $isCompleted = ($goal->status ?? '') === 'completed';
                            $deadline = $goal->end_date ? \Carbon\Carbon::parse($goal->end_date) : null;
                            $overdue = $deadline ? now()->isAfter($deadline) && !$isCompleted : false;
                        @endphp
                        <li class="py-4">
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                                <div class="min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate">
                                        {{ $goal->title ?? ($goal->name ?? 'Tanpa Judul') }}</p>
                                    <p class="mt-1 text-sm {{ $overdue ? 'text-red-600' : 'text-gray-500' }}">
                                        Deadline:
                                        @if ($deadline)
                                            {{ $deadline->format('d M Y') }}
                                            @if ($overdue)
                                                • Terlewat
                                            @endif
                                        @else
                                            Tidak ditentukan
                                        @endif
                                    </p>
                                </div>
                                <div class="mt-2 sm:mt-0 flex items-center space-x-3">
                                    @if ($isCompleted)
                                        <span
                                            class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">Selesai</span>
                                    @else
                                        <span
                                            class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-800">On
                                            Progress</span>
                                    @endif
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="text-center py-8">
                    <svg class="mx-auto h-12 w-12 text-gray-300" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V4a2 2 0 10-4 0v1.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    <h4 class="mt-2 text-sm font-medium text-gray-900">Belum ada goal</h4>
                    <p class="mt-1 text-sm text-gray-500">Tambahkan goal baru untuk mulai melacak progres Anda.</p>
                </div>
            @endif
        </div>
    </div>
</x-layout>
