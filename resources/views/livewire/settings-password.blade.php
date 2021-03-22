<div>
    <form wire:submit.prevent="updateUserPassword">

        <div class="mb-8">
            <label for="password" class="uppercase text-sm text-gray-400">New Password</label>
            <input
                type="{{ !$show ? 'password' : 'text' }}"
                wire:model.lazy="password"
                class="w-full border rounded border-gray-300">

            <div wire:click="togglePasswordVisibility" class="cursor-pointer mt-1 flex items-center space-x-1 text-sm text-gray-400 hover:text-gray-500 transition duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                <p>{{ !$show ? 'Mostra password' : 'Nascondi Password' }}</p>
            </div>

            @error('password') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror 
        </div>

        <div class="mb-8">
            <label for="password_confirmation" class="uppercase text-sm text-gray-400">Confirm Password</label>
            <input
                type="{{ !$show ? 'password' : 'text' }}"
                wire:model.lazy="password_confirmation"
                class="w-full border rounded border-gray-300">

            @error('password_confirmation') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror 
        </div>

        <div class="flex items-center space-x-4">
            <button class="bg-indigo-400 hover:bg-indigo-500 text-gray-100 px-4 py-2 rounded shadow">
                Salva
            </button>
    
            {{-- Usato 4 volte -> estrarre in component --}}
            @if (session()->has('message'))
            <div
                x-data="{ show: true }"
                x-show="show"
                x-init="setTimeout(() => show = false, 3500)"
                class="flex items-center space-x-1 text-green-400">
                    <svg class="w-5 h-5 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span>{{ session('message') }}</span>
            </div>
            @endif

        </div>
    </form>
</div>

