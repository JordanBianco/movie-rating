<div>
    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-8">
        @foreach ($movies as $movie)
        <div class="flex flex-col space-y-2">
            <div>
                <a href="{{ route('movie.show', $movie->slug) }}">
                    <img
                        src="https://source.unsplash.com/featured/?movies"
                        alt="movie_cover"
                        class="w-full h-64 hover:opacity-70 object-cover shadow-lg">
                </a>
            </div>
            <div>
                <a href="{{ route('movie.show', $movie->slug) }}">
                    <h2 class="leading-5 text-lg">{{ $movie->title }}</h2>
                    <p class="text-sm text-gray-400">{{ $movie->release_year }}</p>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
