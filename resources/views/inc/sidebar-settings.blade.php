<div class="p-4">
    <h3 class="uppercase text-gray-400 px-2">Settings</h3>

    <div class="text-sm mt-8 space-y-2">
        {{-- User Profile Image --}}
        <a
            href="{{ route('dashboard.settings.image') }}"
            class="flex items-start space-x-2 hover:bg-sidebar-300 p-2 rounded transition duration-200
                {{ request()->is('dashboard/settings/image') ? 'bg-sidebar-300' : '' }}"
            >
                <div class="flex-shrink-0">
                    <svg
                        class="w-5 h-5
                        {{ request()->is('dashboard/settings/image') ? 'text-gray-100' : 'text-gray-400' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
                <p>Profile Image</p>
        </a>

        {{-- User Profile Details --}}
        <a
            href="{{ route('dashboard.settings.profile') }}"
            class="flex items-start space-x-2 hover:bg-sidebar-300 p-2 rounded transition duration-200
                {{ request()->is('dashboard/settings/profile') ? 'bg-sidebar-300' : '' }}"
            >
                <div class="flex-shrink-0">
                    <svg
                        class="w-5 h-5
                        {{ request()->is('dashboard/settings/profile') ? 'text-gray-100' : 'text-gray-400' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                </div>
                <p>Profile Details</p>
        </a>

        {{-- User Account Details --}}
        <a
            href="{{ route('dashboard.settings.account') }}"
            class="flex items-start space-x-2 hover:bg-sidebar-300 p-2 rounded transition duration-200
                {{ request()->is('dashboard/settings/account') ? 'bg-sidebar-300' : '' }}"
            >
                <div class="flex-shrink-0">
                    <svg
                        class="w-5 h-5
                        {{ request()->is('dashboard/settings/account') ? 'text-gray-100' : 'text-gray-400' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </div>
                <p>Account</p>
        </a>
    
        {{-- User Password --}}
        <a
            href="{{ route('dashboard.settings.password') }}"
            class="flex items-start space-x-2 hover:bg-sidebar-300 p-2 rounded transition duration-200
                {{ request()->is('dashboard/settings/password') ? 'bg-sidebar-300' : '' }}"
            >
                <div class="flex-shrink-0">
                    <svg
                        class="w-5 h-5
                        {{ request()->is('dashboard/settings/password') ? 'text-gray-100' : 'text-gray-400' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path></svg>
                </div>
                <p>Password</p>
        </a>
    
    </div>
</div>
