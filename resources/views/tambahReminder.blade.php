<x-layout>
    <!-- Success/Error Messages -->
    @if (session('success'))
        <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @if (session('error'))
        <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    <!-- Header -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Kelola Reminder</h1>
                <p class="mt-2 text-sm text-gray-600">Atur pengingat untuk task-task penting Anda</p>
            </div>
            <div class="flex space-x-3">
                <button onclick="toggleReminderForm()" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 transition">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Tambah Reminder
                </button>
            </div>
        </div>
    </div>

    <!-- Add Reminder Form (Hidden by default) -->
    <div id="reminderForm" class="hidden mb-8 bg-white shadow-sm rounded-lg border border-gray-200">
        <div class="p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-medium text-gray-900">Tambah Reminder Baru</h2>
                <button onclick="toggleReminderForm()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <form method="POST" action="{{ route('reminders.store') }}" class="space-y-6">
                @csrf
                
                <!-- Task Selection -->
                <div>
                    <label for="task_id" class="block text-sm font-medium text-gray-700 mb-2">
                        Pilih Task <span class="text-red-500">*</span>
                    </label>
                    <select id="task_id" name="task_id" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('task_id') border-red-500 @enderror">
                        <option value="">Pilih Task</option>
                        @foreach($tasks as $task)
                            <option value="{{ $task->id }}" {{ old('task_id') == $task->id ? 'selected' : '' }}>
                                {{ $task->title }} ({{ $task->goal->title }})
                            </option>
                        @endforeach
                    </select>
                    @error('task_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Reminder Date and Time -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="reminder_date" class="block text-sm font-medium text-gray-700 mb-2">
                            Tanggal Reminder <span class="text-red-500">*</span>
                        </label>
                        <input type="date" id="reminder_date" name="reminder_date" value="{{ old('reminder_date') }}" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('reminder_date') border-red-500 @enderror">
                        @error('reminder_date')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="reminder_time" class="block text-sm font-medium text-gray-700 mb-2">
                            Waktu Reminder <span class="text-red-500">*</span>
                        </label>
                        <input type="time" id="reminder_time" name="reminder_time" value="{{ old('reminder_time', '09:00') }}" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('reminder_time') border-red-500 @enderror">
                        @error('reminder_time')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Method and Status -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="method" class="block text-sm font-medium text-gray-700 mb-2">Metode Reminder</label>
                        <select id="method" name="method" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('method') border-red-500 @enderror">
                            <option value="notification" {{ old('method', 'notification') == 'notification' ? 'selected' : '' }}>Notification</option>
                        </select>
                        @error('method')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <select id="status" name="status" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('status') border-red-500 @enderror">
                            <option value="pending" {{ old('status', 'pending') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="sent" {{ old('status') == 'sent' ? 'selected' : '' }}>Sent</option>
                        </select>
                        @error('status')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                    <button type="button" onclick="toggleReminderForm()" class="px-4 py-2 bg-white border border-gray-300 rounded-md text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-50 transition">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 border border-transparent rounded-md text-xs text-white uppercase tracking-widest hover:bg-blue-700 transition">Simpan Reminder</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="mb-6 bg-white shadow-sm rounded-lg border border-gray-200">
        <div class="p-4">
            <form method="GET" action="{{ route('reminders.index') }}" class="flex flex-wrap items-center gap-4">
                <!-- Search -->
                <div class="flex-1 min-w-64">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari reminder berdasarkan task..." class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                
                <!-- Task Filter -->
                <div class="min-w-48">
                    <select name="task_id" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Semua Task</option>
                        @foreach($tasks as $task)
                            <option value="{{ $task->id }}" {{ request('task_id') == $task->id ? 'selected' : '' }}>
                                {{ $task->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <!-- Status Filter -->
                <div class="min-w-32">
                    <select name="status" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Semua Status</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="sent" {{ request('status') == 'sent' ? 'selected' : '' }}>Sent</option>
                    </select>
                </div>
                
                <!-- Filter Buttons -->
                <div class="flex space-x-2">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Filter</button>
                    <a href="{{ route('reminders.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition">Reset</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Reminders List -->
    <div class="bg-white shadow-sm rounded-lg border border-gray-200">
        @if($reminders->count() > 0)
            <!-- Desktop Table View -->
            <div class="hidden md:block overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Task</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Goal</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal & Waktu</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Metode</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($reminders as $reminder)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $reminder->task->title }}</div>
                                    <div class="text-sm text-gray-500">{{ Str::limit($reminder->task->description, 50) }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $reminder->task->goal->title }}</div>
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium
                                        @if($reminder->task->goal->category == 'personal') bg-blue-100 text-blue-800
                                        @elseif($reminder->task->goal->category == 'work') bg-green-100 text-green-800
                                        @elseif($reminder->task->goal->category == 'health') bg-purple-100 text-purple-800
                                        @else bg-gray-100 text-gray-800 @endif">
                                        {{ ucfirst($reminder->task->goal->category) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $reminder->reminder_date->format('d M Y') }}</div>
                                    <div class="text-sm text-gray-500">{{ $reminder->reminder_date->format('H:i') }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                                        {{ ucfirst($reminder->method) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium
                                        @if($reminder->status == 'sent') bg-green-100 text-green-800
                                        @else bg-yellow-100 text-yellow-800 @endif">
                                        {{ ucfirst($reminder->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('reminders.edit', $reminder->reminder_id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        <form method="POST" action="{{ route('reminders.destroy', $reminder->reminder_id) }}" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus reminder ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Mobile Card View -->
            <div class="md:hidden">
                @foreach($reminders as $reminder)
                    <div class="p-4 border-b border-gray-200 last:border-b-0">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <h3 class="text-sm font-medium text-gray-900">{{ $reminder->task->title }}</h3>
                                <p class="text-sm text-gray-500 mt-1">{{ $reminder->task->goal->title }}</p>
                                <div class="flex items-center space-x-4 mt-2">
                                    <span class="text-xs text-gray-500">{{ $reminder->reminder_date->format('d M Y H:i') }}</span>
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium
                                        @if($reminder->status == 'sent') bg-green-100 text-green-800
                                        @else bg-yellow-100 text-yellow-800 @endif">
                                        {{ ucfirst($reminder->status) }}
                                    </span>
                                </div>
                            </div>
                            <div class="flex space-x-2 ml-4">
                                <a href="{{ route('reminders.edit', $reminder->reminder_id) }}" class="text-indigo-600 hover:text-indigo-900 text-sm">Edit</a>
                                <form method="POST" action="{{ route('reminders.destroy', $reminder->reminder_id) }}" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus reminder ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 text-sm">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($reminders->hasPages())
                <div class="px-6 py-4 border-t border-gray-200">
                    {{ $reminders->links() }}
                </div>
            @endif
        @else
            <!-- Empty State -->
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada reminder</h3>
                <p class="mt-1 text-sm text-gray-500">Mulai dengan menambahkan reminder untuk task Anda.</p>
                <div class="mt-6">
                    <button onclick="toggleReminderForm()" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 transition">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Tambah Reminder Pertama
                    </button>
                </div>
            </div>
        @endif
    </div>

    <!-- Statistics Cards -->
    <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white shadow-sm rounded-lg border border-gray-200 p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Pending Reminders</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $reminders->where('status', 'pending')->count() }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white shadow-sm rounded-lg border border-gray-200 p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Sent Reminders</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $reminders->where('status', 'sent')->count() }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white shadow-sm rounded-lg border border-gray-200 p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Total Reminders</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $reminders->total() }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Tips Card -->
    <div class="mt-8 bg-blue-50 border border-blue-200 rounded-lg p-6">
        <div class="flex">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <div class="ml-3">
                <h3 class="text-sm font-medium text-blue-800">Tips Mengelola Reminder</h3>
                <div class="mt-2 text-sm text-blue-700">
                    <ul class="list-disc list-inside space-y-1">
                        <li>Set reminder 1-2 hari sebelum deadline task untuk persiapan yang baik</li>
                        <li>Gunakan reminder untuk task yang memiliki deadline penting</li>
                        <li>Periksa status reminder secara berkala untuk memastikan sistem berjalan</li>
                        <li>Hapus reminder yang sudah tidak diperlukan untuk menjaga list tetap bersih</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleReminderForm() {
            const form = document.getElementById('reminderForm');
            form.classList.toggle('hidden');
            
            // Reset form when closing
            if (form.classList.contains('hidden')) {
                form.querySelector('form').reset();
            }
        }

        // Auto-hide form after successful submission
        @if(session('success') && !$errors->any())
            document.addEventListener('DOMContentLoaded', function() {
                const form = document.getElementById('reminderForm');
                form.classList.add('hidden');
            });
        @endif

        // Show form if there are validation errors
        @if($errors->any())
            document.addEventListener('DOMContentLoaded', function() {
                const form = document.getElementById('reminderForm');
                form.classList.remove('hidden');
            });
        @endif
    </script>
</x-layout>
