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
                <h1 class="text-3xl font-bold text-gray-900">Edit Reminder</h1>
                <p class="mt-2 text-sm text-gray-600">Perbarui pengaturan reminder Anda</p>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('reminders.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 transition">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali
                </a>
            </div>
        </div>
    </div>

    <!-- Form Card -->
    <div class="bg-white shadow-sm rounded-lg border border-gray-200">
        <div class="p-6">
            <form method="POST" action="{{ route('reminders.update', $reminder->reminder_id) }}" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Task Selection -->
                <div>
                    <label for="task_id" class="block text-sm font-medium text-gray-700 mb-2">
                        Pilih Task <span class="text-red-500">*</span>
                    </label>
                    <select id="task_id" name="task_id" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('task_id') border-red-500 @enderror">
                        <option value="">Pilih Task</option>
                        @foreach($tasks as $task)
                            <option value="{{ $task->id }}" {{ old('task_id', $reminder->task_id) == $task->id ? 'selected' : '' }}>
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
                        <input type="date" id="reminder_date" name="reminder_date" value="{{ old('reminder_date', $reminder->reminder_date->format('Y-m-d')) }}" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('reminder_date') border-red-500 @enderror">
                        @error('reminder_date')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="reminder_time" class="block text-sm font-medium text-gray-700 mb-2">
                            Waktu Reminder <span class="text-red-500">*</span>
                        </label>
                        <input type="time" id="reminder_time" name="reminder_time" value="{{ old('reminder_time', $reminder->reminder_date->format('H:i')) }}" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('reminder_time') border-red-500 @enderror">
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
                            <option value="notification" {{ old('method', $reminder->method) == 'notification' ? 'selected' : '' }}>Notification</option>
                        </select>
                        @error('method')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <select id="status" name="status" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('status') border-red-500 @enderror">
                            <option value="pending" {{ old('status', $reminder->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="sent" {{ old('status', $reminder->status) == 'sent' ? 'selected' : '' }}>Sent</option>
                        </select>
                        @error('status')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Current Task Info -->
                <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                    <h4 class="text-sm font-medium text-gray-900 mb-2">Informasi Task Saat Ini</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-600">
                        <div>
                            <span class="font-medium">Task:</span>
                            {{ $reminder->task->title }}
                        </div>
                        <div>
                            <span class="font-medium">Goal:</span>
                            {{ $reminder->task->goal->title }}
                        </div>
                        <div>
                            <span class="font-medium">Kategori Goal:</span>
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium ml-1
                                @if($reminder->task->goal->category == 'personal') bg-blue-100 text-blue-800
                                @elseif($reminder->task->goal->category == 'work') bg-green-100 text-green-800
                                @elseif($reminder->task->goal->category == 'health') bg-purple-100 text-purple-800
                                @else bg-gray-100 text-gray-800 @endif">
                                {{ ucfirst($reminder->task->goal->category) }}
                            </span>
                        </div>
                        <div>
                            <span class="font-medium">Status Task:</span>
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium ml-1
                                @if($reminder->task->status == 'completed') bg-green-100 text-green-800
                                @elseif($reminder->task->status == 'in_progress') bg-yellow-100 text-yellow-800
                                @else bg-gray-100 text-gray-800 @endif">
                                {{ ucfirst(str_replace('_', ' ', $reminder->task->status)) }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Reminder Info -->
                <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                    <h4 class="text-sm font-medium text-gray-900 mb-2">Informasi Reminder</h4>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm text-gray-600">
                        <div>
                            <span class="font-medium">Dibuat:</span>
                            {{ $reminder->created_at->format('d M Y H:i') }}
                        </div>
                        <div>
                            <span class="font-medium">Terakhir diupdate:</span>
                            {{ $reminder->updated_at->format('d M Y H:i') }}
                        </div>
                        <div>
                            <span class="font-medium">Status saat ini:</span>
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium ml-1
                                @if($reminder->status == 'sent') bg-green-100 text-green-800
                                @else bg-yellow-100 text-yellow-800 @endif">
                                {{ ucfirst($reminder->status) }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                    <a href="{{ route('reminders.index') }}" class="px-4 py-2 bg-white border border-gray-300 rounded-md text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-50 transition">Batal</a>
                    <button type="submit" class="px-4 py-2 bg-blue-600 border border-transparent rounded-md text-xs text-white uppercase tracking-widest hover:bg-blue-700 transition">Update Reminder</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Time Status Card -->
    @php
        $now = now();
        $reminderTime = $reminder->reminder_date;
        $isPast = $now->isAfter($reminderTime);
        $isToday = $now->isSameDay($reminderTime);
        $isTomorrow = $now->addDay()->isSameDay($reminderTime);
    @endphp
    
    <div class="mt-8 bg-white shadow-sm rounded-lg border border-gray-200">
        <div class="p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Status Waktu Reminder</h3>
            
            <div class="flex items-center space-x-4">
                <div class="flex-shrink-0">
                    @if($isPast && $reminder->status == 'pending')
                        <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    @elseif($isToday)
                        <div class="w-10 h-10 bg-yellow-100 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    @elseif($reminder->status == 'sent')
                        <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                    @else
                        <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    @endif
                </div>
                
                <div class="flex-1">
                    <div class="text-sm font-medium text-gray-900">
                        @if($isPast && $reminder->status == 'pending')
                            Reminder Terlewat
                        @elseif($isToday)
                            Reminder Hari Ini
                        @elseif($isTomorrow)
                            Reminder Besok
                        @elseif($reminder->status == 'sent')
                            Reminder Sudah Terkirim
                        @else
                            Reminder Terjadwal
                        @endif
                    </div>
                    <div class="text-sm text-gray-500 mt-1">
                        {{ $reminderTime->format('d M Y') }} pukul {{ $reminderTime->format('H:i') }}
                        @if($isPast && $reminder->status == 'pending')
                            <span class="text-red-600 font-medium">({{ $reminderTime->diffForHumans() }})</span>
                        @elseif(!$isPast)
                            <span class="text-gray-600">({{ $reminderTime->diffForHumans() }})</span>
                        @endif
                    </div>
                </div>
            </div>

            @if($isPast && $reminder->status == 'pending')
                <div class="mt-4 bg-red-50 border border-red-200 rounded-md p-3">
                    <div class="flex">
                        <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                        <div class="ml-3">
                            <h4 class="text-sm font-medium text-red-800">Reminder Terlewat</h4>
                            <p class="text-sm text-red-700 mt-1">Reminder ini sudah melewati waktu yang ditentukan. Pertimbangkan untuk memperbarui waktu atau mengubah status menjadi 'Sent' jika sudah tidak diperlukan.</p>
                        </div>
                    </div>
                </div>
            @endif
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
                <h3 class="text-sm font-medium text-blue-800">Tips Mengedit Reminder</h3>
                <div class="mt-2 text-sm text-blue-700">
                    <ul class="list-disc list-inside space-y-1">
                        <li>Pastikan waktu reminder sesuai dengan kebutuhan Anda</li>
                        <li>Ubah status menjadi "Sent" jika reminder sudah tidak diperlukan</li>
                        <li>Anda bisa memindahkan reminder ke task lain jika diperlukan</li>
                        <li>Periksa kembali tanggal dan waktu sebelum menyimpan perubahan</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-layout>
