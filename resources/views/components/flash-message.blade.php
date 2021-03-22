@if (session()->has('success'))
<div
    x-data="{ show: true }"
    x-show.transition.opacity.out.duration.1000ms="show"
    x-init="setTimeout(() => show = false, 3500)"
    class="flex items-center text-sm space-x-1 text-green-600 bg-green-100 p-4 rounded fixed top-16 right-10 shadow-md">
        <svg class="w-5 h-5 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
        <span>{{ session('success') }}</span>
</div>
@endif