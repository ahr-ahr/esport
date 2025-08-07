<nav class="bg-gray-900 py-4 px-6 shadow-md flex justify-between items-center">
    <a href="{{ route('home') }}" class="text-[#ff0040] text-2xl font-bold">Skandal69</a>
    <div class="flex gap-6 text-gray-700 font-semibold">
        <a href="{{ route('home') }}" class="text-[#ab0506d8]">Home</a>
        <a href="{{ route('news.index') }}" class="hover:text-[#ab0506d8]">News</a>
        <a href="{{ route('tournaments.index') }}" class="hover:text-[#ab0506d8]">Tournaments</a>
        <a href="{{ route('forum.index') }}" class="hover:text-[#ab0506d8]">Forum</a>
    </div>
    <div class="flex items-center gap-4">
        <!-- Language Dropdown -->
        <!-- Language Dropdown -->
        <div class="relative">
            <button id="langToggle" class="flex items-center gap-1 text-gray-700 font-semibold focus:outline-none">
                (ID)
                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                    <path d="M5.516 7.548L10 12.032l4.484-4.484-1.06-1.06L10 9.91 6.576 6.488l-1.06 1.06z" />
                </svg>
            </button>
            <ul id="langMenu"
                class="absolute right-0 mt-2 hidden bg-white text-sm text-gray-700 shadow-lg rounded w-32 z-50">
                <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Indonesia</a></li>
                <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">English</a></li>
            </ul>

        </div>


        <!-- User Icon -->
        <a href="#" class="">
            <i class="fa fa-user-astronaut hover:text-[#ab0506d8]"></i>
        </a>
    </div>
</nav>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const toggleBtn = document.getElementById("langToggle");
        const langMenu = document.getElementById("langMenu");

        toggleBtn.addEventListener("click", function(e) {
            e.stopPropagation(); // Hindari tertutup langsung saat diklik
            langMenu.classList.toggle("hidden");
        });

        // Klik di luar akan menutup dropdown
        document.addEventListener("click", function() {
            langMenu.classList.add("hidden");
        });
    });
</script>
