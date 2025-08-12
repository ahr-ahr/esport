<header class="bg-[#1e1e1e] border-b border-gray-800 py-4 px-12 shadow-md flex justify-between items-center">
    <!-- Logo -->
    <a href="{{ route('home') }}" class="text-[#FF9800] text-3xl font-black hover:text-[#FB8C00] transition">
        Media69
    </a>

    <div class="flex items-center gap-4">
        <!-- Language Dropdown -->
        <div class="relative">
            <button id="langToggle"
                class="flex items-center gap-1 text-gray-300 hover:text-[#FF9800] font-semibold focus:outline-none cursor-pointer"
                aria-haspopup="true" aria-expanded="false">
                (ID)
                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                    <path d="M5.516 7.548L10 12.032l4.484-4.484-1.06-1.06L10 9.91 6.576 6.488l-1.06 1.06z" />
                </svg>
            </button>
            <ul id="langMenu"
                class="absolute right-0 mt-2 hidden bg-[#1e1e1e] text-sm text-gray-300 shadow-lg rounded w-32 z-50">
                <li><a href="#" class="block px-4 py-2 hover:bg-[#FF9800] hover:text-white">Indonesia</a></li>
                <li><a href="#" class="block px-4 py-2 hover:bg-[#FF9800] hover:text-white">English</a></li>
            </ul>
        </div>

        <!-- User Icon -->
        <a href="#" id="userIcon" class="cursor-pointer">
            <i class="fa fa-user hover:text-[#FF9800] text-gray-300 text-2xl transition"></i>
        </a>

        <!-- Modal Login (include file modal.html di sini) -->
        @include('components.modals.login-modal')


    </div>
</header>


<script>
    document.getElementById('userIcon').addEventListener('click', function (e) {
        e.preventDefault();
        document.getElementById('loginModal').classList.remove('hidden');
    });

    document.addEventListener("DOMContentLoaded", function () {
        const toggleBtn = document.getElementById("langToggle");
        const langMenu = document.getElementById("langMenu");

        toggleBtn.addEventListener("click", function (e) {
            e.stopPropagation();
            langMenu.classList.toggle("hidden");

            // Update aria-expanded
            const expanded = toggleBtn.getAttribute("aria-expanded") === "true";
            toggleBtn.setAttribute("aria-expanded", !expanded);
        });

        document.addEventListener("click", function () {
            langMenu.classList.add("hidden");
            toggleBtn.setAttribute("aria-expanded", "false");
        });
    });
</script>