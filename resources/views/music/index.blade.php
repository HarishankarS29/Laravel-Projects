@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold">Latest Music</h2>
    <ul>
        @foreach($music as $track)
            <li>
                <p>{{ $track->title }}</p>
                <audio controls>
                    <source src="{{ asset('storage/' . $track->file_path) }}" type="audio/mpeg">
                    Your browser does not support the audio tag.
                </audio>
            </li>
        @endforeach
    </ul>
@endsection
