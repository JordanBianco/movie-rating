<div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-8">
    <x-flash-message></x-flash-message>

    @forelse (auth()->user()->watchlist as $movie)
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
                    @for ($i = 0; $i < $movie->reviews->avg('rating'); $i++)
                        <svg class="w-4 h-4 text-yellow-400 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    @endfor
                    
                    @for ($i = $movie->reviews->avg('rating'); $i < 5; $i++)
                        <svg class="w-4 h-4 text-gray-600 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    @endfor
                </div>

                <div>
                    <svg
                        wire:click="removeFromWatchlist({{ $movie->id }})"
                        class="w-5 h-5 cursor-pointer text-red-500 hover:text-gray-600"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                    </svg>
                </div>
                
            </div>
        </div>
    </div>
    @empty
    <p>There are no movies in this list yet.</p>
    @endforelse
</div>
