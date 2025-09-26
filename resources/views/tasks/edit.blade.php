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
                <h1 class="text-3xl font-bold text-gray-900">Edit Task</h1>
                <p class="mt-2 text-sm text-gray-600">Perbarui informasi task Anda</p>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('tasks.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 transition">
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
            <form method="POST" action="{{ route('tasks.update', $task->id) }}" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Goal Selection -->
                <div>
                    <label for="goal_id" class="block text-sm font-medium text-gray-700 mb-2">
                        Pilih Goal <span class="text-red-500">*</span>
                    </label>
                    <select id="goal_id" name="goal_id" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('goal_id') border-red-500 @enderror">
                        <option value="">Pilih Goal</option>
                        @foreach($goals as $goal)
                            <option value="{{ $goal->id }}" {{ old('goal_id', $task->goal_id) == $goal->id ? 'selected' : '' }}>
                                {{ $goal->title }} ({{ ucfirst($goal->category) }})
                            </option>
                        @endforeach
                    </select>
                    @error('goal_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Task Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                        Judul Task <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="title" name="title" value="{{ old('title', $task->title) }}" required placeholder="Contoh: Buat outline materi presentasi" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('title') border-red-500 @enderror">
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Task Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Task</label>
                    <textarea id="description" name="description" rows="4" placeholder="Jelaskan detail task yang akan dikerjakan..." class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('description') border-red-500 @enderror">{{ old('description', $task->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Due Date and Status -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="due_date" class="block text-sm font-medium text-gray-700 mb-2">Deadline</label>
                        <input type="date" id="due_date" name="due_date" value="{{ old('due_date', $task->due_date ? $task->due_date->format('Y-m-d') : '') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('due_date') border-red-500 @enderror">
                        @error('due_date')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status <span class="text-red-500">*</span></label>
                        <select id="status" name="status" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('status') border-red-500 @enderror">
                            <option value="pending" {{ old('status', $task->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="in_progress" {{ old('status', $task->status) == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="completed" {{ old('status', $task->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                        @error('status')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Task Info -->
                <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                    <h4 class="text-sm font-medium text-gray-900 mb-2">Informasi Task</h4>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm text-gray-600">
                        <div>
                            <span class="font-medium">Dibuat:</span>
                            {{ $task->created_at->format('d M Y H:i') }}
                        </div>
                        <div>
                            <span class="font-medium">Terakhir diupdate:</span>
                            {{ $task->updated_at->format('d M Y H:i') }}
                        </div>
                        <div>
                            <span class="font-medium">Status saat ini:</span>
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium ml-1
                                @if($task->status == 'completed') bg-green-100 text-green-800
                                @elseif($task->status == 'in_progress') bg-yellow-100 text-yellow-800
                                @else bg-gray-100 text-gray-800 @endif">
                                {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                    <a href="{{ route('tasks.index') }}" class="px-4 py-2 bg-white border border-gray-300 rounded-md text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-50 transition">Batal</a>
                    <button type="submit" class="px-4 py-2 bg-blue-600 border border-transparent rounded-md text-xs text-white uppercase tracking-widest hover:bg-blue-700 transition">Update Task</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Progress Card (if task has deadline) -->
    @if($task->due_date)
        @php
            $now = now();
            $dueDate = \Carbon\Carbon::parse($task->due_date);
            $createdDate = $task->created_at;
            $totalDays = $createdDate->diffInDays($dueDate);
            $elapsedDays = $createdDate->diffInDays($now);
            $progressPercent = $totalDays > 0 ? min(100, max(0, ($elapsedDays / $totalDays) * 100)) : 0;
            $isOverdue = $now->isAfter($dueDate) && $task->status !== 'completed';
        @endphp
        
        <div class="mt-8 bg-white shadow-sm rounded-lg border border-gray-200">
            <div class="p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Progress Waktu</h3>
                
                <div class="mb-4">
                    <div class="flex justify-between text-sm text-gray-600 mb-2">
                        <span>{{ $createdDate->format('d M Y') }}</span>
                        <span class="{{ $isOverdue ? 'text-red-600 font-medium' : '' }}">
                            {{ $dueDate->format('d M Y') }}
                            @if($isOverdue) (Terlewat) @endif
                        </span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-3">
                        <div class="h-3 rounded-full {{ $isOverdue ? 'bg-red-500' : ($task->status == 'completed' ? 'bg-green-500' : 'bg-blue-500') }}" 
                             style="width: {{ $progressPercent }}%"></div>
                    </div>
                    <div class="flex justify-between text-xs text-gray-500 mt-1">
                        <span>{{ round($progressPercent) }}% waktu berlalu</span>
                        <span>{{ $elapsedDays }} dari {{ $totalDays }} hari</span>
                    </div>
                </div>

                @if($isOverdue && $task->status !== 'completed')
                    <div class="bg-red-50 border border-red-200 rounded-md p-3">
                        <div class="flex">
                            <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            <div class="ml-3">
                                <h4 class="text-sm font-medium text-red-800">Task Terlewat Deadline</h4>
                                <p class="text-sm text-red-700 mt-1">Task ini sudah melewati deadline. Pertimbangkan untuk memperbarui status atau memperpanjang deadline.</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endif

    <!-- Tips Card -->
    <div class="mt-8 bg-blue-50 border border-blue-200 rounded-lg p-6">
        <div class="flex">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <div class="ml-3">
                <h3 class="text-sm font-medium text-blue-800">Tips Mengelola Task</h3>
                <div class="mt-2 text-sm text-blue-700">
                    <ul class="list-disc list-inside space-y-1">
                        <li>Update status secara berkala untuk tracking yang akurat</li>
                        <li>Jika task terlewat deadline, evaluasi dan buat rencana baru</li>
                        <li>Ubah status menjadi "Completed" ketika task selesai</li>
                        <li>Pindahkan task ke goal lain jika diperlukan</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-layout>
