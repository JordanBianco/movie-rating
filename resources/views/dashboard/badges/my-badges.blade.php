<x-dashboard-layout>
    <div>
        <h2 class="uppercase font-bold text-sidebar-300 hidden sm:block mb-10">My Badges</h2>

        @if (auth()->user()->profile->level > 0)
            <div class="flex items-center space-x-4">
                <span>My badge:</span>
                @include('inc.badge', ['user' => auth()->user()])
            </div>
        @else 
            <p>No badge yet.</p>
        @endif

        <hr class="my-6">

        <div class="text-gray-500">
            <p>Il tuo livello:
                <span class="font-semibold text-gray-800 text-lg">{{ auth()->user()->profile->level }}</span>
            </p>
            <p>I tuoi punti:
                <span class="font-semibold text-gray-800 text-lg">{{ auth()->user()->profile->points }}</span>
            </p>
            <p>Le tue recensioni:
                <span class="font-semibold text-gray-800 text-lg">{{ auth()->user()->reviews->count() }}</span>
            </p>

            @unless (auth()->user()->profile->level == 5)
            <p class="mt-4">Punti necessari per il prossimo livello:
                <span class="font-semibold text-gray-800 text-lg"> {{ auth()->user()->profile->nextLevel() }}</span>
            </p>
            @endunless
        </div>
        
    </div>
</x-dashboard-layout>