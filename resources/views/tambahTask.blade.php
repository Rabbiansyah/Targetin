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
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Kelola Tasks</h1>
                <p class="mt-2 text-sm text-gray-600">Kelola semua tasks Anda - tambah, edit, dan hapus tasks</p>
            </div>
            <div class="mt-4 sm:mt-0 flex space-x-3">
                <a href="/dashboard" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 transition">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali
                </a>
                <button onclick="toggleAddForm()" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 transition">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Tambah Task
                </button>
            </div>
        </div>
    </div>

    <!-- Add Task Form -->
    <div id="addTaskForm" class="mb-8 bg-white shadow-sm rounded-lg border border-gray-200" style="display: none;">
        <div class="p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Tambah Task Baru</h3>
            
            <form method="POST" action="{{ route('tasks.store') }}" class="space-y-6">
                @csrf
                
                <!-- Goal Selection -->
                <div>
                    <label for="goal_id" class="block text-sm font-medium text-gray-700 mb-2">
                        Pilih Goal <span class="text-red-500">*</span>
                    </label>
                    <select id="goal_id" name="goal_id" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Pilih Goal</option>
                        @if(isset($goals))
                            @foreach($goals as $goal)
                                <option value="{{ $goal->id }}">{{ $goal->title }} ({{ ucfirst($goal->category) }})</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <!-- Task Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                        Judul Task <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="title" name="title" required placeholder="Contoh: Buat outline materi presentasi" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Task Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Task</label>
                    <textarea id="description" name="description" rows="3" placeholder="Jelaskan detail task yang akan dikerjakan..." class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>

                <!-- Due Date and Status -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="due_date" class="block text-sm font-medium text-gray-700 mb-2">Deadline</label>
                        <input type="date" id="due_date" name="due_date" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <select id="status" name="status" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="pending">Pending</option>
                            <option value="in_progress">In Progress</option>
                            <option value="completed">Completed</option>
                        </select>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                    <button type="button" onclick="toggleAddForm()" class="px-4 py-2 bg-white border border-gray-300 rounded-md text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-50 transition">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 border border-transparent rounded-md text-xs text-white uppercase tracking-widest hover:bg-blue-700 transition">Simpan Task</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Tasks Table -->
    <div class="bg-white shadow-sm rounded-lg border border-gray-200">
        <div class="p-6">
            @if(!empty($tasks) && count($tasks) > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Task</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Goal</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Deadline</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($tasks as $task)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $task->title }}</div>
                                        @if ($task->description)
                                            <div class="text-sm text-gray-500">{{ Str::limit($task->description, 50) }}</div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">{{ $task->goal->title ?? 'No Goal' }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                            @if ($task->status == 'completed') bg-green-100 text-green-800
                                            @elseif($task->status == 'in_progress') bg-yellow-100 text-yellow-800
                                            @else bg-gray-100 text-gray-800 @endif">
                                            {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-900">
                                        {{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('d M Y') : 'Tidak ditentukan' }}
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium">
                                        <div class="flex space-x-2">
                                            <button onclick="editTask({{ $task->id }})" class="text-indigo-600 hover:text-indigo-900">Edit</button>
                                            <button onclick="deleteTask({{ $task->id }}, '{{ $task->title }}')" class="text-red-600 hover:text-red-900">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-12">
                    <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada task</h3>
                    <p class="mt-1 text-sm text-gray-500">Mulai dengan menambahkan task pertama Anda.</p>
                    <div class="mt-6">
                        <button onclick="toggleAddForm()" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            Tambah Task
                        </button>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <script>
        function toggleAddForm() {
            const form = document.getElementById('addTaskForm');
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
        }

        function editTask(id) {
            window.location.href = `/tasks/${id}/edit`;
        }

        function deleteTask(id, title) {
            if (confirm(`Hapus task "${title}"?`)) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/tasks/${id}`;
                
                const csrf = document.createElement('input');
                csrf.type = 'hidden';
                csrf.name = '_token';
                csrf.value = '{{ csrf_token() }}';
                
                const method = document.createElement('input');
                method.type = 'hidden';
                method.name = '_method';
                method.value = 'DELETE';
                
                form.appendChild(csrf);
                form.appendChild(method);
                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>
</x-layout>
