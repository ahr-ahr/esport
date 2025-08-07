@extends('layouts.app')

@section('title', 'Community Forum')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Forum Threads</h1>
    <div class="flex justify-end mb-4">
        <a href="{{ route('forum.create') }}" class="bg-[#ab0506d8] text-white px-4 py-2 rounded hover:bg-red-700">Create
            Thread</a>
    </div>
    <ul class="divide-y divide-gray-200 bg-white shadow rounded-lg">
        @for ($i = 1; $i <= 5; $i++)
            <li class="p-4 hover:bg-gray-100 flex justify-between">
                <a href="{{ route('forum.show', $i) }}" class="text-lg font-semibold text-gray-800">Thread Title
                    {{ $i }}</a>
                <span class="text-gray-500 text-sm">Replies: {{ rand(1, 10) }}</span>
            </li>
        @endfor
    </ul>
@endsection
