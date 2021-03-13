<x-app-layout>
    <div>
        @foreach ($reviews as $review)
        <div class="my-6 flex flex-cols justify-center">
            <p class="text-lg">Al Film <a href="{{ route('movie.show', $review->slug) }}" class="hover:underline">"{{ $review->title }}"</a> hai dato {{ $review->rating }} stelle, il {{ $review->created_at }}</p>
        </div>
        @endforeach
    </div>
</x-app-layout>
