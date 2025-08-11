<footer class="bg-[#1e1e1e] border-t border-gray-800 text-white p-12">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-6">
        
        <!-- Brand -->
        <div>
            <h1 class="text-2xl font-bold text-[#FF9800]">Media69</h1>
            <p class="text-sm mt-2 text-gray-400">Tempat komunitas gamers terbaik.</p>
        </div>

        <!-- Navigation -->
        <div>
            <h2 class="font-semibold mb-2 text-[#FF9800]">Navigasi</h2>
            <ul class="space-y-1 text-sm">
                <li><a href="{{ route('home') }}" class="hover:text-[#FF9800] transition">Home</a></li>
                <li><a href="{{ route('news.index') }}" class="hover:text-[#FF9800] transition">News</a></li>
                <li><a href="{{ route('tournaments.index') }}" class="hover:text-[#FF9800] transition">Tournaments</a></li>
                <li><a href="{{ route('forum.index') }}" class="hover:text-[#FF9800] transition">Forum</a></li>
            </ul>
        </div>

        <!-- Social Icons -->
        <div>
            <h2 class="font-semibold mb-2 text-[#FF9800]">Ikuti Kami</h2>
            <div class="flex space-x-4 mt-2 text-xl">
                <a href="#" class="hover:text-[#FF9800]"><i class="fab fa-instagram"></i></a>
                <a href="#" class="hover:text-[#FF9800]"><i class="fab fa-youtube"></i></a>
                <a href="#" class="hover:text-[#FF9800]"><i class="fab fa-facebook"></i></a>
                <a href="#" class="hover:text-[#FF9800]"><i class="fab fa-twitter"></i></a>
            </div>
        </div>

    </div>

    <div class="mt-10 border-t border-gray-600 pt-6 text-sm text-gray-400 text-center md:flex md:justify-between">
        <p>&copy; 2025 Media69. All rights reserved.</p>
        <div class="flex gap-6 justify-center mt-2 md:mt-0">
            <a href="#" class="hover:text-[#FF9800] transition">Kebijakan Privasi</a>
            <a href="#" class="hover:text-[#FF9800] transition">Syarat Penggunaan</a>
            <a href="#" class="hover:text-[#FF9800] transition">Peta Situs</a>
        </div>
    </div>
</footer>
