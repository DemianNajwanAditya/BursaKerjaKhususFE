@if(session('success'))
    <div class="bg-green-100 text-green-800 p-2 mb-4 rounded">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('upload.cv') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="cv" required>
    <button type="submit">Upload</button>
</form>
