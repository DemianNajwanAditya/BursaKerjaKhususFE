<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Models\Lamaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LamaranController extends Controller
{
    // Menampilkan daftar pelamar
    public function index()
    {
        $lamarans = Lamaran::all();
        return view('dashboard.lamarans.index', compact('lamarans'));
    }

    public function show($id)
    {
        $lamaran = Lamaran::with('lowongan')->findOrFail($id);
        return view('dashboard.lamarans.show', compact('lamaran'));
    }

    public function edit($id)
    {
        $lamaran = Lamaran::findOrFail($id);
        return view('dashboard.lamarans.edit', compact('lamaran'));
    }

    public function update(Request $request, $id)
    {
        $lamaran = Lamaran::findOrFail($id);

        $request->validate([
            'status' => 'required|in:Menunggu,Diterima,Ditolak'
        ]);

        $lamaran->update([
            'status' => $request->status
        ]);

        return redirect()->route('lamarans.index')->with('success', 'Status pelamar berhasil diperbarui.');
    }
    // Update status pelamar (diterima/ditolak)
    public function updateStatus(Request $request, $id)
    {
        $lamaran = Lamaran::findOrFail($id);
        $lamaran->status = $request->status;
        $lamaran->save();

        return redirect()->back()->with('success', 'Status pelamar berhasil diperbarui');
    }

    public function create()
    {
        $lowongans = Lowongan::all();
        return view('dashboard.lamarans.create', compact('lowongans'));
    }

    public function store(Request $request)
    {
        $cvPath = $request->file('cv')->store('cv', 'public');

        Lamaran::create([
            'user_id' => Auth::id(), // ambil user yang login
            'lowongan_id' => $request->lowongan_id,
            'cv' => $cvPath,
            'status' => 'pending',
        ]);

        return redirect()->route('lamarans.index')->with('success', 'Lamaran berhasil dikirim!');
    }
}
