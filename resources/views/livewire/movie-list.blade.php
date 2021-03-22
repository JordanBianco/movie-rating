<div>
    {{-- Header - search --}}
    <header class="border-b border-gray-300 py-16 mb-10 bg-gray-300">
        <h2 class="uppercase font-bold text-gray-500 text-center mb-2">Explore books</h2>

        <div class="flex items-center justify-center mx-auto">

            {{-- Search date --}}
            <div>
                <input
                    placeholder="year"
                    type="text"
                    wire:model.debounce.500ms="searchYear"
                    class="p-2 border-gray-300 rounded-l-lg w-24 placeholder-gray-400 text-center"
                >
            </div>

            {{-- Search title --}}
            <div class="relative">
                <input
                    placeholder="search..."
                    type="text"
                    wire:model.debounce.500ms="search"
                    class="p-2 border-gray-300 border-l-0 rounded-r-lg w-48 sm:w-72 placeholder-gray-400"
                >
                <svg class="w-6 h-6 text-gray-300 absolute top-0 right-0 m-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
            </div>
        </div>
    </header>

    {{-- Sub-header - filters --}}
    <div class="flex justify-center sm:justify-between items-center mb-6">
        <h2 class="uppercase font-bold text-indigo-400 hidden sm:block">Browse</h2>

        <div class="flex items-center space-x-3 sm:space-x-6">
            {{-- Più votati --}}
            <span wire:click.prevent="orderByVote" class="{{ $voted ? 'text-indigo-400' : '' }} cursor-pointer text-xs sm:text-sm uppercase font-semibold hover:text-indigo-400 ">TOP Movies</span>

            {{-- Risultati per pagina --}}
            <select
                class="border border-gray-300 cursor-pointer uppercase text-xs sm:text-sm font-semibold rounded-lg"
                wire:model="perPage">
                    <option value="10">10 Movies</option>
                    <option value="20">20 Movies</option>
                    <option value="50">50 Movies</option>
            </select>
        </div>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-8">
        @foreach ($movies as $movie)
        <div class="relative">
            <div class="mb-6">
                <a href="{{ route('movie.show', $movie->slug) }}">
                    <img
                        src="https://source.unsplash.com/featured/?movies"
                        alt="movie_cover"
                        class="w-full h-64 hover:opacity-70 object-cover shadow-lg rounded">
                </a>
                <a href="{{ route('movie.show', $movie->slug) }}">
                    <h2 class="leading-5 mt-1">{{ $movie->title }}</h2>
                </a>
                <p class="text-sm text-gray-400">{{ $movie->release_year }}</p>
            </div>
               
            <div class="absolute bottom-0 w-full">
                <div class="flex items-center justify-between">
                    <div  class="flex items-center">
                        @for ($i = 0; $i < round($movie->reviews->avg('rating'), 0); $i++)
                            <svg class="w-4 h-4 text-yellow-400 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        @endfor
                        
                        @for ($i = round($movie->reviews->avg('rating'), 0); $i < 5; $i++)
                            <svg class="w-4 h-4 text-gray-400 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        @endfor
                    </div>
    
                    {{-- Watchlist --}}
                    <div>
                        @auth
                            {{-- Risolvere n+1 problem --}}
                            @if (auth()->user()->watchlist()->pluck('movie_id')->contains($movie->id))
                                <svg
                                    wire:click="toggleWatchlist({{ $movie->id }})"
                                    class="w-5 h-5 cursor-pointer text-red-500 hover:text-red-600"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                                </svg>
                            @else
                                <svg
                                    wire:click="toggleWatchlist({{ $movie->id }})"
                                    class="w-5 h-5 cursor-pointer text-gray-500 hover:text-gray-600"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                                </svg>
                            @endif
                        
                        {{-- Se non loggato --}}
                        @else
                        <a href="{{ route('login') }}">
                            <svg
                                class="w-5 h-5 text-gray-400 hover:text-red-400 cursor-pointer"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                            </svg>
                        </a>
                        @endauth
                    </div>
                    
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-10">
        {{ $movies->links() }}
    </div>
</div>
