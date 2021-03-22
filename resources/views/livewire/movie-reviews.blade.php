<div x-data="{ open: false }">
    <header class="flex justify-between mb-6">

        @if ($reviews->count() > 0)
            <div class="flex items-center space-x-4">
                <div class="flex items-center space-x-2">
                    <select wire:model="order" class="border-gray-300 rounded w-56">
                        <option value="latest">Recenti</option>
                        <option value="oldest">Meno Recenti</option>
                        <option value="high">Più votati</option>
                        <option value="low">Meno votati</option>
                    </select>
                </div>
    
                @if (session()->has('message'))
                <div
                    x-data="{ show: true }"
                    x-show.transition.opacity.out.duration.1000ms="show"
                    x-init="setTimeout(() => show = false, 3500)"
                    class="flex items-center space-x-1 text-green-400">
                        <svg class="w-5 h-5 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span>{{ session('message') }}</span>
                </div>
                @endif
            </div>
        @endif

        @auth
            <button @click="open = true" class="bg-indigo-400 shadow hover:bg-indigo-500 text-gray-100 px-4 py-2 rounded flex items-center space-x-1">
                Add Review
            </button>
        @else 
            <button class="bg-indigo-400 shadow hover:bg-indigo-500 text-gray-100 px-4 py-2 rounded flex items-center space-x-1">
                <a href="{{ route('login') }}">Add Review</a>
            </button>
        @endauth

        {{-- Overlay --}}
        @auth
        <div
            x-cloak
            x-show="open"
            class="fixed inset-0 bg-black opacity-70 flex items-center justify-center">
        </div>
        {{-- Modal --}}
        <div
            x-cloak
            x-on:review-added.window="open = false"
            x-show="open"
            class="fixed inset-0  flex items-center justify-center text-gray-700">
                <div class="w-1/3">
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
                        <svg
                            wire:click.prevent="resetValue"
                            @click="open = false"
                            class="w-6 h-6 cursor-pointer text-gray-400 hover:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
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
                                    placeholder="Write a review for this movie..."
                                    rows="4"
                                    class="w-full text-gray-900 resize-none border-gray-300 focus:outline-none rounded"></textarea>
                                @error('body')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div> 
                    </div>
                    <div class="bg-gray-100 flex justify-end p-6">
                        <button wire:click.prevent="addReview" class="bg-indigo-400 hover:bg-indigo-500 text-gray-100 px-4 py-2 rounded flex items-center space-x-1">
                            Submit
                        </button>
                    </div>
            </div>
        </div>
        @endauth
    </header>

    <section>
        @foreach ($reviews as $review)
            <div class="flex items-start space-x-6 p-6 my-4 bg-gray-200 shadow-lg">
                {{-- Left Side --}}
                <div class="flex-shrink-0">
                    <img src="{{ $review->author->image() }}" alt="" class="rounded-full w-12 h-12">
                </div>

                {{-- Right Side --}}
                <div class="w-full">
                    <header class="mb-2">
                        <div class="flex items-center justify-between">
                            <a href="{{ route('profile.show', $review->author->username) }}" class="hover:underline">
                                <h2 class="font-bold">{{ $review->author->name }}</h2>
                            </a>

                            @if (auth()->id() === $review->author->id)
                            <a href="{{ route('dashboard.movies.reviews.edit', $review->id) }}">
                                <svg class="w-5 h-5 text-gray-500 cursror-pointer hover:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                            </a>
                            @endif
                        </div>

                        <div class="flex items-center space-x-2">
                            @include('inc.badge', ['user' => $review->author])
                            <p class="text-gray-500 text-sm">
                                {{ $review->author->reviews->count() }}
                                {{ $review->author->reviews->count() == 1 ? ' recensione' : ' recensioni' }}
                            </p>
                        </div>
                    </header>

                    <div class="flex items-center space-x-2">
                        <div class="flex items-center">
                            @for ($i = 0; $i < $review->rating; $i++)
                                <svg class="w-4 h-4 text-yellow-400 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            @endfor
                            
                            @for ($i = $review->rating; $i < 5; $i++)
                                <svg class="w-4 h-4 text-gray-500 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            @endfor
                        </div>

                        <p class="text-gray-500 text-sm">
                            Recensione lasciata il {{ $review->created_at->format('d-m-Y') }} 
                            alle {{ $review->created_at->format('H:i') }}
                            {{ $review->created_at != $review->updated_at 
                                ? '- modificata il '. $review->updated_at->format('d-m-Y') . ' alle ' . $review->updated_at->format('H:i')
                                : '' }}
                        </p>
                    </div>
                    
                    <p class="mt-2 mb-4">
                        {{ $review->body }}
                    </p>

                    {{-- Like System --}}
                    <footer>
                        @auth
                        <div class="text-sm text-gray-500 flex items-center space-x-4">
                            <p class="flex items-center space-x-1">
                                <svg
                                    wire:click="toggleLike({{ $review->id }})"
                                    class="{{ auth()->user()->likes->contains('review_id', $review->id) ? 'text-blue-400' : '' }} w-5 h-5 text-gray-500 transition duration-100 cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"></path></svg>
                                <span>{{ $review->likes_count }}</span>
                            </p>
                        </div>
                        @else 
                        <div class="text-sm text-gray-500 flex items-center space-x-4">
                            <a href="{{ route('login') }}" class="flex items-center space-x-1">
                                <svg class="w-5 h-5 text-gray-500 hover:text-gray-700 transition duration-200 cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"></path></svg>
                                <span>{{ $review->likes_count }}</span>
                            </a>
                        </div>
                        @endauth
                    </footer>
                </div>
            </div>
        @endforeach

        <div class="mt-6">
            {{ $reviews->links() }}
        </div>
    </section>
</div>
