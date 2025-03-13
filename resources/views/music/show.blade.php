@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto p-4 bg-white shadow rounded">
    <h2 class="text-2xl font-bold">{{ $music->title }}</h2>
    <audio controls class="w-full mt-4">
        <source src="{{ asset('storage/' . $music->file) }}" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>

    <form action="/music/{{ $music->id }}/like" method="POST" class="mt-4">
        @csrf
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Like</button>
    </form>

    <form action="/music/{{ $music->id }}/comment" method="POST" class="mt-4">
        @csrf
        <input type="text" name="comment" placeholder="Add a comment..." class="w-full border p-2" required>
        <button type="submit" class="bg-gray-500 text-white px-4 py-2 rounded mt-2">Comment</button>
    </form>

    <h3 class="text-xl font-bold mt-4">Comments:</h3>
    <ul>
        @foreach ($music->comments as $comment)
            <li class="border-t p-2">{{ $comment->user->name }}: {{ $comment->content }}</li>
        @endforeach
    </ul>
</div>
@endsection
