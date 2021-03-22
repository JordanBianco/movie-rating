<x-app-layout>
    @if ($user->profile->is_public == 1 || auth()->id() == $user->id)
    <div class="flex py-16 space-x-16">
        {{-- Left Side --}}
        <div class="w-2/3">
            <div class="flex-shrink-0">
                <img src="{{ $user->image() }}" alt="avatar" class="w-72 h-72 object-cover">
            </div>
        </div>

        {{-- Right Side --}}
        <div>
            <header class="mb-16" style="min-height: 200px">
                <div class="flex items-center space-x-4">
                    <h2 class="font-semibold text-2xl">{{ $user->name }}</h2>
                    @if ($user->profile->location)
                    <div class="flex items-center space-x-1 text-gray-400">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <p class="text-xs">{{ $user->profile->location }}</p>
                    </div>
                    @endif
                </div>
    
                @if ($user->profile->job)
                <p class="font-semibold text-blue-500 text-sm">{{ $user->profile->job }}</p>
                @endif

                @if ($user->profile->bio)
                <div class="mt-4">
                    <span class="text-gray-400 uppercase text-xs tracking-widest">About me</span>
                    <p class="text-gray-500 text-sm">{{ $user->profile->bio }}</p>
                </div>
                @endif
                
            </header>

            {{-- Scrollable content --}}
            <section x-data="{ tab: 'timeline' }">

                <div class="flex items-center border-b border-gray-200 w-full mb-8">
                    <div
                        @click="tab = 'timeline'"
                        :class="{ 'text-gray-800 border-b border-blue-500 transition duration-200': tab === 'timeline' }"
                        class="hover:text-gray-500 flex items-center space-x-1 text-gray-400 px-3 py-2 cursor-pointer">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                            <span>Timeline</span>
                    </div>

                    <div
                        @click="tab = 'about'"
                        :class="{ 'text-gray-800 border-b border-blue-500 transition duration-200': tab === 'about' }"
                        class="hover:text-gray-500 flex items-center space-x-1 text-gray-400 px-3 py-2 cursor-pointer">
                            <svg
                                class="w-4 h-4"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            <span>About</span>
                    </div>
                </div>

                <div x-show="tab === 'timeline'">
                    @include('inc.timeline', ['user' => $user])
                </div>
                
                
                <div x-show="tab === 'about'">
                    <div>
                        <p class="text-gray-400 uppercase text-xs tracking-widest">Contact information</p>
                        
                        <div class="my-8">
                            @if ($user->profile->phone)
                            <div class="flex items-start justify-between text-sm my-2">
                                <span class="text-gray-700 font-semibold">Phone</span>
                                <span class="text-blue-500">{{ $user->profile->phone }}</span>
                            </div>
                            @endif

                            @if ($user->profile->website)
                            <div class="flex items-start justify-between text-sm my-2">
                                <span class="text-gray-700 font-semibold">Website</span>
                                <span class="text-blue-500">{{ $user->profile->website }}</span>
                            </div>
                            @endif

                            <div class="flex items-start justify-between text-sm my-2">
                                <span class="text-gray-700 font-semibold">Email</span>
                                <span class="text-blue-500">{{ $user->email }}</span>
                            </div>
                        </div>
                    </div>

                    <p class="text-gray-400 uppercase text-xs tracking-widest my-8">Basic information</p>

                    <div class="flex items-start justify-between text-sm my-2">
                        <span class="text-gray-700 font-semibold">Birth date</span>
                        <span class="text-gray-500">{{ $user->birth_date }}</span>
                    </div>
                    
                    <div class="flex items-start justify-between text-sm my-2">
                        <span class="text-gray-700 font-semibold">Gender</span>
                        <span class="text-gray-500">{{ Str::ucfirst($user->gender) }}</span>
                    </div>
                </div>

            </section>
        </div>
    </div>
    @else
    <p class="m-10 text-center font-semibold">Questo utente ha un profilo privato</p>
    @endif
</x-app-layout>