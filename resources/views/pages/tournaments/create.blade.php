@extends('layouts.app')

@section('title', 'Create Tournament')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Create Tournament</h1>
    <form class="bg-white shadow rounded-lg p-6 max-w-lg">
        <div class="mb-4">
            <label class="block mb-2 font-semibold">Tournament Name</label>
            <input type="text" class="w-full border rounded p-2" placeholder="Enter tournament name">
        </div>
        <div class="mb-4">
            <label class="block mb-2 font-semibold">Date</label>
            <input type="date" class="w-full border rounded p-2">
        </div>
        <button type="submit" class="bg-[#ab0506d8] text-white px-4 py-2 rounded hover:bg-red-700">Create</button>
    </form>
@endsection
