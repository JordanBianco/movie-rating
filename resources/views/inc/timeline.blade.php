<div class="mt-10">
    @foreach ($user->feeds as $feed)
        <div class="my-4">
            @include('feeds.' . $feed->description)
        </div>
    @endforeach
</div>
