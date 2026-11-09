<x-admin.layout>
    <div class="p-4">
        <h1 class="text-xl font-bold text-white mb-1">{{ $title }}</h1>
        <p class="text-gray-400 text-sm mb-4">{{ $content }}</p>

        <div class="w-full md:w-1/2 border border-gray-600 p-4 bg-gray-800 text-white rounded">
            <form action="{{ route('students.update', $student->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="block text-xs mb-1">NIS</label>
                    <input type="text" name="nis" value="{{ old('nis', $student->nis) }}" required
                        class="w-full bg-gray-700 border border-gray-600 p-1.5 text-sm rounded text-white">
                </div>
                <div class="mb-3">
                    <label class="block text-xs mb-1">Nama Lengkap</label>
                    <input type="text" name="nama" value="{{ old('nama', $student->nama) }}" required
                        class="w-full bg-gray-700 border border-gray-600 p-1.5 text-sm rounded text-white">
                </div>
                <div class="mb-3">
                    <label class="block text-xs mb-1">Kelas</label>
                    <select name="classroom_id" required
                        class="w-full bg-gray-700 border border-gray-600 p-1.5 text-sm rounded text-white">
                        <option value="">Pilih Kelas</option>
                        @foreach ($classrooms as $classroom)
                            <option value="{{ $classroom->id }}" {{ $student->classroom_id == $classroom->id ? 'selected' : '' }}>
                                {{ $classroom->classroom_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="block text-xs mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email', $student->email) }}" required
                        class="w-full bg-gray-700 border border-gray-600 p-1.5 text-sm rounded text-white">
                </div>
                <div class="mb-3">
                    <label class="block text-xs mb-1">Alamat</label>
                    <input type="text" name="address" value="{{ old('address', $student->address) }}" required
                        class="w-full bg-gray-700 border border-gray-600 p-1.5 text-sm rounded text-white">
                </div>

                <div class="flex gap-2 mt-4">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 text-xs rounded">Update</button>
                    <a href="{{ route('students.index') }}"
                        class="bg-gray-600 hover:bg-gray-700 text-white px-3 py-1.5 text-xs rounded text-center">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</x-admin.layout>
