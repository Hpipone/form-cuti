<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    // Tampilkan Form
    public function create()
    {
        return view('form');
    }

    // Simpan Data Form
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik' => 'required|numeric|digits_between:5,16',
            'nama' => 'required|string|max:50',
            'tanggal' => 'required|date',
            'nomor_darurat' => 'required|numeric|digits_between:10,15',
            'alasan' => 'required|string|max:500',
            'lama_cuti' => 'required|integer|min:1|max:999'
        ]);

        Form::create($validated);
        return redirect('/')->with('success', 'Data cuti berhasil dikirim!');
    }

    // Tampilkan Admin Panel
    public function admin()
    {
        $forms = Form::all();
        return view('admin', compact('forms'));
    }

    // Edit Data
    public function edit($id)
    {
        $form = Form::findOrFail($id);
        return view('edit', compact('form'));
    }

    // Update Data
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nik' => 'required|numeric',
            'nama' => 'required|string',
            'tanggal' => 'required|date',
            'nomor_darurat' => 'required|numeric',
            'alasan' => 'required|string',
            'lama_cuti' => 'required|numeric|min:1'
        ]);

        $form = Form::findOrFail($id);
        $form->update($validated);
        return redirect('/admin')->with('success', 'Data cuti berhasil diupdate!');
    }

    // Hapus Data
    public function destroy($id)
    {
        $form = Form::findOrFail($id);
        $form->delete();
        return redirect('/admin')->with('success', 'Data berhasil dihapus!');
    }
}