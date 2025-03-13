@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto p-4 bg-white shadow rounded">
    <h2 class="text-2xl font-bold mb-4">Upload Music</h2>
    <form action="/music" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="Title" class="w-full border p-2 mb-4" required>
        <input type="file" name="file" class="w-full border p-2 mb-4" required>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Upload</button>
    </form>
</div>
@endsection
