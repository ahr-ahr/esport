<!-- DESKTOP: NAVBAR BAWAH AUTO-HIDE -->
<nav id="desktopNavbar"
     role="navigation"
     class="hidden md:flex fixed bottom-0 left-1/2 -translate-x-1/2 transition-transform duration-500
            bg-gray-500 rounded-full border border-gray-800 shadow-lg px-8 py-3 z-50">
  <div class="flex gap-8 font-normal">
    <a href="{{ route('home') }}"
   class="flex flex-col items-center {{ request()->routeIs('home') ? 'text-red-700' : 'text-gray-200 hover:text-red-700' }}">
    <i class="fa fa-home text-lg"></i>
    <span class="text-xs">Home</span>
</a>

<a href="{{ route('news.index') }}"
   class="flex flex-col items-center {{ request()->routeIs('news.*') ? 'text-red-700' : 'text-gray-200 hover:text-red-700' }}">
    <i class="fa fa-newspaper text-lg"></i>
    <span class="text-xs">News</span>
</a>

<a href="{{ route('tournaments.index') }}"
   class="flex flex-col items-center {{ request()->routeIs('tournaments.*') ? 'text-red-700' : 'text-gray-200 hover:text-red-700' }}">
    <i class="fa fa-trophy text-lg"></i>
    <span class="text-xs">Tournaments</span>
</a>

<a href="{{ route('forum.index') }}"
   class="flex flex-col items-center {{ request()->routeIs('forum.*') ? 'text-red-700' : 'text-gray-200 hover:text-red-700' }}">
    <i class="fa fa-comments text-lg"></i>
    <span class="text-xs">Forum</span>
</a>
  </div>
</nav>

<!-- MOBILE: BOTTOM NAV FULL-WIDTH (ALA WHATSAPP) -->
<nav class="flex md:hidden fixed bottom-0 left-0 w-full bg-white shadow-inner border-t border-gray-200 z-50
            pb-[env(safe-area-inset-bottom)]">
  <div class="flex justify-around w-full py-2 text-gray-700 font-medium">
    <a href="{{ route('home') }}" class="flex flex-col items-center text-red-700">
      <i class="fa fa-home text-xl"></i>
      <span class="text-xs">Home</span>
    </a>
    <a href="{{ route('news.index') }}" class="flex flex-col items-center hover:text-red-700">
      <i class="fa fa-newspaper text-xl"></i>
      <span class="text-xs">News</span>
    </a>
    <a href="{{ route('tournaments.index') }}" class="flex flex-col items-center hover:text-red-700">
      <i class="fa fa-trophy text-xl"></i>
      <span class="text-xs">Tournaments</span>
    </a>
    <a href="{{ route('forum.index') }}" class="flex flex-col items-center hover:text-red-700">
      <i class="fa fa-comments text-xl"></i>
      <span class="text-xs">Forum</span>
    </a>
  </div>
</nav>

<script>
  (function () {
    const navbar = document.getElementById('desktopNavbar');
    if (!navbar) return;

    function setTransform(open) {
      navbar.style.transform = open
        ? 'translate(0%, -16px)' // muncul sedikit mengambang
        : 'translate(0%, 50%)';  // sembunyi ke bawah
    }

    // Posisi awal = tertutup
    setTransform(false);

    // Hover langsung buka
    navbar.addEventListener('mouseenter', () => setTransform(true));

    // Begitu kursor keluar, langsung tutup
    navbar.addEventListener('mouseleave', () => setTransform(false));

    // Hover zone tipis di bawah layar biar gampang buka
    const hoverZone = document.createElement('div');
    hoverZone.style.position = 'fixed';
    hoverZone.style.left = '0';
    hoverZone.style.right = '0';
    hoverZone.style.bottom = '0';
    hoverZone.style.height = '28px';
    hoverZone.style.zIndex = '40';
    hoverZone.style.pointerEvents = 'auto';
    hoverZone.style.background = 'transparent';
    document.body.appendChild(hoverZone);

    hoverZone.addEventListener('mouseenter', () => setTransform(true));
    hoverZone.addEventListener('mouseleave', () => setTransform(false));
  })();
</script>

