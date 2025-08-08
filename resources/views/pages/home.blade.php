@extends('layouts.app')

@section('title', 'Home')

@section('content')
<section class="max-w-7xl mx-auto px-4 py-8">
  <div class="grid md:grid-cols-3 gap-6 items-stretch">
    <!-- LEFT: CAROUSEL (2 kolom) -->
    <div class="md:col-span-2">
      <div class="swiper rounded-2xl overflow-hidden shadow-lg ring-1 ring-white/10">
        <div class="swiper-wrapper">
          <!-- Slide 1 -->
          <div class="swiper-slide">
            <img src="{{ asset('images/slide1.jpg') }}" alt="Featured Match 1" class="w-full h-72 md:h-[420px] object-cover">
          </div>
          <!-- Slide 2 -->
          <div class="swiper-slide">
            <img src="{{ asset('images/slide2.jpg') }}" alt="Featured Match 2" class="w-full h-72 md:h-[420px] object-cover">
          </div>
          <!-- Slide 3 -->
          <div class="swiper-slide">
            <img src="{{ asset('images/slide3.jpg') }}" alt="Featured Match 3" class="w-full h-72 md:h-[420px] object-cover">
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
        <h3 class="text-lg font-bold" style="color:#ab0506d8">Live Score</h3>
        <span class="text-xs text-gray-400" id="lastUpdated">—</span>
      </div>

      <ul id="liveScoreList" class="space-y-3 max-h-[420px] overflow-auto pr-1">
        <!-- Example item -->
        <!-- item akan diisi JS; kalau mau statis, taruh <li> manual -->
      </ul>

      <a href="{{ route('tournaments.index') }}"
         class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-white bg-[#ab0506d8] hover:bg-red-700 px-4 py-2 rounded-lg">
        Lihat Semua Pertandingan
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M13.2 5.2a1 1 0 1 1 1.6-1.2l6 8a1 1 0 0 1 0 1.2l-6 8a1 1 0 1 1-1.6-1.2L18 13H4a1 1 0 1 1 0-2h14l-4.8-5.8Z"/></svg>
      </a>
    </aside>
  </div>
</section>

<section class="max-w-7xl mx-auto px-4 py-10">
  <div class="flex items-end justify-between mb-6">
    <h2 class="text-2xl md:text-3xl font-bold text-white">Berita Terbaru</h2>
    <a href="#"
       class="inline-flex items-center gap-2 text-sm font-semibold text-white bg-[#ab0506d8] hover:bg-red-700 px-4 py-2 rounded-lg">
      Lihat Semua
      <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M13.2 5.2a1 1 0 1 1 1.6-1.2l6 8a1 1 0 0 1 0 1.2l-6 8a1 1 0 1 1-1.6-1.2L18 13H4a1 1 0 1 1 0-2h14l-4.8-5.8Z"/></svg>
    </a>
  </div>

  @php
    $dummyNews = [
      [
        'title' => 'RRQ Kalah Tipis dari EVOS di Grand Final MPL',
        'category' => 'MLBB',
        'time' => '2 jam lalu',
        'excerpt' => 'Pertandingan sengit antara RRQ dan EVOS di grand final MPL musim ini berakhir dengan skor tipis 3-2.',
        'image' => asset('images/news1.jpg')
      ],
      [
        'title' => 'Talon Esports Menang Telak di DPC SEA',
        'category' => 'DOTA2',
        'time' => '5 jam lalu',
        'excerpt' => 'Talon Esports berhasil mengalahkan lawannya dengan skor telak 2-0 dalam lanjutan DPC SEA.',
        'image' => asset('images/news2.jpg')
      ],
      [
        'title' => 'DRX Comeback Lawan PRX di Valorant Champions',
        'category' => 'VALO',
        'time' => '1 hari lalu',
        'excerpt' => 'DRX menunjukkan mental juara dengan comeback dramatis melawan Paper Rex di turnamen Valorant Champions.',
        'image' => asset('images/news3.jpg')
      ],
    ];
  @endphp

  <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
    @foreach($dummyNews as $item)
      <article class="group rounded-2xl overflow-hidden bg-white/5 ring-1 ring-white/10 shadow-lg">
        <a href="#" class="block overflow-hidden">
          <img src="{{ $item['image'] }}"
               alt="{{ $item['title'] }}"
               class="h-44 w-full object-cover transition-transform duration-500 group-hover:scale-105">
        </a>

        <div class="p-4">
          <div class="flex items-center gap-2 text-xs text-gray-400 mb-2">
            <span class="px-2 py-0.5 rounded-full bg-[#ab0506d8]/20 text-[11px] text-[#ab0506d8]">
              {{ $item['category'] }}
            </span>
            <span>•</span>
            <time>{{ $item['time'] }}</time>
          </div>

          <h3 class="text-base font-semibold text-gray-100 group-hover:text-white line-clamp-2">
            <a href="#">{{ $item['title'] }}</a>
          </h3>

          <p class="mt-2 text-sm text-gray-400 line-clamp-3">
            {{ $item['excerpt'] }}
          </p>

          <a href="#"
             class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-white/90 hover:text-white">
            Baca Selengkapnya
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M13.2 5.2a1 1 0 1 1 1.6-1.2l6 8a1 1 0 0 1 0 1.2l-6 8a1 1 0 1 1-1.6-1.2L18 13H4a1 1 0 1 1 0-2h14l-4.8-5.8Z"/></svg>
          </a>
        </div>
      </article>
    @endforeach
  </div>
</section>

<section class="max-w-7xl mx-auto px-4 py-10">
  <div class="flex items-end justify-between mb-6">
    <h2 class="text-2xl md:text-3xl font-bold text-white">Turnamen</h2>

    <!-- Filter -->
    <div class="inline-flex gap-2 bg-white/5 ring-1 ring-white/10 rounded-full p-1">
      <button class="tnm-filter active px-3 py-1.5 text-xs md:text-sm rounded-full text-white bg-[#ab0506d8]" data-filter="ALL">All</button>
      <button class="tnm-filter px-3 py-1.5 text-xs md:text-sm rounded-full text-gray-200 hover:bg-white/10" data-filter="MLBB">MLBB</button>
      <button class="tnm-filter px-3 py-1.5 text-xs md:text-sm rounded-full text-gray-200 hover:bg-white/10" data-filter="DOTA2">DOTA2</button>
      <button class="tnm-filter px-3 py-1.5 text-xs md:text-sm rounded-full text-gray-2 00 hover:bg-white/10" data-filter="VALO">VALO</button>
    </div>
  </div>

  @php
    $statusColor = [
      'LIVE' => 'bg-red-600/90',
      'UPCOMING' => 'bg-yellow-500/80',
      'FINISHED' => 'bg-gray-500/60',
    ];

    $tournaments = [
      [
        'title' => 'MPL Community Cup',
        'game' => 'MLBB',
        'date' => '10–12 Okt 2025',
        'prize' => 'Rp 25.000.000',
        'slots' => '64/64 (Full)',
        'status' => 'UPCOMING',
        'image' => 'https://source.unsplash.com/800x600/?mobile-legends,esports',
        'link'  => '#'
      ],
      [
        'title' => 'SEA Valorant Open',
        'game' => 'VALO',
        'date' => 'Hari ini • 19:00',
        'prize' => 'Rp 15.000.000',
        'slots' => '14/16',
        'status' => 'LIVE',
        'image' => 'https://source.unsplash.com/800x600/?valorant,esports',
        'link'  => '#'
      ],
      [
        'title' => 'DPC Qualifier',
        'game' => 'DOTA2',
        'date' => '22–24 Sep 2025',
        'prize' => 'Rp 40.000.000',
        'slots' => '32/64',
        'status' => 'UPCOMING',
        'image' => 'https://source.unsplash.com/800x600/?dota2,esports',
        'link'  => '#'
      ],
      [
        'title' => 'Campus MLBB League',
        'game' => 'MLBB',
        'date' => 'Selesai • 31 Agu 2025',
        'prize' => 'Rp 10.000.000',
        'slots' => '64/64',
        'status' => 'FINISHED',
        'image' => 'https://source.unsplash.com/800x600/?gaming,arena',
        'link'  => '#'
      ],
      [
        'title' => 'VCT Community Series',
        'game' => 'VALO',
        'date' => '15–17 Sep 2025',
        'prize' => 'Rp 20.000.000',
        'slots' => '8/16',
        'status' => 'UPCOMING',
        'image' => 'https://source.unsplash.com/800x600/?fps,esports',
        'link'  => '#'
      ],
      [
        'title' => 'DOTA2 City Clash',
        'game' => 'DOTA2',
        'date' => 'Selesai • 28 Jul 2025',
        'prize' => 'Rp 12.000.000',
        'slots' => '32/32',
        'status' => 'FINISHED',
        'image' => 'https://source.unsplash.com/800x600/?dota,tournament',
        'link'  => '#'
      ],
    ];
  @endphp

  <div id="tnmGrid" class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
    @foreach($tournaments as $t)
      <article
        class="tnm-card group rounded-2xl overflow-hidden bg-white/5 ring-1 ring-white/10 shadow-lg"
        data-game="{{ $t['game'] }}">
        <a href="{{ $t['link'] }}" class="block overflow-hidden">
          <img src="{{ $t['image'] }}" alt="{{ $t['title'] }}"
               class="h-40 w-full object-cover transition-transform duration-500 group-hover:scale-105">
        </a>

        <div class="p-4">
          <div class="flex items-center justify-between mb-2">
            <span class="px-2 py-0.5 rounded-full bg-[#ab0506d8]/20 text-[11px] text-[#ab0506d8]">
              {{ $t['game'] }}
            </span>
            <span class="text-[10px] px-2 py-0.5 rounded-full text-white {{ $statusColor[$t['status']] ?? 'bg-gray-600' }}">
              {{ $t['status'] }}
            </span>
          </div>

          <h3 class="text-base font-semibold text-gray-100 group-hover:text-white line-clamp-2">
            <a href="{{ $t['link'] }}">{{ $t['title'] }}</a>
          </h3>

          <div class="mt-3 space-y-1 text-sm text-gray-300">
            <div class="flex items-center gap-2">
              <i class="fa fa-calendar text-xs opacity-70"></i>
              <span>{{ $t['date'] }}</span>
            </div>
            <div class="flex items-center gap-2">
              <i class="fa fa-trophy text-xs opacity-70"></i>
              <span>Prize Pool: {{ $t['prize'] }}</span>
            </div>
            <div class="flex items-center gap-2">
              <i class="fa fa-users text-xs opacity-70"></i>
              <span>Slots: {{ $t['slots'] }}</span>
            </div>
          </div>

          <div class="mt-4 flex items-center gap-2">
            <a href="{{ $t['link'] }}"
               class="inline-flex items-center gap-2 text-sm font-semibold text-white bg-[#ab0506d8] hover:bg-red-700 px-3 py-2 rounded-lg">
              Lihat Detail
              <i class="fa fa-arrow-right text-xs"></i>
            </a>

            @if($t['status'] === 'UPCOMING')
              <button
                class="ml-auto inline-flex items-center gap-2 text-sm font-semibold text-gray-900 bg-white hover:bg-gray-100 px-3 py-2 rounded-lg">
                Daftar
                <i class="fa fa-edit text-xs"></i>
              </button>
            @endif
          </div>
        </div>
      </article>
    @endforeach
  </div>
</section>

<section class="max-w-7xl mx-auto px-4 py-10">
  <div class="flex items-end justify-between mb-6">
    <h2 class="text-2xl md:text-3xl font-bold text-white">Forum</h2>

    <div class="flex items-center gap-2">
      <!-- Tabs -->
      <div class="inline-flex gap-1 bg-white/5 ring-1 ring-white/10 rounded-full p-1">
        <button class="forum-tab active px-3 py-1.5 text-xs md:text-sm rounded-full text-white bg-[#ab0506d8]" data-tab="ALL">All</button>
        <button class="forum-tab px-3 py-1.5 text-xs md:text-sm rounded-full text-gray-200 hover:bg-white/10" data-tab="TRENDING">Trending</button>
        <button class="forum-tab px-3 py-1.5 text-xs md:text-sm rounded-full text-gray-200 hover:bg-white/10" data-tab="NEW">New</button>
      </div>

      <a href="{{ route('forum.index') }}"
         class="hidden sm:inline-flex items-center gap-2 text-sm font-semibold text-white bg-[#ab0506d8] hover:bg-red-700 px-4 py-2 rounded-lg">
        Lihat Semua
        <i class="fa fa-arrow-right text-xs"></i>
      </a>
    </div>
  </div>

  @php
    $threads = [
      [
        'title' => 'Tips Draft MLBB: Counter Hero Meta Tanpa Ban',
        'author' => 'Rian',
        'avatar' => 'https://ui-avatars.com/api/?name=Rian&background=ab0506&color=fff',
        'tag' => 'MLBB',
        'replies' => 34,
        'views' => 2_100,
        'last' => '10 menit lalu • oleh Sasa',
        'badge' => 'TRENDING'
      ],
      [
        'title' => 'Setting Sensitivity Valorant untuk Aim Stabil',
        'author' => 'Kevin',
        'avatar' => 'https://images.unsplash.com/photo-1544723795-3fb6469f5b39?q=80&w=80&h=80&fit=crop',
        'tag' => 'VALO',
        'replies' => 12,
        'views' => 880,
        'last' => '1 jam lalu • oleh Naya',
        'badge' => 'NEW'
      ],
      [
        'title' => 'DOTA2: Kapan Harus Beli BKB? Diskusi Timing & Matchup',
        'author' => 'Tomo',
        'avatar' => 'https://images.unsplash.com/photo-1502685104226-ee32379fefbe?q=80&w=80&h=80&fit=crop',
        'tag' => 'DOTA2',
        'replies' => 57,
        'views' => 4_320,
        'last' => 'Kemarin • oleh Neo',
        'badge' => 'TRENDING'
      ],
      [
        'title' => 'Rekomendasi Headset Murah untuk Scrim Online',
        'author' => 'Lina',
        'avatar' => 'https://ui-avatars.com/api/?name=Lina&background=333333&color=fff',
        'tag' => 'Gear',
        'replies' => 8,
        'views' => 560,
        'last' => '2 hari lalu • oleh Lina',
        'badge' => 'ALL'
      ],
      [
        'title' => 'Sharing Bracket Community Cup Kampus',
        'author' => 'Agus',
        'avatar' => 'https://images.unsplash.com/photo-1527980965255-d3b416303d12?q=80&w=80&h=80&fit=crop',
        'tag' => 'MLBB',
        'replies' => 5,
        'views' => 300,
        'last' => '3 hari lalu • oleh Agus',
        'badge' => 'NEW'
      ],
    ];

    // warna tag
    $tagColor = [
      'MLBB' => 'bg-rose-500/20 text-rose-300',
      'VALO' => 'bg-indigo-500/20 text-indigo-300',
      'DOTA2' => 'bg-emerald-500/20 text-emerald-300',
      'Gear' => 'bg-amber-500/20 text-amber-300',
    ];
  @endphp

  <div id="forumList" class="space-y-3">
    @foreach($threads as $t)
      <article class="forum-item flex items-start gap-4 p-4 rounded-xl bg-white/5 hover:bg-white/10 ring-1 ring-white/10 transition"
               data-badge="{{ $t['badge'] }}">
        <img src="{{ $t['avatar'] }}" alt="{{ $t['author'] }}" class="w-10 h-10 rounded-full object-cover">

        <div class="flex-1 min-w-0">
          <div class="flex flex-wrap items-center gap-2">
            <a href="#" class="text-base md:text-lg font-semibold text-gray-100 hover:text-white truncate">
              {{ $t['title'] }}
            </a>
            <span class="px-2 py-0.5 rounded-full text-[11px] {{ $tagColor[$t['tag']] ?? 'bg-white/10 text-gray-200' }}">
              {{ $t['tag'] }}
            </span>
          </div>

          <div class="mt-1 text-xs text-gray-400">
            Dibuat oleh <span class="text-gray-300">{{ $t['author'] }}</span>
          </div>
        </div>

        <div class="shrink-0 text-right">
          <div class="flex items-center gap-3 text-gray-300">
            <span class="inline-flex items-center gap-1 text-sm">
              <i class="fa fa-comment-dots text-xs opacity-70"></i>{{ $t['replies'] }}
            </span>
            <span class="inline-flex items-center gap-1 text-sm">
              <i class="fa fa-eye text-xs opacity-70"></i>{{ number_format($t['views']) }}
            </span>
          </div>
          <div class="text-[11px] text-gray-400 mt-1">{{ $t['last'] }}</div>
        </div>
      </article>
    @endforeach
  </div>

  <!-- CTA bawah (mobile visible) -->
  <div class="mt-6 flex justify-center sm:justify-end">
    <a href="{{ route('forum.index') }}"
       class="inline-flex items-center gap-2 text-sm font-semibold text-white bg-[#ab0506d8] hover:bg-red-700 px-4 py-2 rounded-lg">
      Masuk Forum
      <i class="fa fa-arrow-right text-xs"></i>
    </a>
  </div>
</section>

@endsection

@push('styles')
<style>
  /* scrollbar tipis untuk panel live score */
  #liveScoreList::-webkit-scrollbar { width: 6px; }
  #liveScoreList::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.2); border-radius: 9999px; }
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
        t.classList.remove('active','bg-[#ab0506d8]','text-white');
        t.classList.add('text-gray-200');
      });
      tab.classList.add('active','bg-[#ab0506d8]','text-white');
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