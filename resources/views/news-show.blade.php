<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold text-center mb-5 dark:text-gray-50">{{ $news->titulo }}</h1>
            @if($news->imagem_url)
            <img src="{{ $news->imagem_url }}" alt="{{ $news->titulo }} imagem" class="w-full h-96 object-cover rounded-lg mb-5">
            @endif
            <hr class="mb-5">
            <div class="prose dark:prose-invert max-w-none">
                {!! $news->conteudo !!}
            </div>
            <div class=" mb-5 dark:text-gray-300">
                <span>Por {{ $news->author->name }}</span>
                <span class="ml-3">{{ $news->created_at->format('d/m/Y H:i') }}</span>
            </div>
        </div>
    </div>
</x-app-layout>
