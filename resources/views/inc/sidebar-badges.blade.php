<div class="p-4">
    <h3 class="uppercase text-gray-400 px-2">Badge</h3>

    <div class="text-sm mt-8 space-y-2">
        <a
            href="{{ route('dashboard.badges.my-badges') }}"
            class="flex items-start space-x-2 hover:bg-sidebar-300 p-2 rounded transition duration-200
                {{ request()->is('dashboard/badges/my-badges') ? 'bg-sidebar-300' : '' }}"
            >
                <div class="flex-shrink-0">
                    <svg
                        class="w-5 h-5
                        {{ request()->is('dashboard/badges/my-badges') ? 'text-gray-100' : 'text-gray-400' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                </div>
                <p>My Badges</p>
        </a>

        <a
            href="{{ route('dashboard.badges.help') }}"
            class="flex items-start space-x-2 hover:bg-sidebar-300 p-2 rounded transition duration-200
                {{ request()->is('dashboard/badges/help') ? 'bg-sidebar-300' : '' }}"
            >
                <div class="flex-shrink-0">
                    <svg
                        class="w-5 h-5
                        {{ request()->is('dashboard/badges/help') ? 'text-gray-100' : 'text-gray-400' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <p>What are badges</p>
        </a>

    
    </div>
</div>
