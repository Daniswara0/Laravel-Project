<x-admin.layout>
    <div class="p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">

        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold text-gray-900 dark:text-white">Daftar Classroom</h2>
        </div>
 
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-4 py-3">ID</th>
                        <th scope="col" class="px-4 py-3">Nama Kelas</th>
                        <th scope="col" class="px-4 py-3">Jurusan</th>
                        <th scope="col" class="px-4 py-3">Dibuat Pada</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($classrooms as $classroom)
                    <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                        <td class="px-4 py-3 font-medium text-gray-900 dark:text-white">{{ $classroom->id }}</td>
                        <td class="px-4 py-3 font-semibold text-gray-900 dark:text-white">{{ $classroom->classroom_name }}</td>
                        <td class="px-4 py-3">
                            <span class="bg-primary-100 text-primary-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">
                                {{ strtoupper($classroom->major) }}
                            </span>
                        </td>
                        <td class="px-4 py-3">{{ $classroom->created_at }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-4 py-4 text-center text-gray-500 dark:text-gray-400">
                            Belum ada data classroom yang tersedia.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin.layout>
