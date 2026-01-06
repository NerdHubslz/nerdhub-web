@props(['news', 'featured' => false])

<div {{ $attributes->merge(['class' => 'bg-white rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition duration-300 dark:bg-gray-800 flex flex-col']) }}>
    <div class="relative">
        <img src="{{ str_starts_with($news->imagem_url, 'http') ? $news->imagem_url : Storage::url($news->imagem_url) }}" alt="Imagem da Notícia" class="w-full object-cover {{ $featured ? 'h-96' : 'h-48' }}">
    </div>
    <div class="p-6 flex flex-col flex-grow">
        <h2 class="font-bold text-xl mb-2 text-gray-800 dark:text-gray-50">{{ $news->titulo }}</h2>
        <p class="text-gray-700 dark:text-gray-200 text-base mb-4 font-[Poppins] flex-grow">
            {{ $news->excerpt }}
        </p>

        <div class="flex items-center justify-between mt-auto">
            <a href="{{ route('news.show', $news) }}" class="text-blue-500 hover:text-blue-700 hover:underline font-bold transition duration-300">
                Leia Mais &rarr;
            </a>
        </div>
    </div>
</div>
