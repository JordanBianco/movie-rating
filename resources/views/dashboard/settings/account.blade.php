<x-dashboard-layout>
    <div>
        <h2 class="uppercase font-bold text-sidebar-300 hidden sm:block">Account</h2>
        <p class="text-gray-500">Iscritto il {{ auth()->user()->profile->created_at->format('d-M-Y') }}</p>

        <div class="mt-10">
            @livewire('settings-account')
        </div>
    </div>
</x-dashboard-layout>