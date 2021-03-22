<div>
    @if (! $success)
        <header class="bg-gray-200 p-6 rounded-t border-b border-gray-300 flex items-start justify-between">
            <div class="flex space-x-4">
                <img src="{{ auth()->user()->image() }}" alt="" class="rounded-full w-12 h-12">
                <div>
                    <div class="flex items-center space-x-3">
                        <h3 class="font-bold">{{ auth()->user()->name }}</h3>
                        @include('inc.badge', ['user' => auth()->user()] )
                    </div>
                    <p class="text-gray-400">{{ auth()->user()->email }}</p>
                </div>
            </div>
        </header>

        <div class="flex justify-center bg-gray-100 p-6">
            <div>
                <div class="flex items-center">
                    @for ($i = 0; $i < $rating; $i++)
                        <svg wire:click="setRating({{ $i+1 }})" class="w-8 h-8 text-yellow-400 cursor-pointer" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    @endfor
                    
                    @for ($i = $rating; $i < 5; $i++)
                        <svg wire:click="setRating({{ $i+1 }})" class="w-8 h-8 text-gray-400 hover:text-gray-500 cursor-pointer" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    @endfor
                </div>
                @error('rating')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror 
            </div>
        </div>
        <div class="flex justify-center bg-gray-100 px-6">
            <div class="w-full">
                <textarea
                    wire:model.lazy="body"
                    rows="4"
                    class="w-full text-gray-900 resize-none border-gray-300 focus:outline-none rounded">{{ $body }}</textarea>
                @error('body')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div> 
        </div>
        <div class="bg-gray-100 flex justify-end p-6">
            <button wire:click.prevent="updateReview" class="bg-indigo-400 hover:bg-indigo-500 text-gray-100 px-4 py-2 rounded flex items-center space-x-1">
                Update
            </button>
        </div>
    @else 
        <div>
            <p class="text-green-500">Grazie per aver aggiornato la tua recensione!</p>

            <a href="{{ route('dashboard.movies.reviews') }}" class="text-blue-400 hover:underline">Torna indietro</a>
        </div>
    @endif
</div>