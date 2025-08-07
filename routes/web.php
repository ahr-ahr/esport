<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('/', 'pages.home')->name('home');

// ==========================
// Berita (News)
// ==========================
Route::view('/news', 'pages.news.index')->name('news.index');
Route::view('/news/{id}', 'pages.news.show')->name('news.show');

// ==========================
// Turnamen (Tournaments)
// ==========================
Route::view('/tournaments', 'pages.tournaments.index')->name('tournaments.index');
Route::view('/tournaments/create', 'pages.tournaments.create')->name('tournaments.create');
Route::view('/tournaments/{id}/edit', 'pages.tournaments.edit')->name('tournaments.edit');

// ==========================
// Forum Komunitas
// ==========================
Route::view('/forum', 'pages.forum.index')->name('forum.index');
Route::view('/forum/create', 'pages.forum.create')->name('forum.create');
Route::view('/forum/{id}', 'pages.forum.show')->name('forum.show');

// ==========================
// Autentikasi (Auth)
// ==========================
Route::view('/login', 'auth.login')->name('login');
Route::view('/register', 'auth.register')->name('register');
Route::view('/verify', 'auth.verify')->name('verify');
