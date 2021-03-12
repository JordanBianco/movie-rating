<div x-data="{ open: false }">
    <header class="flex justify-between mb-6">

        @if ($reviews->count() > 0)
            <div class="flex items-center space-x-2">
                <select wire:model="order" class="border-gray-700 rounded w-56 bg-transparent bg-gray-800">
                    <option value="latest">Recenti</option>
                    <option value="oldest">Meno Recenti</option>
                    <option value="high">Più votati</option>
                    <option value="low">Meno votati</option>
                </select>
            </div>
        @endif

        @auth
            <button @click="open = true" class="bg-yellow-400 hover:bg-yellow-500 text-gray-800 px-4 py-2 rounded flex items-center space-x-1">
                Add Review
            </button>
        @else 
            <button class="bg-yellow-400 hover:bg-yellow-500 text-gray-800 px-4 py-2 rounded flex items-center space-x-1">
                <a href="{{ route('login') }}">Add Review</a>
            </button>
        @endauth

        {{-- Overlay --}}
        @auth
        <div
            x-show="open"
            class="fixed inset-0 bg-black opacity-60 flex items-center justify-center">
        </div>
        {{-- Modal --}}
        <div
            x-show="open"
            class="fixed inset-0  flex items-center justify-center text-gray-200">
                <div class="w-1/3">
                    <header class="bg-gray-800  p-6 rounded-t border-b border-gray-700 flex items-start justify-between">
                        <div class="flex space-x-4">
                            <img src="https://i.pravatar.cc/150?u={{ auth()->user()->email }}" alt="" class="rounded-full w-12 h-12">
                            <div>
                                <h3 class="font-bold">{{ auth()->user()->name }}</h3>
                                <p class="text-gray-400">{{ auth()->user()->email }}</p>
                            </div>
                        </div>
                        <svg
                            wire:click.prevent="resetValue"
                            @click="open = false"
                            class="w-6 h-6 cursor-pointer text-gray-400 hover:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </header>

                    @if (!$success)
                        <div class="flex justify-center bg-gray-800 p-6">
                            <div>
                                <div class="flex items-center">
                                    @for ($i = 0; $i < $rating; $i++)
                                        <svg wire:click="setRating({{ $i+1 }})" class="w-8 h-8 text-yellow-400 cursor-pointer" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    @endfor
                                    
                                    @for ($i = $rating; $i < 5; $i++)
                                        <svg wire:click="setRating({{ $i+1 }})" class="w-8 h-8 text-gray-600 hover:text-gray-500 cursor-pointer" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    @endfor
                                </div>
                                @error('rating')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror 
                            </div>
                        </div>
                        <div class="flex justify-center bg-gray-800 px-6">
                                <div class="w-full">
                                    <textarea
                                        wire:model.lazy="body"
                                        placeholder="Write a review for this movie..."
                                        rows="4"
                                        class="w-full bg-transparent text-gray-100 resize-none border-gray-700 focus:outline-none rounded"></textarea>
                                    @error('body')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                    @enderror
                                </div> 
                        </div>
                        <div class="bg-gray-800 flex justify-end p-6">
                            <button wire:click.prevent="addReview" class="bg-yellow-400 hover:bg-yellow-500 text-gray-800 px-4 py-2 rounded flex items-center space-x-1">
                                Submit
                            </button>
                        </div>
                    @else 
                        @if (session()->has('message'))
                        <div class="flex justify-center bg-gray-800 p-6">
                            <div class="flex items-center space-x-2 text-green-400">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                <span>{{ session('message') }}</span>
                            </div>
                        </div>
                        @endif
                    @endif

                </div>
        </div>
        @endauth
    </header>

    <section>
        @foreach ($reviews as $review)
            <div class="flex items-start space-x-6 p-6 my-4 bg-gray-700 shadow-lg">
                <div class="flex-shrink-0">
                    <img src="https://i.pravatar.cc/150?u={{ $review->author->email }}" alt="" class="rounded-full w-12 h-12">
                </div>

                <div>
                    <h2 class="font-semibold">{{ $review->author->name }}</h2>
                    <p class="text-gray-500 text-sm">Recensione lasciata il {{ $review->created_at->format('d-m-Y') }} alle {{ $review->created_at->format('H:i') }}</p>

                    <div class="flex items-center">
                        @for ($i = 0; $i < $review->rating; $i++)
                            <svg class="w-4 h-4 text-yellow-400 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        @endfor
                        
                        @for ($i = $review->rating; $i < 5; $i++)
                            <svg class="w-4 h-4 text-gray-400 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        @endfor
                    </div>
                    <p class="text-gray-300 mt-2">
                        {{ $review->body }}
                    </p>
                </div>
            </div>
        @endforeach
    </section>
</div>
