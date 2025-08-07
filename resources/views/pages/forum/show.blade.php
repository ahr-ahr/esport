@extends('layouts.app')

@section('title', 'Forum Thread')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Thread Title Example</h1>
    <div class="bg-white shadow rounded p-4 mb-4">
        <p class="text-gray-700">This is the content of the forum thread. Users can reply below.</p>
    </div>
    <div class="bg-gray-50 shadow rounded p-4">
        <textarea class="w-full border rounded p-2 mb-2" rows="3" placeholder="Write a reply..."></textarea>
        <button class="bg-[#ab0506d8] text-white px-4 py-2 rounded hover:bg-red-700">Reply</button>
    </div>
@endsection
