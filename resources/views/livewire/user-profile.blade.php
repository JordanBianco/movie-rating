<div x-data="{ open: false }" x-cloak class="text-gray-300 p-4">

    <h3 class="uppercase text-gray-400 px-2">Profile</h3>

    {{-- User Deatils --}}
    <div class="px-2">
        @include('inc.badge', ['user' => auth()->user()] )
    </div>
    <div class="flex space-x-3 mt-8">
        <div class="flex-shrink-0">
            <img src="{{ auth()->user()->image() }}" alt="avatar" class="rounded-full w-12 h-12 object-cover">
        </div>

        <div>
            <h2 class="text-gray-100">{{ auth()->user()->name }}</h2>
            <p class="text-gray-400 text-sm">{{ auth()->user()->username }}</p>
        </div>
    </div>

    {{-- User Info --}}
    <div class="text-sm mt-8">

        <div class="space-y-6">

            {{-- Bio --}}
            <div class="flex items-start space-x-2">
                <div class="flex-shrink-0">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <p>{{ auth()->user()->profile->bio == '' ? 'Talk about Yourself' : auth()->user()->profile->bio }}</p>
            </div>
            
            {{-- Phone --}}
            <div class="flex items-center space-x-2">
                <div class="flex-shrink-0">
                    <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path></svg>
                </div>
                <span>{{ auth()->user()->profile->phone == '' ? 'Add Your phone Number' : auth()->user()->profile->phone }}</span>
            </div>
            
            {{-- Website --}}
            <div class="flex items-center space-x-2">
                <div class="flex-shrink-0">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"></path></svg>
                </div>
                <span>{{ auth()->user()->profile->website == '' ? 'Add Your Website' : auth()->user()->profile->website }}</span>
            </div>
            
            {{-- Job --}}
            <div class="flex items-center space-x-2">
                <div class="flex-shrink-0">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
                <span>{{ auth()->user()->profile->job == '' ? 'Add Your Job position' : auth()->user()->profile->job }}</span>
            </div>
            
            {{-- Location --}}
            <div class="flex items-center space-x-2">
                <div class="flex-shrink-0">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                </div>
                <span>{{ auth()->user()->profile->location == '' ? 'Add Your Location' : auth()->user()->profile->location }}</span>
            </div>
        </div>

        {{-- Visibility --}}
        <div class="flex items-center space-x-2 mt-10 mb-6">
            @if (auth()->user()->profile->is_public == 0)
            <div class="flex-shrink-0">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
            </div>
            @else
            <div class="flex-shrink-0">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
            </div>
            @endif
            <span>{{ auth()->user()->profile->is_public == 0 ? 'Your profile is private' : 'Your profile is public' }}</span>
        </div>
    
        <a href="{{ route('dashboard.settings.profile') }}" class="focus:outline-none hover:text-gray-200 transition duration-200 flex items-center space-x-2 bg-sidebar-300 border-b shadow border-sidebar-100 text-gray-300 w-full rounded p-2">
            <div class="flex-shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
            </div>
            <span>Edit Profile Info</span>
        </a>
    </div>
</div>