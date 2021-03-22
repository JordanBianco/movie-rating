<x-dashboard-layout>
    <div>
        <div class="flex item-start justify-between">
            <h2 class="uppercase font-bold text-sidebar-300 mb-2 flex items-center space-x-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span>Timeline</span>
            </h2>

            <div class="flex-shrink-0">
                <a
                    target="_blank"
                    href="{{ route('profile.show', auth()->user()->username ) }}"
                    class="bg-indigo-400 hover:bg-indigo-500 text-xs text-gray-100 px-2 py-2 rounded flex items-center space-x-2">
                        <span>View your profile</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                </a>
            </div>
        </div>

        @include('inc.timeline', ['user' => auth()->user()])
    </div>
</x-dashboard-layout>
