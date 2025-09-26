<x-layout>
    <div class="p-6">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Riwayat & Laporan</h1>
                    <p class="text-gray-600 mt-2">Ringkasan pencapaian goal dan task yang telah diselesaikan</p>
                </div>
                {{-- <div class="flex space-x-3">
                    <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Export PDF
                    </button>
                    <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        Export Excel
                    </button>
                </div> --}}
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Completed Goals -->
            <div class="bg-gradient-to-r from-green-500 to-green-600 p-6 rounded-xl text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-green-100 text-sm font-medium">Goal Selesai</p>
                        <p class="text-3xl font-bold">{{ $completedGoals ?? 0 }}</p>
                    </div>
                    <div class="bg-green-400 bg-opacity-30 p-3 rounded-full">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
                <div class="mt-4">
                    <span class="text-green-100 text-sm">Total pencapaian</span>
                </div>
            </div>

            <!-- Total Completed Tasks -->
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-6 rounded-xl text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-blue-100 text-sm font-medium">Task Selesai</p>
                        <p class="text-3xl font-bold">{{ $completedTasks ?? 0 }}</p>
                    </div>
                    <div class="bg-blue-400 bg-opacity-30 p-3 rounded-full">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                        </svg>
                    </div>
                </div>
                <div class="mt-4">
                    <span class="text-blue-100 text-sm">Total task diselesaikan</span>
                </div>
            </div>

            <!-- Success Rate -->
            <div class="bg-gradient-to-r from-purple-500 to-purple-600 p-6 rounded-xl text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-purple-100 text-sm font-medium">Tingkat Keberhasilan</p>
                        <p class="text-3xl font-bold">{{ $successRate ?? 0 }}%</p>
                    </div>
                    <div class="bg-purple-400 bg-opacity-30 p-3 rounded-full">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                    </div>
                </div>
                <div class="mt-4">
                    <span class="text-purple-100 text-sm">Goal yang berhasil</span>
                </div>
            </div>

            <!-- Average Completion Time -->
            <div class="bg-gradient-to-r from-orange-500 to-orange-600 p-6 rounded-xl text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-orange-100 text-sm font-medium">Rata-rata Waktu</p>
                        <p class="text-3xl font-bold">{{ $avgCompletionDays ?? 0 }}</p>
                    </div>
                    <div class="bg-orange-400 bg-opacity-30 p-3 rounded-full">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
                <div class="mt-4">
                    <span class="text-orange-100 text-sm">Hari penyelesaian</span>
                </div>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="bg-white p-6 rounded-xl border border-gray-200 mb-8">
            <div class="flex flex-wrap items-center gap-4">
                <div class="flex items-center space-x-2">
                    <label class="text-sm font-medium text-gray-700">Periode:</label>
                    <select class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option>Semua Waktu</option>
                        <option>30 Hari Terakhir</option>
                        <option>3 Bulan Terakhir</option>
                        <option>6 Bulan Terakhir</option>
                        <option>Tahun Ini</option>
                    </select>
                </div>
                <div class="flex items-center space-x-2">
                    <label class="text-sm font-medium text-gray-700">Kategori:</label>
                    <select class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option>Semua Kategori</option>
                        <option>Kesehatan</option>
                        <option>Karir</option>
                        <option>Keuangan</option>
                        <option>Pendidikan</option>
                        <option>Hobi</option>
                    </select>
                </div>
                <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm">
                    Terapkan Filter
                </button>
            </div>
        </div>

        <!-- Completed Goals Section -->
        <div class="bg-white rounded-xl border border-gray-200 mb-8">
            <div class="p-6 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-900">Goal yang Telah Diselesaikan</h2>
                <p class="text-gray-600 mt-1">Daftar semua goal yang berhasil dicapai</p>
            </div>
            <div class="p-6">
                @if(isset($completedGoalsList) && count($completedGoalsList) > 0)
                    <div class="space-y-4">
                        @foreach($completedGoalsList as $goal)
                            <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                                <div class="flex items-start justify-between">
                                    <div class="flex-1">
                                        <div class="flex items-center space-x-3">
                                            <div class="bg-green-100 p-2 rounded-full">
                                                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <h3 class="font-semibold text-gray-900">{{ $goal->title }}</h3>
                                                <p class="text-sm text-gray-600">{{ $goal->description }}</p>
                                            </div>
                                        </div>
                                        <div class="mt-3 flex items-center space-x-6 text-sm text-gray-500">
                                            <span class="flex items-center">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                                </svg>
                                                {{ $goal->category }}
                                            </span>
                                            <span class="flex items-center">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 0h6m-6 0l-1 12a2 2 0 002 2h6a2 2 0 002-2L15 7M9 7h6"></path>
                                                </svg>
                                                {{ $goal->tasks->where('status', 'completed')->count() }}/{{ $goal->tasks->count() }} tasks
                                            </span>
                                            <span class="flex items-center">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                Selesai: {{ $goal->updated_at->format('d M Y') }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            Selesai
                                        </span>
                                        <p class="text-sm text-gray-500 mt-1">
                                            Durasi: {{ $goal->start_date->diffInDays($goal->updated_at) }} hari
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada goal yang diselesaikan</h3>
                        <p class="mt-1 text-sm text-gray-500">Mulai menyelesaikan goal Anda untuk melihat riwayat di sini</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Recent Completed Tasks Section -->
        <div class="bg-white rounded-xl border border-gray-200 mb-8">
            <div class="p-6 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-900">Task yang Baru Diselesaikan</h2>
                <p class="text-gray-600 mt-1">10 task terakhir yang berhasil diselesaikan</p>
            </div>
            <div class="p-6">
                @if(isset($recentCompletedTasks) && count($recentCompletedTasks) > 0)
                    <div class="space-y-3">
                        @foreach($recentCompletedTasks as $task)
                            <div class="flex items-center justify-between p-3 border border-gray-200 rounded-lg hover:bg-gray-50">
                                <div class="flex items-center space-x-3">
                                    <div class="bg-blue-100 p-1.5 rounded-full">
                                        <svg class="w-3 h-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900">{{ $task->title }}</p>
                                        <p class="text-sm text-gray-600">{{ $task->goal->title }}</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm text-gray-500">{{ $task->updated_at->format('d M Y') }}</p>
                                    <p class="text-xs text-gray-400">{{ $task->updated_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8">
                        <svg class="mx-auto h-8 w-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada task yang diselesaikan</h3>
                        <p class="mt-1 text-sm text-gray-500">Task yang diselesaikan akan muncul di sini</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Achievement Summary -->
        <div class="bg-gradient-to-r from-indigo-500 to-purple-600 rounded-xl p-8 text-white">
            <div class="text-center">
                <h2 class="text-2xl font-bold mb-4">🎉 Pencapaian Anda</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                    <div class="text-center">
                        <div class="text-3xl font-bold">{{ $totalGoals ?? 0 }}</div>
                        <div class="text-indigo-100">Total Goal</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold">{{ $totalTasks ?? 0 }}</div>
                        <div class="text-indigo-100">Total Task</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold">{{ $productivityScore ?? 0 }}%</div>
                        <div class="text-indigo-100">Skor Produktivitas</div>
                    </div>
                </div>
                <p class="mt-6 text-indigo-100">
                    Terus pertahankan semangat dan konsistensi dalam mencapai tujuan Anda! 💪
                </p>
            </div>
        </div>
    </div>
</x-layout>
