<div>
    <form wire:submit.prevent="updateUserProfile">
       
        <div class="space-y-6">
            {{-- Bio --}}
            <div>
                <label for="bio" class="uppercase text-sm text-gray-400">Bio</label>
                <div class="flex items-center">
                    <textarea
                        wire:model.defer="bio"
                        rows="4"
                        class="w-full text-gray-800 resize-none border-gray-300 focus:outline-none rounded"></textarea>
                </div>
                <p class="flex justify-end mt-1 text-xs text-gray-600">max 400 char</p>
                @error('bio') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror 
            </div>

            <div>
                <label for="phone" class="uppercase text-sm text-gray-400">Phone</label>
                <input
                    wire:model.defer="phone"
                    type="text"
                    class="w-full border rounded border-gray-300">
                @error('phone') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror 
            </div>

            <div>
                <label for="website" class="uppercase text-sm text-gray-400">Website</label>
                <input
                    wire:model.defer="website"
                    type="text"
                    class="w-full border rounded border-gray-300">
                @error('website') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror 
            </div>

            <div>
                <label for="job" class="uppercase text-sm text-gray-400">Job</label>
                <input
                    wire:model.defer="job"
                    type="text"
                    class="w-full border rounded border-gray-300">
                @error('job') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror 
            </div>

            <div>
                <label for="location" class="uppercase text-sm text-gray-400">Location</label>
                <input
                    wire:model.defer="location"
                    type="text"
                    class="w-full border rounded border-gray-300">
                @error('location') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror 
            </div>

            <div class="flex items-end justify-between">
                <div>
                    <label for="is_public" class="uppercase text-sm text-gray-400">
                        Visibility
                    </label>
                    <p>Il tuo profilo è {{ auth()->user()->profile->is_public == 0 ? 'privato.' : 'pubblico.' }}</p>
                    <p class="text-sm text-gray-500">Spunta la casella per rendere il tuo profilo privato</p>
                </div>
                <input wire:change="toggleVisibility" type="checkbox" {{ auth()->user()->profile->is_public == 1 ? '' : 'checked' }}>
                
                @error('is_public') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror 
            </div>
        </div>

        <div class="flex items-center space-x-4 mt-8">
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
