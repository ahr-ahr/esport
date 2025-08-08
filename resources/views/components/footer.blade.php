<footer class="bg-gray-900 border-t-1 border-gray-800 text-white p-12">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-6">
        <!-- Brand -->
        <div>
            <h1 class="text-2xl font-bold text-red-900">Media69</h1>
            <p class="text-sm mt-2">Tempat komunitas gamers terbaik.</p>
        </div>

        <!-- Navigation -->
        <div>
            <h2 class="font-semibold mb-2">Navigasi</h2>
            <ul class="space-y-1 text-sm">
                <li><a href="{{ route('home') }}" class="hover:underline">Home</a></li>
                <li><a href="{{ route('news.index') }}" class="hover:underline">News</a></li>
                <li><a href="{{ route('tournaments.index') }}" class="hover:underline">Tournaments</a></li>
                <li><a href="{{ route('forum.index') }}" class="hover:underline">Forum</a></li>
            </ul>
        </div>

        <!-- Social Icons -->
        <div>
            <h2 class="font-semibold mb-2">Ikuti Kami</h2>
            <div class="flex space-x-4 mt-2 text-xl">
                <a href="#" class="hover:text-[#E1306C]"><i class="fab fa-instagram mr-2"></i></a>
                <a href="#" class="hover:text-[#FF0000]"><i class="fab fa-youtube mr-2"></i></a>
                <a href="#" class="hover:text-[#1877F2]"><i class="fab fa-facebook mr-2"></i></a>
                <a href="#" class="hover:text-[#1DA1F2]"><i class="fab fa-twitter mr-2"></i></a>
            </div>
        </div>

    </div>

    <div class="mt-10 border-t border-gray-600 pt-6 text-sm text-gray-400 text-center md:flex md:justify-between">
        <p>&copy; 2025 Media69. All rights reserved.</p>
        <div class="flex gap-6 justify-center mt-2 md:mt-0">
            <a href="#" class="hover:text-white">Kebijakan Privasi</a>
            <a href="#" class="hover:text-white">Syarat Penggunaan</a>
            <a href="#" class="hover:text-white">Peta Situs</a>
        </div>
    </div>
</footer>
