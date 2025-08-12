@extends('layouts.app')

@section('title', 'Home')

@section('content')

@include('components.modals.login-modal')
@include('components.modals.register-modal')

  <section class="max-w-7xl mx-auto px-4 py-8">
    <div class="grid md:grid-cols-3 gap-6 items-stretch">

    <!-- LEFT: CAROUSEL (2 kolom) -->
    <div class="md:col-span-2">
      <div class="swiper rounded-2xl overflow-hidden shadow-lg ring-1 ring-white/10">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
        <img src="" alt="Featured Match 1"
          class="w-full h-72 md:h-[420px] object-cover object-center">
        </div>
        <div class="swiper-slide">
        <img src="" alt="Featured Match 2"
          class="w-full h-72 md:h-[420px] object-cover object-center">
        </div>
        <div class="swiper-slide">
        <img src="" alt="Featured Match 3"
          class="w-full h-72 md:h-[420px] object-cover object-center">
        </div>
      </div>

      <!-- Pagination + Nav -->
      <div class="swiper-pagination"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
      </div>
    </div>

    <!-- RIGHT: LIVE SCORE PANEL -->
    <aside class="bg-white/5 backdrop-blur rounded-2xl p-4 md:p-5 shadow-lg ring-1 ring-white/10 text-gray-100">
      <div class="flex items-center justify-between mb-3">
      <h3 class="text-lg font-bold text-orange-400">Live Score</h3>
      <span class="text-xs text-gray-400" id="lastUpdated">—</span>
      </div>

      <ul id="liveScoreList"
      class="space-y-3 max-h-[420px] overflow-auto pr-1 scrollbar-thin scrollbar-thumb-gray-700 scrollbar-track-transparent">
      <!-- Item dari JS -->
      </ul>

      <a href="{{ route('tournaments.index') }}"
      class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-white bg-orange-400 hover:bg-orange-500 px-4 py-2 rounded-lg transition">
      Lihat Semua Pertandingan
      <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
        <path
        d="M13.2 5.2a1 1 0 1 1 1.6-1.2l6 8a1 1 0 0 1 0 1.2l-6 8a1 1 0 1 1-1.6-1.2L18 13H4a1 1 0 1 1 0-2h14l-4.8-5.8Z" />
      </svg>
      </a>
    </aside>
    </div>
  </section>

  <section class="max-w-7xl mx-auto px-4 py-10">
    <div class="flex items-end justify-between mb-6">
    <h2 class="text-2xl md:text-3xl font-bold text-white">Berita Terbaru</h2>
    <a href="#"
      class="inline-flex items-center gap-2 text-sm font-semibold text-white bg-orange-400 hover:bg-orange-500 px-4 py-2 rounded-lg">
      Lihat Semua
      <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
      <path
        d="M13.2 5.2a1 1 0 1 1 1.6-1.2l6 8a1 1 0 0 1 0 1.2l-6 8a1 1 0 1 1-1.6-1.2L18 13H4a1 1 0 1 1 0-2h14l-4.8-5.8Z" />
      </svg>
    </a>
    </div>

    <!-- Container jadi flex horizontal -->
    <div class="flex gap-6 overflow-x-auto pb-4 snap-x snap-mandatory scrollbar-hide">

    <!-- Card -->
    <article
      class="flex-shrink-0 basis-1/4 min-w-[250px] snap-start group rounded-2xl overflow-hidden bg-white/5 ring-1 ring-white/10 shadow-lg">
      <a href="#" class="block overflow-hidden">
      <img src="" alt="RRQ Kalah Tipis dari EVOS di Grand Final MPL"
        class="h-44 w-full object-cover transition-transform duration-500 group-hover:scale-105">
      </a>
      <div class="p-4">
      <div class="flex items-center gap-2 text-xs text-gray-400 mb-2">
        <span class="px-2 py-0.5 rounded-full bg-[#FF9800]/20 text-[11px] text-[#FF9800]">MLBB</span>
        <span>•</span>
        <time>2 jam lalu</time>
      </div>
      <h3 class="text-base font-semibold text-gray-100 group-hover:text-white line-clamp-2">
        <a href="#">RRQ Kalah Tipis dari EVOS di Grand Final MPL</a>
      </h3>
      <p class="mt-2 text-sm text-gray-400 line-clamp-3">
        Pertandingan sengit antara RRQ dan EVOS di grand final MPL musim ini berakhir dengan skor tipis 3-2.
      </p>
      <a href="#"
        class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-[#FF9800] hover:text-orange-400">
        Baca Selengkapnya
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
        <path
          d="M13.2 5.2a1 1 0 1 1 1.6-1.2l6 8a1 1 0 0 1 0 1.2l-6 8a1 1 0 1 1-1.6-1.2L18 13H4a1 1 0 1 1 0-2h14l-4.8-5.8Z" />
        </svg>
      </a>
      </div>
    </article>
    <article
      class="flex-shrink-0 basis-1/4 min-w-[250px] snap-start group rounded-2xl overflow-hidden bg-white/5 ring-1 ring-white/10 shadow-lg">
      <a href="#" class="block overflow-hidden">
      <img src="" alt="RRQ Kalah Tipis dari EVOS di Grand Final MPL"
        class="h-44 w-full object-cover transition-transform duration-500 group-hover:scale-105">
      </a>
      <div class="p-4">
      <div class="flex items-center gap-2 text-xs text-gray-400 mb-2">
        <span class="px-2 py-0.5 rounded-full bg-[#FF9800]/20 text-[11px] text-[#FF9800]">MLBB</span>
        <span>•</span>
        <time>2 jam lalu</time>
      </div>
      <h3 class="text-base font-semibold text-gray-100 group-hover:text-white line-clamp-2">
        <a href="#">RRQ Kalah Tipis dari EVOS di Grand Final MPL</a>
      </h3>
      <p class="mt-2 text-sm text-gray-400 line-clamp-3">
        Pertandingan sengit antara RRQ dan EVOS di grand final MPL musim ini berakhir dengan skor tipis 3-2.
      </p>
      <a href="#"
        class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-[#FF9800] hover:text-orange-400">
        Baca Selengkapnya
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
        <path
          d="M13.2 5.2a1 1 0 1 1 1.6-1.2l6 8a1 1 0 0 1 0 1.2l-6 8a1 1 0 1 1-1.6-1.2L18 13H4a1 1 0 1 1 0-2h14l-4.8-5.8Z" />
        </svg>
      </a>
      </div>
    </article>
    <article
      class="flex-shrink-0 basis-1/4 min-w-[250px] snap-start group rounded-2xl overflow-hidden bg-white/5 ring-1 ring-white/10 shadow-lg">
      <a href="#" class="block overflow-hidden">
      <img src="" alt="RRQ Kalah Tipis dari EVOS di Grand Final MPL"
        class="h-44 w-full object-cover transition-transform duration-500 group-hover:scale-105">
      </a>
      <div class="p-4">
      <div class="flex items-center gap-2 text-xs text-gray-400 mb-2">
        <span class="px-2 py-0.5 rounded-full bg-[#FF9800]/20 text-[11px] text-[#FF9800]">MLBB</span>
        <span>•</span>
        <time>2 jam lalu</time>
      </div>
      <h3 class="text-base font-semibold text-gray-100 group-hover:text-white line-clamp-2">
        <a href="#">RRQ Kalah Tipis dari EVOS di Grand Final MPL</a>
      </h3>
      <p class="mt-2 text-sm text-gray-400 line-clamp-3">
        Pertandingan sengit antara RRQ dan EVOS di grand final MPL musim ini berakhir dengan skor tipis 3-2.
      </p>
      <a href="#"
        class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-[#FF9800] hover:text-orange-400">
        Baca Selengkapnya
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
        <path
          d="M13.2 5.2a1 1 0 1 1 1.6-1.2l6 8a1 1 0 0 1 0 1.2l-6 8a1 1 0 1 1-1.6-1.2L18 13H4a1 1 0 1 1 0-2h14l-4.8-5.8Z" />
        </svg>
      </a>
      </div>
    </article>
    <article
      class="flex-shrink-0 basis-1/4 min-w-[250px] snap-start group rounded-2xl overflow-hidden bg-white/5 ring-1 ring-white/10 shadow-lg">
      <a href="#" class="block overflow-hidden">
      <img src="" alt="RRQ Kalah Tipis dari EVOS di Grand Final MPL"
        class="h-44 w-full object-cover transition-transform duration-500 group-hover:scale-105">
      </a>
      <div class="p-4">
      <div class="flex items-center gap-2 text-xs text-gray-400 mb-2">
        <span class="px-2 py-0.5 rounded-full bg-[#FF9800]/20 text-[11px] text-[#FF9800]">MLBB</span>
        <span>•</span>
        <time>2 jam lalu</time>
      </div>
      <h3 class="text-base font-semibold text-gray-100 group-hover:text-white line-clamp-2">
        <a href="#">RRQ Kalah Tipis dari EVOS di Grand Final MPL</a>
      </h3>
      <p class="mt-2 text-sm text-gray-400 line-clamp-3">
        Pertandingan sengit antara RRQ dan EVOS di grand final MPL musim ini berakhir dengan skor tipis 3-2.
      </p>
      <a href="#"
        class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-[#FF9800] hover:text-orange-400">
        Baca Selengkapnya
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
        <path
          d="M13.2 5.2a1 1 0 1 1 1.6-1.2l6 8a1 1 0 0 1 0 1.2l-6 8a1 1 0 1 1-1.6-1.2L18 13H4a1 1 0 1 1 0-2h14l-4.8-5.8Z" />
        </svg>
      </a>
      </div>
    </article>

    <!-- Card lainnya tinggal copy -->
    </div>
  </section>


<section class="max-w-7xl mx-auto px-4 py-10">
  <div class="flex items-end justify-between mb-6">
    <h2 class="text-2xl md:text-3xl font-bold text-white">Turnamen</h2>
    <a href="#"
      class="inline-flex items-center gap-2 text-sm font-semibold text-white bg-orange-400 hover:bg-orange-500 px-4 py-2 rounded-lg">
      Lihat Semua
      <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
      <path
        d="M13.2 5.2a1 1 0 1 1 1.6-1.2l6 8a1 1 0 0 1 0 1.2l-6 8a1 1 0 1 1-1.6-1.2L18 13H4a1 1 0 1 1 0-2h14l-4.8-5.8Z" />
      </svg>
    </a>
  </div>

  <!-- Scroll container -->
  <div class="flex gap-6 overflow-x-auto pb-4 scrollbar-hide snap-x snap-mandatory">
    
    <!-- Turnamen 1 -->
    <article class="tnm-card group rounded-2xl overflow-hidden bg-white/5 ring-1 ring-white/10 shadow-lg min-w-[280px] snap-start">
      <a href="#" class="block overflow-hidden">
        <img src="" alt="MPL Community Cup"
          class="h-40 w-full object-cover transition-transform duration-500 group-hover:scale-105">
      </a>
      <div class="p-4">
        <div class="flex items-center justify-between mb-2">
          <span class="px-2 py-0.5 rounded-full bg-[#FF9800]/20 text-[11px] text-[#FF9800]">MLBB</span>
          <span class="text-[10px] px-2 py-0.5 rounded-full text-white bg-yellow-500/80">UPCOMING</span>
        </div>
        <h3 class="text-base font-semibold text-gray-100 group-hover:text-white line-clamp-2">
          <a href="#">MPL Community Cup</a>
        </h3>
        <div class="mt-3 space-y-1 text-sm text-gray-300">
          <div class="flex items-center gap-2"><i class="fa fa-calendar text-xs opacity-70"></i> <span>10–12 Okt 2025</span></div>
          <div class="flex items-center gap-2"><i class="fa fa-trophy text-xs opacity-70"></i> <span>Prize Pool: Rp 25.000.000</span></div>
          <div class="flex items-center gap-2"><i class="fa fa-users text-xs opacity-70"></i> <span>Slots: 64/64 (Full)</span></div>
        </div>
        <div class="mt-4 flex items-center gap-2">
          <a href="#" class="inline-flex items-center gap-2 text-sm font-semibold text-white bg-[#FF9800] hover:bg-orange-600 px-3 py-2 rounded-lg">
            Lihat Detail <i class="fa fa-arrow-right text-xs"></i>
          </a>
          <button class="ml-auto inline-flex items-center gap-2 text-sm font-semibold text-gray-900 bg-white hover:bg-gray-100 px-3 py-2 rounded-lg">
            Daftar <i class="fa fa-edit text-xs"></i>
          </button>
        </div>
      </div>
    </article>

    <!-- Turnamen 2 -->
    <article class="tnm-card group rounded-2xl overflow-hidden bg-white/5 ring-1 ring-white/10 shadow-lg min-w-[280px] snap-start">
      <a href="#" class="block overflow-hidden">
        <img src="" alt="SEA Valorant Open"
          class="h-40 w-full object-cover transition-transform duration-500 group-hover:scale-105">
      </a>
      <div class="p-4">
        <div class="flex items-center justify-between mb-2">
          <span class="px-2 py-0.5 rounded-full bg-[#FF9800]/20 text-[11px] text-[#FF9800]">VALO</span>
          <span class="text-[10px] px-2 py-0.5 rounded-full text-white bg-red-600/90">LIVE</span>
        </div>
        <h3 class="text-base font-semibold text-gray-100 group-hover:text-white line-clamp-2">
          <a href="#">SEA Valorant Open</a>
        </h3>
        <div class="mt-3 space-y-1 text-sm text-gray-300">
          <div class="flex items-center gap-2"><i class="fa fa-calendar text-xs opacity-70"></i> <span>Hari ini • 19:00</span></div>
          <div class="flex items-center gap-2"><i class="fa fa-trophy text-xs opacity-70"></i> <span>Prize Pool: Rp 15.000.000</span></div>
          <div class="flex items-center gap-2"><i class="fa fa-users text-xs opacity-70"></i> <span>Slots: 14/16</span></div>
        </div>
        <div class="mt-4 flex items-center gap-2">
          <a href="#" class="inline-flex items-center gap-2 text-sm font-semibold text-white bg-[#FF9800] hover:bg-orange-600 px-3 py-2 rounded-lg">
            Lihat Detail <i class="fa fa-arrow-right text-xs"></i>
          </a>
        </div>
      </div>
    </article>

    <!-- Turnamen 3 -->
    <article class="tnm-card group rounded-2xl overflow-hidden bg-white/5 ring-1 ring-white/10 shadow-lg min-w-[280px] snap-start">
      <a href="#" class="block overflow-hidden">
        <img src="" alt="DPC Qualifier"
          class="h-40 w-full object-cover transition-transform duration-500 group-hover:scale-105">
      </a>
      <div class="p-4">
        <div class="flex items-center justify-between mb-2">
          <span class="px-2 py-0.5 rounded-full bg-[#FF9800]/20 text-[11px] text-[#FF9800]">DOTA2</span>
          <span class="text-[10px] px-2 py-0.5 rounded-full text-white bg-yellow-500/80">UPCOMING</span>
        </div>
        <h3 class="text-base font-semibold text-gray-100 group-hover:text-white line-clamp-2">
          <a href="#">DPC Qualifier</a>
        </h3>
        <div class="mt-3 space-y-1 text-sm text-gray-300">
          <div class="flex items-center gap-2"><i class="fa fa-calendar text-xs opacity-70"></i> <span>22–24 Sep 2025</span></div>
          <div class="flex items-center gap-2"><i class="fa fa-trophy text-xs opacity-70"></i> <span>Prize Pool: Rp 40.000.000</span></div>
          <div class="flex items-center gap-2"><i class="fa fa-users text-xs opacity-70"></i> <span>Slots: 32/64</span></div>
        </div>
        <div class="mt-4 flex items-center gap-2">
          <a href="#" class="inline-flex items-center gap-2 text-sm font-semibold text-white bg-[#FF9800] hover:bg-orange-600 px-3 py-2 rounded-lg">
            Lihat Detail <i class="fa fa-arrow-right text-xs"></i>
          </a>
          <button class="ml-auto inline-flex items-center gap-2 text-sm font-semibold text-gray-900 bg-white hover:bg-gray-100 px-3 py-2 rounded-lg">
            Daftar <i class="fa fa-edit text-xs"></i>
          </button>
        </div>
      </div>
    </article>
    <!-- Turnamen 1 -->
    <article class="tnm-card group rounded-2xl overflow-hidden bg-white/5 ring-1 ring-white/10 shadow-lg min-w-[280px] snap-start">
      <a href="#" class="block overflow-hidden">
        <img src="" alt="MPL Community Cup"
          class="h-40 w-full object-cover transition-transform duration-500 group-hover:scale-105">
      </a>
      <div class="p-4">
        <div class="flex items-center justify-between mb-2">
          <span class="px-2 py-0.5 rounded-full bg-[#FF9800]/20 text-[11px] text-[#FF9800]">MLBB</span>
          <span class="text-[10px] px-2 py-0.5 rounded-full text-white bg-yellow-500/80">UPCOMING</span>
        </div>
        <h3 class="text-base font-semibold text-gray-100 group-hover:text-white line-clamp-2">
          <a href="#">MPL Community Cup</a>
        </h3>
        <div class="mt-3 space-y-1 text-sm text-gray-300">
          <div class="flex items-center gap-2"><i class="fa fa-calendar text-xs opacity-70"></i> <span>10–12 Okt 2025</span></div>
          <div class="flex items-center gap-2"><i class="fa fa-trophy text-xs opacity-70"></i> <span>Prize Pool: Rp 25.000.000</span></div>
          <div class="flex items-center gap-2"><i class="fa fa-users text-xs opacity-70"></i> <span>Slots: 64/64 (Full)</span></div>
        </div>
        <div class="mt-4 flex items-center gap-2">
          <a href="#" class="inline-flex items-center gap-2 text-sm font-semibold text-white bg-[#FF9800] hover:bg-orange-600 px-3 py-2 rounded-lg">
            Lihat Detail <i class="fa fa-arrow-right text-xs"></i>
          </a>
          <button class="ml-auto inline-flex items-center gap-2 text-sm font-semibold text-gray-900 bg-white hover:bg-gray-100 px-3 py-2 rounded-lg">
            Daftar <i class="fa fa-edit text-xs"></i>
          </button>
        </div>
      </div>
    </article>

    <!-- Turnamen 2 -->
    <article class="tnm-card group rounded-2xl overflow-hidden bg-white/5 ring-1 ring-white/10 shadow-lg min-w-[280px] snap-start">
      <a href="#" class="block overflow-hidden">
        <img src="" alt="SEA Valorant Open"
          class="h-40 w-full object-cover transition-transform duration-500 group-hover:scale-105">
      </a>
      <div class="p-4">
        <div class="flex items-center justify-between mb-2">
          <span class="px-2 py-0.5 rounded-full bg-[#FF9800]/20 text-[11px] text-[#FF9800]">VALO</span>
          <span class="text-[10px] px-2 py-0.5 rounded-full text-white bg-red-600/90">LIVE</span>
        </div>
        <h3 class="text-base font-semibold text-gray-100 group-hover:text-white line-clamp-2">
          <a href="#">SEA Valorant Open</a>
        </h3>
        <div class="mt-3 space-y-1 text-sm text-gray-300">
          <div class="flex items-center gap-2"><i class="fa fa-calendar text-xs opacity-70"></i> <span>Hari ini • 19:00</span></div>
          <div class="flex items-center gap-2"><i class="fa fa-trophy text-xs opacity-70"></i> <span>Prize Pool: Rp 15.000.000</span></div>
          <div class="flex items-center gap-2"><i class="fa fa-users text-xs opacity-70"></i> <span>Slots: 14/16</span></div>
        </div>
        <div class="mt-4 flex items-center gap-2">
          <a href="#" class="inline-flex items-center gap-2 text-sm font-semibold text-white bg-[#FF9800] hover:bg-orange-600 px-3 py-2 rounded-lg">
            Lihat Detail <i class="fa fa-arrow-right text-xs"></i>
          </a>
        </div>
      </div>
    </article>

    <!-- Turnamen 3 -->
    <article class="tnm-card group rounded-2xl overflow-hidden bg-white/5 ring-1 ring-white/10 shadow-lg min-w-[280px] snap-start">
      <a href="#" class="block overflow-hidden">
        <img src="" alt="DPC Qualifier"
          class="h-40 w-full object-cover transition-transform duration-500 group-hover:scale-105">
      </a>
      <div class="p-4">
        <div class="flex items-center justify-between mb-2">
          <span class="px-2 py-0.5 rounded-full bg-[#FF9800]/20 text-[11px] text-[#FF9800]">DOTA2</span>
          <span class="text-[10px] px-2 py-0.5 rounded-full text-white bg-yellow-500/80">UPCOMING</span>
        </div>
        <h3 class="text-base font-semibold text-gray-100 group-hover:text-white line-clamp-2">
          <a href="#">DPC Qualifier</a>
        </h3>
        <div class="mt-3 space-y-1 text-sm text-gray-300">
          <div class="flex items-center gap-2"><i class="fa fa-calendar text-xs opacity-70"></i> <span>22–24 Sep 2025</span></div>
          <div class="flex items-center gap-2"><i class="fa fa-trophy text-xs opacity-70"></i> <span>Prize Pool: Rp 40.000.000</span></div>
          <div class="flex items-center gap-2"><i class="fa fa-users text-xs opacity-70"></i> <span>Slots: 32/64</span></div>
        </div>
        <div class="mt-4 flex items-center gap-2">
          <a href="#" class="inline-flex items-center gap-2 text-sm font-semibold text-white bg-[#FF9800] hover:bg-orange-600 px-3 py-2 rounded-lg">
            Lihat Detail <i class="fa fa-arrow-right text-xs"></i>
          </a>
          <button class="ml-auto inline-flex items-center gap-2 text-sm font-semibold text-gray-900 bg-white hover:bg-gray-100 px-3 py-2 rounded-lg">
            Daftar <i class="fa fa-edit text-xs"></i>
          </button>
        </div>
      </div>
    </article>

  </div>
</section>


  <section class="max-w-7xl mx-auto px-4 py-10">
    <div class="flex items-end justify-between mb-6">
    <h2 class="text-2xl md:text-3xl font-bold text-white">Forum</h2>

    <div class="flex items-center gap-2">
      <a href="#"
      class="hidden sm:inline-flex items-center gap-2 text-sm font-semibold text-white bg-orange-400 hover:bg-orange-500 px-4 py-2 rounded-lg">
      Lihat Semua
      <i class="fa fa-arrow-right text-xs"></i>
      </a>
    </div>
    </div>

    <div id="forumList" class="space-y-3">
    <!-- Item 1 -->
    <article
      class="forum-item flex items-start gap-4 p-4 rounded-xl bg-white/5 hover:bg-white/10 ring-1 ring-white/10 transition"
      data-badge="TRENDING">
      <img src="https://ui-avatars.com/api/?name=Rian&background=FF9800&color=fff" alt="Rian"
      class="w-10 h-10 rounded-full object-cover">
      <div class="flex-1 min-w-0">
      <div class="flex flex-wrap items-center gap-2">
        <a href="#" class="text-base md:text-lg font-semibold text-gray-100 hover:text-white truncate">
        Tips Draft MLBB: Counter Hero Meta Tanpa Ban
        </a>
        <span class="px-2 py-0.5 rounded-full text-[11px] bg-[#FF9800]/20 text-[#FF9800]">MLBB</span>
      </div>
      <div class="mt-1 text-xs text-gray-400">Dibuat oleh <span class="text-gray-300">Rian</span></div>
      </div>
      <div class="shrink-0 text-right">
      <div class="flex items-center gap-3 text-gray-300">
        <span class="inline-flex items-center gap-1 text-sm"><i
          class="fa fa-comment-dots text-xs opacity-70"></i>34</span>
        <span class="inline-flex items-center gap-1 text-sm"><i class="fa fa-eye text-xs opacity-70"></i>2,100</span>
      </div>
      <div class="text-[11px] text-gray-400 mt-1">10 menit lalu • oleh Sasa</div>
      </div>
    </article>

    <!-- Item 2 -->
    <article
      class="forum-item flex items-start gap-4 p-4 rounded-xl bg-white/5 hover:bg-white/10 ring-1 ring-white/10 transition"
      data-badge="NEW">
      <img src="https://images.unsplash.com/photo-1544723795-3fb6469f5b39?q=80&w=80&h=80&fit=crop" alt="Kevin"
      class="w-10 h-10 rounded-full object-cover">
      <div class="flex-1 min-w-0">
      <div class="flex flex-wrap items-center gap-2">
        <a href="#" class="text-base md:text-lg font-semibold text-gray-100 hover:text-white truncate">
        Setting Sensitivity Valorant untuk Aim Stabil
        </a>
        <span class="px-2 py-0.5 rounded-full text-[11px] bg-[#FF9800]/20 text-[#FF9800]">VALO</span>
      </div>
      <div class="mt-1 text-xs text-gray-400">Dibuat oleh <span class="text-gray-300">Kevin</span></div>
      </div>
      <div class="shrink-0 text-right">
      <div class="flex items-center gap-3 text-gray-300">
        <span class="inline-flex items-center gap-1 text-sm"><i
          class="fa fa-comment-dots text-xs opacity-70"></i>12</span>
        <span class="inline-flex items-center gap-1 text-sm"><i class="fa fa-eye text-xs opacity-70"></i>880</span>
      </div>
      <div class="text-[11px] text-gray-400 mt-1">1 jam lalu • oleh Naya</div>
      </div>
    </article>

    <!-- Item 3 -->
    <article
      class="forum-item flex items-start gap-4 p-4 rounded-xl bg-white/5 hover:bg-white/10 ring-1 ring-white/10 transition"
      data-badge="TRENDING">
      <img src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?q=80&w=80&h=80&fit=crop" alt="Tomo"
      class="w-10 h-10 rounded-full object-cover">
      <div class="flex-1 min-w-0">
      <div class="flex flex-wrap items-center gap-2">
        <a href="#" class="text-base md:text-lg font-semibold text-gray-100 hover:text-white truncate">
        DOTA2: Kapan Harus Beli BKB? Diskusi Timing & Matchup
        </a>
        <span class="px-2 py-0.5 rounded-full text-[11px] bg-[#FF9800]/20 text-[#FF9800]">DOTA2</span>
      </div>
      <div class="mt-1 text-xs text-gray-400">Dibuat oleh <span class="text-gray-300">Tomo</span></div>
      </div>
      <div class="shrink-0 text-right">
      <div class="flex items-center gap-3 text-gray-300">
        <span class="inline-flex items-center gap-1 text-sm"><i
          class="fa fa-comment-dots text-xs opacity-70"></i>57</span>
        <span class="inline-flex items-center gap-1 text-sm"><i class="fa fa-eye text-xs opacity-70"></i>4,320</span>
      </div>
      <div class="text-[11px] text-gray-400 mt-1">Kemarin • oleh Neo</div>
      </div>
    </article>

    <!-- Item 4 -->
    <article
      class="forum-item flex items-start gap-4 p-4 rounded-xl bg-white/5 hover:bg-white/10 ring-1 ring-white/10 transition"
      data-badge="ALL">
      <img src="https://ui-avatars.com/api/?name=Lina&background=333333&color=fff" alt="Lina"
      class="w-10 h-10 rounded-full object-cover">
      <div class="flex-1 min-w-0">
      <div class="flex flex-wrap items-center gap-2">
        <a href="#" class="text-base md:text-lg font-semibold text-gray-100 hover:text-white truncate">
        Rekomendasi Headset Murah untuk Scrim Online
        </a>
        <span class="px-2 py-0.5 rounded-full text-[11px] bg-[#FF9800]/20 text-[#FF9800]">Gear</span>
      </div>
      <div class="mt-1 text-xs text-gray-400">Dibuat oleh <span class="text-gray-300">Lina</span></div>
      </div>
      <div class="shrink-0 text-right">
      <div class="flex items-center gap-3 text-gray-300">
        <span class="inline-flex items-center gap-1 text-sm"><i
          class="fa fa-comment-dots text-xs opacity-70"></i>8</span>
        <span class="inline-flex items-center gap-1 text-sm"><i class="fa fa-eye text-xs opacity-70"></i>560</span>
      </div>
      <div class="text-[11px] text-gray-400 mt-1">2 hari lalu • oleh Lina</div>
      </div>
    </article>

    <!-- Item 5 -->
    <article
      class="forum-item flex items-start gap-4 p-4 rounded-xl bg-white/5 hover:bg-white/10 ring-1 ring-white/10 transition"
      data-badge="NEW">
      <img src="https://images.unsplash.com/photo-1527980965255-d3b416303d12?q=80&w=80&h=80&fit=crop" alt="Agus"
      class="w-10 h-10 rounded-full object-cover">
      <div class="flex-1 min-w-0">
      <div class="flex flex-wrap items-center gap-2">
        <a href="#" class="text-base md:text-lg font-semibold text-gray-100 hover:text-white truncate">
        Sharing Bracket Community Cup Kampus
        </a>
        <span class="px-2 py-0.5 rounded-full text-[11px] bg-[#FF9800]/20 text-[#FF9800]">MLBB</span>
      </div>
      <div class="mt-1 text-xs text-gray-400">Dibuat oleh <span class="text-gray-300">Agus</span></div>
      </div>
      <div class="shrink-0 text-right">
      <div class="flex items-center gap-3 text-gray-300">
        <span class="inline-flex items-center gap-1 text-sm"><i
          class="fa fa-comment-dots text-xs opacity-70"></i>5</span>
        <span class="inline-flex items-center gap-1 text-sm"><i class="fa fa-eye text-xs opacity-70"></i>300</span>
      </div>
      <div class="text-[11px] text-gray-400 mt-1">3 hari lalu • oleh Agus</div>
      </div>
    </article>
    </div>
  </section>

@endsection

@push('styles')
  <style>
    /* scrollbar tipis untuk panel live score */
    #liveScoreList::-webkit-scrollbar {
    width: 6px;
    }

    #liveScoreList::-webkit-scrollbar-thumb {
    background: rgba(255, 255, 255, 0.2);
    border-radius: 9999px;
    }

    .scrollbar-hide::-webkit-scrollbar {
    display: none;
    }

    .scrollbar-hide {
    -ms-overflow-style: none;
    /* IE and Edge */
    scrollbar-width: none;
    /* Firefox */
    }
  </style>
@endpush

@push('scripts')
  <script>
    // Tunggu DOM siap & Swiper sudah ter-load
    document.addEventListener('DOMContentLoaded', function () {
    if (window.Swiper) {
      const swiper = new Swiper('.swiper', {
      loop: true,
      autoplay: { delay: 4000, disableOnInteraction: false },
      pagination: { el: '.swiper-pagination', clickable: true },
      navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' }
      });
    } else {
      console.error('Swiper CDN belum termuat.');
    }

    // ====== Dummy Live Score ======
    const matches = [
      { game: 'MLBB', a: 'EVOS', b: 'RRQ', sa: 2, sb: 1, status: 'LIVE • BO3', minute: "G3 12'" },
      { game: 'VALO', a: 'PRX', b: 'DRX', sa: 7, sb: 9, status: 'LIVE • Map 2', minute: 'Round 17' },
      { game: 'DOTA2', a: 'Talon', b: 'LGD', sa: 1, sb: 0, status: 'UPCOMING • 19:30', minute: '' },
    ];

    const list = document.getElementById('liveScoreList');
    const updated = document.getElementById('lastUpdated');

    const badge = (s) => {
      const live = s.startsWith('LIVE');
      return `<span class="text-[10px] px-2 py-0.5 rounded-full ${live ? 'bg-red-600/90' : 'bg-gray-500/60'}">${s}</span>`;
    };

    const row = (m) => `
      <li class="rounded-lg bg-white/5 hover:bg-white/10 transition p-3 ring-1 ring-white/10">
      <div class="flex items-center justify-between mb-1">
        <span class="text-xs text-gray-300">${m.game}</span>
        ${badge(m.status)}
      </div>
      <div class="flex items-center justify-between">
        <div class="flex flex-col">
        <span class="text-sm font-semibold">${m.a}</span>
        <span class="text-sm font-semibold">${m.b}</span>
        </div>
        <div class="text-right">
        <div class="text-xl font-bold" style="letter-spacing:1px">${m.sa} : ${m.sb}</div>
        <div class="text-xs text-gray-400">${m.minute || '&nbsp;'}</div>
        </div>
      </div>
      </li>
    `;

    function renderScores() {
      list.innerHTML = matches.map(row).join('');
      updated.textContent = 'Updated just now';
    }

    renderScores();
    setInterval(() => {
      matches.forEach(m => {
      if (m.status.startsWith('LIVE') && Math.random() > 0.5) {
        Math.random() > 0.5 ? m.sa++ : m.sb++;
      }
      });
      renderScores();
    }, 10000);
    });

  </script>
@endpush

@push('scripts')
  <script>
    // Filter sederhana by game
    const buttons = document.querySelectorAll('.tnm-filter');
    const cards = document.querySelectorAll('.tnm-card');

    buttons.forEach(btn => {
    btn.addEventListener('click', () => {
      buttons.forEach(b => b.classList.remove('active', 'bg-[#ab0506d8]', 'text-white'));
      buttons.forEach(b => b.classList.add('text-gray-200'));
      btn.classList.add('active', 'bg-[#ab0506d8]', 'text-white');
      btn.classList.remove('text-gray-200');

      const filter = btn.dataset.filter;
      cards.forEach(card => {
      const game = card.dataset.game;
      card.style.display = (filter === 'ALL' || game === filter) ? '' : 'none';
      });
    });
    });
  </script>
@endpush

@push('scripts')
  <script>
    // Filter tab (All / Trending / New)
    const tabs = document.querySelectorAll('.forum-tab');
    const items = document.querySelectorAll('.forum-item');

    tabs.forEach(tab => {
    tab.addEventListener('click', () => {
      tabs.forEach(t => {
      t.classList.remove('active', 'bg-[#ab0506d8]', 'text-white');
      t.classList.add('text-gray-200');
      });
      tab.classList.add('active', 'bg-[#ab0506d8]', 'text-white');
      tab.classList.remove('text-gray-200');

      const mode = tab.dataset.tab; // ALL | TRENDING | NEW
      items.forEach(el => {
      const badge = el.dataset.badge || 'ALL';
      el.style.display = (mode === 'ALL' || badge === mode) ? '' : 'none';
      });
    });
    });
  </script>
@endpush