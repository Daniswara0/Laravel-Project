<x-admin.layout>
    <div class="p-4">
        <h1 class="text-xl font-bold text-white mb-1">{{ $title }}</h1>
        <p class="text-gray-400 text-sm mb-4">{{ $content }}</p>

        <div class="flex flex-col md:flex-row gap-6">

            <!-- Tabel Data Siswa -->
            <div class="w-full md:w-2/3">
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
                                <!-- Menggunakan id dari database -->
                                <td class="border border-gray-600 p-2">{{ $student->id }}</td>
                                <td class="border border-gray-600 p-2">{{ $student->nis }}</td>
                                <td class="border border-gray-600 p-2 text-left">{{ $student->nama }}</td>
                                <td class="border border-gray-600 p-2">{{ $student->classroom }}</td>
                                <td class="border border-gray-600 p-2 text-left">{{ $student->email }}</td>
                                <td class="border border-gray-600 p-2 text-left">{{ $student->address }}</td>
                                <td class="border border-gray-600 p-2">
                                    <button type="button" class="bg-blue-600 hover:bg-blue-700 text-white px-2 py-1 text-xs rounded mr-1">Edit</button>
                                    <button type="button" class="bg-red-600 hover:bg-red-700 text-white px-2 py-1 text-xs rounded">Hapus</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Form Tambah Siswa -->
            <div class="w-full md:w-1/3 border border-gray-600 p-4 bg-gray-800 text-white rounded">
                <h2 class="font-bold mb-3 border-b border-gray-600 pb-2">Tambah Siswa</h2>

                <!-- Pastikan nanti ada action dan method (POST) ke route store-mu -->
                <form action="#" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="block text-xs mb-1">NIS</label>
                        <input type="text" name="nis" required class="w-full bg-gray-700 border border-gray-600 p-1.5 text-sm rounded text-white">
                    </div>
                    <div class="mb-3">
                        <label class="block text-xs mb-1">Nama Lengkap</label>
                        <input type="text" name="nama" required class="w-full bg-gray-700 border border-gray-600 p-1.5 text-sm rounded text-white">
                    </div>
                    <div class="mb-3">
                        <label class="block text-xs mb-1">Kelas</label>
                        <input type="text" name="classroom" required class="w-full bg-gray-700 border border-gray-600 p-1.5 text-sm rounded text-white">
                    </div>
                    <div class="mb-3">
                        <label class="block text-xs mb-1">Email</label>
                        <input type="email" name="email" required class="w-full bg-gray-700 border border-gray-600 p-1.5 text-sm rounded text-white">
                    </div>
                    <div class="mb-3">
                        <label class="block text-xs mb-1">Alamat</label>
                        <input type="text" name="address" required class="w-full bg-gray-700 border border-gray-600 p-1.5 text-sm rounded text-white">
                    </div>

                    <div class="flex gap-2 mt-4">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 text-xs rounded w-full">Simpan</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-admin.layout>
