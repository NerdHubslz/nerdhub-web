@props(['name', 'role', 'image', 'description', 'instagram', 'linkedin', 'github'])

<div class="bg-white rounded-2xl shadow-md p-6 flex flex-col items-center text-center border-b-4 border-pink-500">
    <img src="{{ asset($image) }}" alt="{{ $name }}" class="w-32 h-32 rounded-full object-cover mb-4 border-4 border-pink-100">
    <h3 class="text-xl font-bold text-gray-800">{{ $name }}</h3>
    <span class="text-pink-600 font-medium mb-3">{{ $role }}</span>
    <p class="text-gray-600 text-sm mb-6">{{ $description }}</p>
    
    <div class="flex gap-4">
        <a href="{{ $instagram }}" target="_blank" class="text-pink-500 hover:text-pink-700">Instagram</a>
        <a href="{{ $linkedin }}" target="_blank" class="text-pink-500 hover:text-pink-700">LinkedIn</a>
        <a href="{{ $github }}" target="_blank" class="text-pink-500 hover:text-pink-700">GitHub</a>
    </div>
</div>