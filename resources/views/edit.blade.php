<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Cuti</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script>
        // Validasi input angka saja
        function validateNumberInput(input) {
            input.value = input.value.replace(/[^0-9]/g, '');
        }
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
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-md">
        <!-- Alert Panduan -->
        <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 mb-6" role="alert">
            <p class="font-bold">Panduan Pengeditan</p>
            <p class="text-sm">- Pastikan data yang diubah sudah valid</p>
            <p class="text-sm">- NIK dan Nomor Darurat hanya boleh angka</p>
        </div>

        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-6 alert-pulse rounded">
            <p class="font-bold">Perhatian!</p>
            <p class="text-sm">Perubahan data akan langsung tersimpan di database</p>
        </div>

        <h1 class="text-2xl font-bold text-center mb-6">Edit Data Cuti</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('form.update', $form->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 mb-2 flex items-center">
                    NIK
                    <span class="ml-2 bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">angka saja</span>
                </label>
                <input type="text" name="nik" value="{{ $form->nik }}" class="w-full px-4 py-2 border rounded"
                       oninput="validateNumberInput(this)" required
                       pattern="[0-9]*" title="Hanya angka yang diperbolehkan"
                       maxlength="16">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Nama Karyawan</label>
                <input type="text" name="nama" value="{{ $form->nama }}" class="w-full px-4 py-2 border rounded"
                       maxlength="50" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Tanggal</label>
                <input type="date" name="tanggal" value="{{ $form->tanggal }}" class="w-full px-4 py-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2 flex items-center">
                    Lama Cuti (hari)
                    <span class="ml-2 bg-red-100 text-red-800 text-xs px-2 py-1 rounded-full">minimal 1</span>
                </label>
                <input type="text" name="lama_cuti" value="{{ $form->lama_cuti }}"
                       class="w-full px-4 py-2 border rounded"
                       oninput="validateNumberInput(this)" required
                       min="1" pattern="[0-9]*" title="Hanya angka yang diperbolehkan"
                       maxlength="3">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Nomor Darurat</label>
                <input type="text" name="nomor_darurat" value="{{ $form->nomor_darurat }}"
                       class="w-full px-4 py-2 border rounded"
                       oninput="validateNumberInput(this)" required
                       pattern="[0-9]*" title="Hanya angka yang diperbolehkan"
                       maxlength="15">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Alasan</label>
                <textarea name="alasan" rows="3" class="w-full px-4 py-2 border rounded"
                          maxlength="500" required>{{ $form->alasan }}</textarea>
            </div>

            <div class="flex justify-between">
                <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded flex items-center">
                    <i class="fas fa-save mr-2"></i> Update
                </button>
                <a href="/admin"
                   class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded flex items-center">
                    <i class="fas fa-times mr-2"></i> Batal
                </a>
            </div>
        </form>
    </div>
</body>
</html>
