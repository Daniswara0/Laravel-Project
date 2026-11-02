<x-admin.layout>
    <div class="p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">

        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold text-gray-900 dark:text-white">Daftar Subjects</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-4 py-3">ID</th>
                        <th scope="col" class="px-4 py-3">Nama Subject</th>
                        <th scope="col" class="px-4 py-3">Guru Pengampu</th>
                        <th scope="col" class="px-4 py-3">Dibuat Pada</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($subjects as $subject)
                    <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                        <td class="px-4 py-3 font-medium text-gray-900 dark:text-white">{{ $subject->id }}</td>
                        <td class="px-4 py-3 font-semibold text-gray-900 dark:text-white">{{ $subject->name }}</td>
                        <td class="px-4 py-3">
                            <span class="font-medium text-gray-900 dark:text-white">
                                {{ $subject->teacher->name ?? 'Belum ada guru' }}
                            </span>
                        </td>
                        <td class="px-4 py-3">{{ $subject->created_at }}</td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="px-4 py-4 text-center text-gray-500 dark:text-gray-400">
                            Belum ada data subjects yang tersedia.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin.layout>
