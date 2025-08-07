@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="min-h-screen flex flex-col">
        <!-- Konten utama -->
        <div class="flex-grow flex flex-col justify-center items-center text-center">
            <h1 class="text-4xl font-bold text-[#ab0506d8] mb-4">Welcome to Esport Platform</h1>
            <p class="text-gray-600 mb-6">Get the latest news, join tournaments, and connect with the community!</p>
            <a href="#" class="bg-[#ab0506d8] text-white px-6 py-3 rounded-lg hover:bg-red-700">Explore News</a>
        </div>

    </div>
@endsection
