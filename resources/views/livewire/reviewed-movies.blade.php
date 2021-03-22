<div>

    <x-flash-message></x-flash-message>

    {{-- Filters --}}
    <div class="mb-4 w-full flex justify-between">
        {{-- Search --}}
        <div>
            <input
                placeholder="search for movie title..."
                type="text"
                wire:model.debounce.500ms="search"
                class="p-2 border-gray-300 rounded w-64 py-1 placeholder-gray-400 text-sm"
            >
        </div>

        <div class="flex items-center space-x-2">
                
            <select wire:model="dir" class="p-2 border-gray-300 rounded w-40 py-1 placeholder-gray-400 text-sm">
                <option value="" disabled>Ordina per Voto</option>
                <option value="desc">Voto più alto</option>
                <option value="asc">Voto più basso</option>
            </select>

            <select wire:model="dateDir" class="p-2 border-gray-300 rounded w-40 py-1 placeholder-gray-400 text-sm">
                <option value="" disabled>Ordina per Data</option>
                <option value="latest">Più recente</option>
                <option value="oldest">Meno recente</option>
            </select>
    
            <button wire:click="clearFilters" class="focus:outline-none">
                <svg class="w-6 h-6 text-gray-400 hover:text-gray-600 transition duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </button>
        </div>
    </div>

    <table class="table-fixed border border-gray-300 w-full text-sm">
        <thead>
            <tr>
                <th class="font-semibold uppercase text-gray-500 p-4 text-center w-1/5">Movie Title</th>
                <th class="font-semibold uppercase text-gray-500 p-4 text-center w-2/5">Comment</th>
                <th class="font-semibold uppercase text-gray-500 p-4 text-center w-1/5">Rating</th>
                <th class="font-semibold uppercase text-gray-500 p-4 text-center w-1/5">Written on</th>
                <th class="font-semibold uppercase text-gray-500 p-4 text-center w-1/5">Updated on</th>
                <th class="font-semibold uppercase text-gray-500 p-4 text-center w-10"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reviews as $review)
                <tr>
                    <td class="p-4">
                        <a href="{{ route('movie.show', $review->slug) }}" class="hover:underline">
                            {{ $review->title }}
                        </a>
                    </td>
                    <td class="p-4">
                        {{ Str::limit($review->body, 80, '...') }}
                    </td>
                    <td class="p-4 flex justify-center">
                        <div  class="flex items-center">
                            @for ($i = 0; $i < $review->rating; $i++)
                                <svg class="w-4 h-4 text-yellow-400 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            @endfor
                            
                            @for ($i = $review->rating; $i < 5; $i++)
                                <svg class="w-4 h-4 text-gray-400 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            @endfor
                        </div>
                    </td>
                    <td class="p-4 text-xs text-gray-600">
                        {{ $review->created_at->format('d-M-Y H:i') }}
                    </td>
                    <td class="p-4 text-xs text-gray-600">
                        {{ $review->updated_at == $review->created_at ? '/' : $review->updated_at->format('d-M-Y H:i') }}
                    </td>
                    <td class="relative" x-data="{open:false}" @click.away="open = false" x-cloak>
                        <div class="flex-shrink-0">
                            <svg
                                @click="open = !open"
                                class="w-5 h-5 text-gray-400 hover:text-gray-600 cursor-pointer transition duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path></svg>
                        </div>

                        <div x-show="open" class="absolute top-10 right-8 bg-white shadow-lg transition duration-1000 rounded">
                            
                            <div class="px-6 py-2 text-gray-600 hover:text-gray-800 hover:bg-gray-200 cursor-pointer">
                                <a href="{{ route('dashboard.movies.reviews.edit', $review->id) }}">Edit</a>
                            </div>

                            <div wire:click="deleteReview({{ $review->id }})" class="px-6 py-2 text-gray-600 hover:text-gray-800 hover:bg-gray-200 cursor-pointer">
                                Delete
                            </div>
                        </div>
                    </td>
                    
                </tr>
            @endforeach
            </tbody>
      </table>

      <div class="mt-10">
        {{ $reviews->links() }}
      </div>
</div>
