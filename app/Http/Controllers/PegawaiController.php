<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawais = Pegawai::all();
        return view('dashboard.datapegawai', compact('pegawais'));
    }

    public function create()
    {
        return view('dashboard.createpegawai');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:pegawais',
            'posisi' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $fileName = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('pegawai'), $fileName);
            $validatedData['foto'] = $fileName;
        }

        Pegawai::create($validatedData);

        return redirect('/datapegawai')->with('success', 'Pegawai berhasil ditambahkan.');
    }

    public function show(Pegawai $pegawai)
    {
        return view('dashboard.detailpegawai', compact('pegawai'));
    }

    public function edit(Pegawai $pegawai)
    {
        return view('dashboard.editpegawai', compact('pegawai'));
    }

    public function update(Request $request, Pegawai $pegawai)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:pegawais,email,'.$pegawai->id,
            'posisi' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $fileName = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('pegawai'), $fileName);
            $validatedData['foto'] = $fileName;
        }

        $pegawai->update($validatedData);

        return redirect('/datapegawai')->with('success', 'Pegawai berhasil diupdate.');
    }

    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect('/datapegawai')->with('success', 'Pegawai berhasil dihapus.');
    }
}

