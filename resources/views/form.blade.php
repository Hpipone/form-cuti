<!DOCTYPE html>
<html>
<head>
    <title>Form Cuti Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script>
        // Validasi input angka saja
        function validateNumberInput(input) {
            input.value = input.value.replace(/[^0-9]/g, '');
        }

        // Alert untuk validasi input
        document.querySelector('form').addEventListener('submit', function(e) {
            const nik = document.querySelector('input[name="nik"]');
            const nomorDarurat = document.querySelector('input[name="nomor_darurat"]');
            const lamaCuti = document.querySelector('input[name="lama_cuti"]');

            if(nik.value.length < 5) {
                alert('NIK harus minimal 5 digit angka');
                e.preventDefault();
                return;
            }

            if(nomorDarurat.value.length < 10) {
                alert('Nomor darurat harus minimal 10 digit angka');
                e.preventDefault();
                return;
            }

            if(lamaCuti.value < 1) {
                alert('Lama cuti minimal 1 hari');
                e.preventDefault();
                return;
            }
        });
    </script>
    <style>
        .alert-pulse {
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0% { opacity: 1; }
            50% { opacity: 0.7; }
            100% { opacity: 1; }
        }
        @media (max-width: 640px) {
            .flex.justify-between {
                flex-direction: column;
                gap: 10px;
            }
            .flex.justify-between button,
            .flex.justify-between a {
                width: 100%;
                text-align: center;
            }
        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white rounded-lg shadow-lg p-4 sm:p-8 w-full max-w-md">
        <!-- Alert Panduan -->
        <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 mb-6" role="alert">
            <p class="font-bold">Panduan Pengisian</p>
            <p class="text-sm">- Isi semua field dengan data yang valid</p>
            <p class="text-sm">- NIK dan Nomor Darurat hanya boleh angka</p>
            <p class="text-sm">- Lama cuti minimal 1 hari</p>
        </div>

        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-6 alert-pulse rounded">
            <p class="font-bold">Perhatian!</p>
            <p class="text-sm">Pastikan data yang diisi sudah benar sebelum submit</p>
        </div>

        <h1 class="text-2xl font-bold text-center mb-6">Form Pengajuan Cuti</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('form.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 mb-2 flex items-center">
                    NIK
                    <span class="ml-2 bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">angka saja</span>
                </label>
                <input type="text" name="nik" class="w-full px-4 py-2 border rounded"
                       oninput="validateNumberInput(this)" required
                       pattern="[0-9]*" title="Hanya angka yang diperbolehkan"
                       maxlength="50" placeholder="Contoh: 12345">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Nama Karyawan</label>
                <input type="text" name="nama" class="w-full px-4 py-2 border rounded"
                       maxlength="20" required placeholder="Nama lengkap">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Tanggal</label>
                <input type="date" name="tanggal" class="w-full px-4 py-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 mb-2 flex items-center">
                    Lama Cuti (hari)
                    <span class="ml-2 bg-red-100 text-red-800 text-xs px-2 py-1 rounded-full">minimal 1</span>
                </label>
                <input type="text" name="lama_cuti" class="w-full px-4 py-2 border rounded"
                       oninput="validateNumberInput(this)" required
                       min="1" pattern="[0-9]*" title="Hanya angka yang diperbolehkan"
                       maxlength="3" placeholder="Contoh: 3">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Nomor Darurat</label>
                <input type="text" name="nomor_darurat" class="w-full px-4 py-2 border rounded"
                       oninput="validateNumberInput(this)" required
                       pattern="[0-9]*" title="Hanya angka yang diperbolehkan"
                       maxlength="15" placeholder="Contoh: 08123456789">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Alasan</label>
                <textarea name="alasan" rows="3" class="w-full px-4 py-2 border rounded"
                          maxlength="500" required placeholder="Alasan pengajuan cuti"></textarea>
            </div>
            <div class="flex justify-between">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                    Kirim
                </button>
                <a href="/admin" class="bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600">
                    Ke Admin
                </a>
            </div>
        </form>
    </div>
</body>
</html>