<div x-data="{view: '{{ explode('/', request()->path())[1] }}' }">
    {{-- Left Menu --}}
    <div class="w-14 fixed top-0 bottom-0 bg-sidebar-100">
    
        <div class="border-b border-sidebar-200 bg-sidebar-100 py-8 px-2"></div>

        {{-- Sidebar Main Menu --}}
        <div class="flex flex-col">

            <div class="flex-shrink-0 text-gray-400 py-4 justify-center flex" :class="{ 'bg-green-400 border-b-2 border-gray-700' : view == 'index' }">
                <svg
                    @click="view = 'index'" 
                    class="w-6 h-6 cursor-pointer hover:text-gray-200 transition duration-200"
                    :class="{ 'text-gray-100' : view == 'index' }"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
            </div>

            <div class="flex-shrink-0 text-gray-400 py-4 justify-center flex" :class="{ 'bg-green-400 border-b-2 border-gray-700' : view == 'movies' }">
                <svg
                    @click="view = 'movies'"
                    class="w-6 h-6 cursor-pointer hover:text-gray-200 transition duration-200"
                    :class="{ 'text-gray-100' : view == 'movies' }"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"></path></svg>
            </div>

            <div class="flex-shrink-0 text-gray-400 py-4 justify-center flex" :class="{ 'bg-green-400 border-b-2 border-gray-700' : view == 'settings' }">
                <svg
                    @click="view = 'settings'"
                    class="w-6 h-6 cursor-pointer hover:text-gray-200 transition duration-200"
                    :class="{ 'text-gray-100' : view == 'settings' }"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            </div>

            <div class="flex-shrink-0 text-gray-400 py-4 justify-center flex" :class="{ 'bg-green-400 border-b-2 border-gray-700' : view == 'badges' }">
                <svg
                    @click="view = 'badges'"
                    class="w-6 h-6 cursor-pointer hover:text-gray-200 transition duration-200"
                    :class="{ 'text-gray-100' : view == 'badges' }"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
            </div>

            <div class="flex-shrink-0 text-gray-400 py-4 justify-center flex">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="focus:outline-none">
                        <svg
                            class="w-6 h-6 cursor-pointer hover:text-gray-200 transition duration-200"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>                        
                    </button>
                </form>
            </div>

        </div>
    </div>
    
    {{-- Right Menu --}}
    <div class="fixed left-14 top-0 bottom-0 w-60 text-gray-100 bg-sidebar-200">
    
        <div class="border-b border-gray-500 p-5">
            <a href="{{ route('dashboard.index') }}">
                <h2 class="text-gray-100">Dashboard</h2>
            </a>
        </div>

        <div>
            <div x-show.transition.in.duration.200ms="view === 'index'" >
                {{-- Info --}}
                @livewire('user-profile')
            </div>
    
            <div x-show.transition.in.duration.200ms="view === 'movies'">
                {{-- Estrarre --}}
                @include('inc.sidebar-movies')
           </div>
    
            <div x-show.transition.in.duration.200ms="view === 'settings'" >
                @include('inc.sidebar-settings')
            </div>

            <div x-show.transition.in.duration.200ms="view === 'badges'" >
                @include('inc.sidebar-badges')
            </div>
        </div>
    
    </div>
</div>
