<div class="p-4">
    <h3 class="uppercase text-gray-400 px-2">Movies</h3>

    <div class="text-sm mt-8 space-y-2">
        {{-- Reviews --}}
        <a
            href="{{ route('dashboard.movies.reviews') }}"
            class="flex items-start space-x-2 hover:bg-sidebar-300 p-2 rounded transition duration-200
                {{ request()->is('dashboard/movies/reviews') ? 'bg-sidebar-300' : '' }}"
            >
                <div class="flex-shrink-0">
                    <svg
                        class="w-5 h-5
                        {{ request()->is('dashboard/movies/reviews') ? 'text-gray-100' : 'text-gray-400' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                </div>
                <p>Reviews</p>
        </a>
    
        {{-- Watchlist --}}
        <a
            href="{{ route('dashboard.movies.watchlist') }}"
            class="flex items-start space-x-2 hover:bg-sidebar-300 p-2 rounded transition duration-200
                {{ request()->is('dashboard/movies/watchlist') ? 'bg-sidebar-300' : '' }}"
            >
                <div class="flex-shrink-0">
                    <svg
                        class="w-5 h-5
                        {{ request()->is('dashboard/movies/watchlist') ? 'text-gray-100' : 'text-gray-400' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path></svg>
                </div>
                <p>Watchlist</p>
        </a>
        
    </div>
</div>
