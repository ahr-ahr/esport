@extends('layouts.app')

@section('title', 'Tournaments')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Upcoming Tournaments</h1>
    <div class="flex justify-end mb-4">
        <a href="{{ route('tournaments.create') }}"
            class="bg-[#ab0506d8] text-white px-4 py-2 rounded hover:bg-red-700">Create Tournament</a>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @for ($i = 1; $i <= 4; $i++)
            <div class="bg-white shadow rounded-lg p-4">
                <h2 class="text-xl font-bold mb-2">Tournament {{ $i }}</h2>
                <p class="text-gray-600 mb-2">Starts on: 2025-08-10</p>
                <div class="flex gap-2">
                    <a href="#" class="text-blue-500 hover:underline">View</a>
                    <a href="{{ route('tournaments.edit', $i) }}" class="text-green-500 hover:underline">Edit</a>
                </div>
            </div>
        @endfor
    </div>
@endsection
