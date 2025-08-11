<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function showUploadForm()
    {
        return view('profile.upload-cv');
    }

    public function uploadCv(Request $request)
    {
        $request->validate([
            'cv' => 'required|file|mimes:pdf|max:2048',
        ]);

            $path = $request->file('cv')->storeAs(
        'cvs',
        time() . '_' . $request->file('cv')->getClientOriginalName(),
        'public'
    );

        $user = Auth::user();
        $path = $request->file('cv')->store('cv_files', 'public');
       /** @var \App\Models\User $user */
        $user->update([
            'cv_path' => $path
]);


        return redirect()->back()->with('success', 'CV berhasil diunggah!');
    }
}