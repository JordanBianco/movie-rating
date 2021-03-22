<x-guest-layout>

    <div class="my-6">
        <button>
            <a href="{{ route('movie.index') }}" class="hover:text-indigo-400">Back</a>
        </button>    
    </div>

    {{-- Movie Details Section --}}
    <div class="flex space-x-10 border-b border-gray-300 pb-16 mb-20">
        <div class="w-1/2">
            <img
                src="https://source.unsplash.com/featured/?movies"
                alt="movie_cover"
                class="w-full object-cover shadow-lg"
                style="min-height: 400px">
        </div>

        <div class="w-full flex flex-col space-y-8 relative">
            <header class="space-y-1">
                <h2 class="leading-5 text-2xl">{{ $movie->title }}</h2>
                <p class="text-gray-400">{{ $movie->release_year }}</p>

                {{-- component media voto livewire --}}
                @livewire('avg-reviews', ['movie' => $movie])
            </header>

            <section>
                <p>{{ $movie->description }}</p>
            </section>

            <footer class="absolute bottom-10">
                <button class="bg-indigo-400 hover:bg-indigo-500 text-gray-100 px-4 py-2 rounded flex items-center space-x-1 shadow">
                    <a href="{{ $movie->homepage }}" target="_blank">Homepage</a>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                </button>
            </footer>

        </div>
    </div>

    {{-- Review Section --}}
    <div class="mb-6">
        @livewire('movie-reviews', ['movie' => $movie])
    </div>

</x-guest-layout>