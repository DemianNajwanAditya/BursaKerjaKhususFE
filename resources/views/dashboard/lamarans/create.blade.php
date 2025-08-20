@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Kirim Lamaran</h2>

    <form action="{{ route('lamarans.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Pilih Lowongan</label>
            <select name="lowongan_id" class="form-control" required>
                @foreach($lowongans as $lowongan)
                    <option value="{{ $lowongan->id }}">{{ $lowongan->judul }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Upload CV</label>
            <input type="file" name="cv" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Kirim</button>
    </form>
</div>
@endsection
