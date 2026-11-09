<x-admin.layout>
    <div class="p-4">
        <div class="flex justify-between items-center mb-4">
            <div>
                <h1 class="text-xl font-bold text-white mb-1">{{ $title }}</h1>
                <p class="text-gray-400 text-sm">{{ $content }}</p>
            </div>
            <!-- Tombol untuk memicu Modal Pop-up -->
            <button data-modal-target="create-student-modal" data-modal-toggle="create-student-modal" type="button"
                class="bg-green-600 hover:bg-green-700 text-white px-3 py-2 text-xs rounded font-semibold">
                + Tambah Siswa
            </button>
        </div>

        <!-- Tabel Data Siswa -->
        <div class="w-full overflow-x-auto">
            <table class="w-full border-collapse border border-gray-600 text-sm text-white">
                <thead>
                    <tr class="bg-gray-700">
                        <th class="border border-gray-600 p-2 w-16">ID</th>
                        <th class="border border-gray-600 p-2">NIS</th>
                        <th class="border border-gray-600 p-2">Nama</th>
                        <th class="border border-gray-600 p-2">Kelas</th>
                        <th class="border border-gray-600 p-2">Email</th>
                        <th class="border border-gray-600 p-2">Alamat</th>
                        <th class="border border-gray-600 p-2 w-28">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr class="text-center bg-gray-800">
                            <td class="border border-gray-600 p-2">{{ $student->id }}</td>
                            <td class="border border-gray-600 p-2">{{ $student->nis }}</td>
                            <td class="border border-gray-600 p-2 text-left">{{ $student->nama }}</td>
                            <td class="border border-gray-600 p-2">{{ $student->classroom->classroom_name ?? '-' }}</td>
                            <td class="border border-gray-600 p-2 text-left">{{ $student->email }}</td>
                            <td class="border border-gray-600 p-2 text-left">{{ $student->address }}</td>
                            <td class="border border-gray-600 p-2">
                                <a href="{{ route('students.edit', $student->id) }}"
                                    class="bg-blue-600 hover:bg-blue-700 text-white px-2 py-1 text-xs rounded mr-1 inline-block">Edit</a>
                                <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-600 hover:bg-red-700 text-white px-2 py-1 text-xs rounded">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Flowbite Modal Pop-up untuk Tambah Siswa -->
        <div id="create-student-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-gray-800 rounded-lg shadow border border-gray-700 text-white">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-700">
                        <h3 class="text-lg font-semibold text-white">
                            Tambah Siswa Baru
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-600 hover:text-white rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="create-student-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body / Form -->
                    <form action="{{ route('students.store') }}" method="POST" class="p-4 md:p-5">
                        @csrf
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label class="block text-xs mb-1">NIS</label>
                                <input type="text" name="nis" value="{{ old('nis') }}" required
                                    class="w-full bg-gray-700 border border-gray-600 p-2 text-sm rounded text-white">
                            </div>
                            <div class="col-span-2">
                                <label class="block text-xs mb-1">Nama Lengkap</label>
                                <input type="text" name="nama" value="{{ old('nama') }}" required
                                    class="w-full bg-gray-700 border border-gray-600 p-2 text-sm rounded text-white">
                            </div>
                            <div class="col-span-2">
                                <label class="block text-xs mb-1">Kelas</label>
                                <select name="classroom_id" required
                                    class="w-full bg-gray-700 border border-gray-600 p-2 text-sm rounded text-white">
                                    <option value="">Pilih Kelas</option>
                                    @foreach ($classrooms as $classroom)
                                        <option value="{{ $classroom->id }}">
                                            {{ $classroom->classroom_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-span-2">
                                <label class="block text-xs mb-1">Email</label>
                                <input type="email" name="email" value="{{ old('email') }}" required
                                    class="w-full bg-gray-700 border border-gray-600 p-2 text-sm rounded text-white">
                            </div>
                            <div class="col-span-2">
                                <label class="block text-xs mb-1">Alamat</label>
                                <input type="text" name="address" value="{{ old('address') }}" required
                                    class="w-full bg-gray-700 border border-gray-600 p-2 text-sm rounded text-white">
                            </div>
                        </div>
                        <button type="submit" class="text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-full">
                            Simpan Data
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</x-admin.layout>
