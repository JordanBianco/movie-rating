<form wire:submit.prevent="updateUserProfileImage">

    <div class="flex-shrink-0 mb-8">
        <img src="{{ auth()->user()->image() }}" alt="" class="rounded-full w-24 h-24 object-cover">
    </div>

    <div class="mb-6">
        <input
            wire:model="profile_image"
            type="file"
            class="w-full border rounded border-gray-300 py-4">
        @error('profile_image') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror 
    </div>

    <div class="mb-8">
        @if ($profile_image)
            <p class="text-gray-600">Anteprima</p>
            <img src="{{ $profile_image->temporaryUrl() }}" class="w-1/4 h-1/4">
        @endif
    </div>

    <div class="flex items-center space-x-4">
        <button class="bg-indigo-400 hover:bg-indigo-500 text-gray-100 px-4 py-2 rounded shadow">
            Salva
        </button>

        <div wire:loading wire:target="profile_image" class="text-gray-600">Uploading...</div>

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