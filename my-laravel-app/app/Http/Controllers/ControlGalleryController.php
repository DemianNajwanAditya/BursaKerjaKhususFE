<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControlGalleryController extends Controller
{
    public function index()
    {
        return view('control-gallery');
    }
}