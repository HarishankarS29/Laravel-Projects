@extends('layouts.app')
@section('content')
<div class="max-w-md mx-auto p-4">
    <h2 class="text-2xl font-bold">Login</h2>
    <form action="/login" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Email" class="w-full border p-2 mb-4" required>
        <input type="password" name="password" placeholder="Password" class="w-full border p-2 mb-4" required>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Login</button>
    </form>
</div>
@endsection