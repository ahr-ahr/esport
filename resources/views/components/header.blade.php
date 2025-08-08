<header class="bg-gray-900 border-b-1 border-gray-800 py-4 px-12 shadow-md flex justify-between items-center shadow-lg">
    <a href="{{ route('home') }}" class="text-red-700 text-3xl font-black">Media69</a>

    <div class="flex items-center gap-4">
        <!-- Language Dropdown -->
        <div class="relative">
            <button id="langToggle" class="flex items-center gap-1 text-gray-500 hover:text-red-800 font-semibold focus:outline-none">
                (ID)
                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                    <path d="M5.516 7.548L10 12.032l4.484-4.484-1.06-1.06L10 9.91 6.576 6.488l-1.06 1.06z" />
                </svg>
            </button>
            <ul id="langMenu"
                class="absolute right-0 mt-2 hidden bg-white text-sm text-gray-700 shadow-lg rounded w-32 z-50">
                <li><a href="#" class="block px-4 py-2 hover:bg-red-900 hover:text-white">Indonesia</a></li>
                <li><a href="#" class="block px-4 py-2 hover:bg-red-900 hover:text-white">English</a></li>
            </ul>

        </div>

        <!-- User Icon -->
        <a href="#" class="">
            <i class="fa fa-user hover:text-red-800 text-gray-500 text-2xl"></i>
        </a>
    </div>
</header>

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
