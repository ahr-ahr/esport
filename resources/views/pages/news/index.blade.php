@extends('layouts.app')

@section('title', 'Esport News')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Latest Esport News</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @for ($i = 1; $i <= 6; $i++)
            <div class="bg-white shadow-md rounded-lg p-4">
                <img src="https://via.placeholder.com/300x150" class="rounded mb-3" alt="News">
                <h2 class="text-lg font-bold">News Title {{ $i }}</h2>
                <p class="text-gray-600 text-sm mb-3">Short description about the news goes here.</p>
                <a href="{{ route('news.show', $i) }}" class="text-[#ab0506d8] font-semibold hover:underline">Read More</a>
            </div>
        @endfor
    </div>
@endsection
