<div>
    <form wire:submit.prevent="updateUserAccount">
        
        <div class="mb-6">
            <label for="name" class="uppercase text-sm text-gray-400">Name</label>
            <input
                wire:model.lazy="name"
                type="text"
                class="w-full border rounded border-gray-300">
            @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror 
        </div>

        <div class="mb-6">
            <label for="username" class="uppercase text-sm text-gray-400">Username</label>
            <input
                wire:model.lazy="username"
                type="text"
                class="w-full border rounded border-gray-300">
            @error('username') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror 
        </div>

        <div class="mb-8">
            <label for="email" class="uppercase text-sm text-gray-400">Email</label>
            <input
                wire:model.lazy="email"
                type="email"
                class="w-full border rounded border-gray-300">
            @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror 
        </div>

        <div class="flex items-center space-x-4">
            <button class="bg-indigo-400 hover:bg-indigo-500 text-gray-100 px-4 py-2 rounded shadow">
                Salva
            </button>
    
            @if (session()->has('message'))
            <div
                x-data="{ show: true }"
                x-show.transition.opacity.out.duration.1000ms="show"
                x-init="setTimeout(() => show = false, 3500)"
                class="flex items-center space-x-1 text-green-400">
                    <svg class="w-5 h-5 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span>{{ session('message') }}</span>
            </div>
            @endif
        </div>
    </form>
</div>
