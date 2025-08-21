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

    public function edit(Lamaran $lamaran)
    {
        return view('dashboard.lamarans.edit', compact('lamaran'));
    }

    public function update(Request $request, Lamaran $lamaran)
    {
        $request->validate([
            'nama_pelamar' => 'required|string|max:255',
            'lowongan'     => 'required|string|max:255',
            'cv'           => 'nullable|mimes:pdf,doc,docx|max:2048',
        ]);

        // Update data
        $lamaran->nama_pelamar = $request->nama_pelamar;
        $lamaran->lowongan     = $request->lowongan;

        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('cv', 'public');
            $lamaran->cv = $cvPath;
        }

        $lamaran->save();

        return redirect()->route('lamarans.index')->with('success', 'Lamaran berhasil diperbarui!');
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

    $validated = $request->validate([
        'nama_pelamar' => 'required|string|max:255',
        'lowongan'     => 'required|string|max:255',
        'cv'           => 'required|file|mimes:pdf,doc,docx|max:2048',
    ]);

    $path = $request->file('cv')->store('cvs', 'public');

    Lamaran::create([
        'nama_pelamar' => $request->nama_pelamar,
        'lowongan'     => $request->lowongan,
        'cv'           => $path,
        'status'       => 'pending',
    ]);
        return redirect()->route('lamarans.index')->with('success', 'Lamaran berhasil dikirim!');
    }
}
