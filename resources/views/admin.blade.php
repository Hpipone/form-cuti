<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100 min-h-screen p-4">
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-6 text-center">Data Pengajuan Cuti Karyawan</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4 text-center">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white p-6 rounded-lg shadow-md overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="p-3 text-center">NIK</th>
                        <th class="p-3 text-center">Nama</th>
                        <th class="p-3 text-center">Tanggal</th>
                        <th class="p-3 text-center">Lama Cuti</th>
                        <th class="p-3 text-center">Alasan</th>
                        <th class="p-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($forms as $form)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3 text-center">{{ $form->nik }}</td>
                        <td class="p-3 text-center">{{ $form->nama }}</td>
                        <td class="p-3 text-center">{{ $form->tanggal }}</td>
                        <td class="p-3 text-center">{{ $form->lama_cuti }} hari</td>
                        <td class="p-3 text-center max-w-xs truncate">{{ $form->alasan }}</td>
                        <td class="p-3 text-center space-x-2">
                            <a href="{{ route('form.edit', $form->id) }}"
                               class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('form.destroy', $form->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-6 text-center">
            <a href="/" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded inline-block">
                <i class="fas fa-arrow-left"></i> Kembali ke Form
            </a>
        </div>
    </div>
</body>
</html>