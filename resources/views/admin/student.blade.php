<x-admin.layout>
    <div class="p-4">
        <h1 class="text-xl font-bold text-white mb-4">Student</h1>

        <div class="flex flex-col md:flex-row gap-6">

            <!-- Tabel Siswa (Kiri) -->
            <div class="w-full md:w-2/3">
                <table class="w-full border-collapse border border-gray-600 text-sm text-white">
                    <thead>
                        <tr class="bg-gray-700">
                            <th class="border border-gray-600 p-2 w-20">No. Absen</th>
                            <th class="border border-gray-600 p-2">NIS</th>
                            <th class="border border-gray-600 p-2">Nama</th>
                            <th class="border border-gray-600 p-2">Kelas</th>
                            <th class="border border-gray-600 p-2 w-28">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                    </tbody>
                </table>
            </div>

            <div class="w-full md:w-1/3 border border-gray-600 p-4 bg-gray-800 text-white rounded">
                <h2 id="formTitle" class="font-bold mb-3 border-b border-gray-600 pb-2">Tambah Siswa</h2>

                <form id="studentForm">
                    <div class="mb-3">
                        <label class="block text-xs mb-1">No. Absen</label>
                        <input type="number" id="inputNo" required class="w-full bg-gray-700 border border-gray-600 p-1.5 text-sm rounded text-white">
                    </div>
                    <div class="mb-3">
                        <label class="block text-xs mb-1">NIS</label>
                        <input type="text" id="inputNis" required class="w-full bg-gray-700 border border-gray-600 p-1.5 text-sm rounded text-white">
                    </div>
                    <div class="mb-3">
                        <label class="block text-xs mb-1">Nama Lengkap</label>
                        <input type="text" id="inputName" required class="w-full bg-gray-700 border border-gray-600 p-1.5 text-sm rounded text-white">
                    </div>
                    <div class="mb-3">
                        <label class="block text-xs mb-1">Kelas</label>
                        <input type="text" id="inputClassroom" required class="w-full bg-gray-700 border border-gray-600 p-1.5 text-sm rounded text-white">
                    </div>

                    <div class="flex gap-2 mt-4">
                        <button type="submit" id="btnSubmit" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 text-xs rounded w-full">Simpan</button>
                        <button type="button" id="btnCancel" onclick="resetForm()" class="hidden bg-gray-600 hover:bg-gray-500 text-white px-3 py-1.5 text-xs rounded">Batal</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <!-- Script JavaScript Murni (Tanpa Library) -->
    <script>
        // Array Data Dummy Siswa
        let students = [
            { no: 7, nis: '06246', name: 'Nesa', classroom: '11 PPLG 2' },
            { no: 12, nis: '06251', name: 'Zahra', classroom: '11 PPLG 2' },
            { no: 33, nis: '06272', name: 'Nasya', classroom: '11 PPLG 2' },
            { no: 36, nis: '06275', name: 'Savanna', classroom: '11 PPLG 2' },
            { no: 5, nis: '06244', name: 'Arhaqi', classroom: '11 PPLG 2' },
            { no: 6, nis: '06245', name: 'Bhisma', classroom: '11 PPLG 2' },
            { no: 8, nis: '06247', name: 'Diwa', classroom: '11 PPLG 2' },
            { no: 9, nis: '06248', name: 'Devo', classroom: '11 PPLG 2' },
            { no: 10, nis: '06249', name: 'Dzaky', classroom: '11 PPLG 2' },
            { no: 11, nis: '06250', name: 'Edgard', classroom: '11 PPLG 2' }
        ];

        let editIndex = null;

        // Fungsi Tampilkan Tabel
        function renderTable() {
            const tbody = document.getElementById('tableBody');
            tbody.innerHTML = '';

            if (students.length === 0) {
                tbody.innerHTML = `<tr><td colspan="5" class="border border-gray-600 p-4 text-center">Data siswa kosong.</td></tr>`;
                return;
            }

            students.forEach((student, index) => {
                const tr = document.createElement('tr');
                tr.className = 'text-center bg-gray-800';
                tr.innerHTML = `
                    <td class="border border-gray-600 p-2">${student.no}</td>
                    <td class="border border-gray-600 p-2">${student.nis}</td>
                    <td class="border border-gray-600 p-2 text-left">${student.name}</td>
                    <td class="border border-gray-600 p-2">${student.classroom}</td>
                    <td class="border border-gray-600 p-2">
                        <button onclick="editStudent(${index})" class="bg-blue-600 hover:bg-blue-700 text-white px-2 py-1 text-xs rounded mr-1">Edit</button>
                        <button onclick="deleteStudent(${index})" class="bg-red-600 hover:bg-red-700 text-white px-2 py-1 text-xs rounded">Hapus</button>
                    </td>
                `;
                tbody.appendChild(tr);
            });


            if (editIndex === null) {
                document.getElementById('inputNo').value = students.length + 1;
            }
        }

        document.getElementById('studentForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const newStudent = {
                no: parseInt(document.getElementById('inputNo').value),
                nis: document.getElementById('inputNis').value,
                name: document.getElementById('inputName').value,
                classroom: document.getElementById('inputClassroom').value
            };

            if (editIndex !== null) {
                students[editIndex] = newStudent;
            } else {
                students.push(newStudent);
            }

            resetForm();
            renderTable();
        });

        function editStudent(index) {
            editIndex = index;
            const student = students[index];

            document.getElementById('formTitle').innerText = 'Edit Data Siswa';
            document.getElementById('inputNo').value = student.no;
            document.getElementById('inputNis').value = student.nis;
            document.getElementById('inputName').value = student.name;
            document.getElementById('inputClassroom').value = student.classroom;

            document.getElementById('btnSubmit').innerText = 'Update';
            document.getElementById('btnCancel').classList.remove('hidden');
        }

        function deleteStudent(index) {
            if (confirm('Yakin mau hapus data siswa ini?')) {
                students.splice(index, 1);
                if (editIndex === index) {
                    resetForm();
                }
                renderTable();
            }
        }

        // Fungsi Reset Form
        function resetForm() {
            editIndex = null;
            document.getElementById('formTitle').innerText = 'Tambah Siswa';
            document.getElementById('studentForm').reset();
            document.getElementById('btnSubmit').innerText = 'Simpan';
            document.getElementById('btnCancel').classList.add('hidden');
            document.getElementById('inputNo').value = students.length + 1;
        }

        renderTable();
    </script>
</x-admin.layout>
