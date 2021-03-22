<x-dashboard-layout>

    <h2 class="uppercase font-bold text-sidebar-300 hidden sm:block mb-10">Edit Your Review</h2>

    <div>
        @livewire('update-review', ['review' => $review])
    </div>

</x-dashboard-layout>