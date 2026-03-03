@props(['video'])

@php
    $snippet = $video['snippet'] ?? [];
    $videoId = $snippet['resourceId']['videoId'] ?? $video['id']['videoId'] ?? '';
    $snippet = $video['snippet'] ?? [];
    $title = $snippet['title'] ?? 'Vídeo sem título';
    // O html_entity_decode é importante porque a API do YouTube pode retornar títulos com &amp; ou &#39;
    $title = html_entity_decode($title, ENT_QUOTES, 'UTF-8');
    
    // Pegamos a thumbnail de tamanho médio se existir, senão pegamos o padrão
    $thumbnail = $snippet['thumbnails']['medium']['url'] ?? $snippet['thumbnails']['default']['url'] ?? '';
    
    // Formata a data de publicação usando o Carbon (ex: data original 2024-03-20T10:00:00Z vira 20/03/2024)
    $publishedAt = isset($snippet['publishedAt']) ? \Carbon\Carbon::parse($snippet['publishedAt'])->format('d/m/Y') : '';
@endphp

@if($videoId)
<a href="https://www.youtube.com/watch?v={{ $videoId }}" target="_blank" class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden transform hover:-translate-y-2 transition duration-300 border-b-4 border-pink-500 hover:shadow-2xl flex flex-col h-full group">
    
    {{-- Container da Imagem do Vídeo (Thumbnail) --}}
    <div class="relative w-full aspect-video overflow-hidden bg-gray-200 dark:bg-gray-700">
        @if($thumbnail)
            <img src="{{ $thumbnail }}" alt="{{ $title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
        @else
            <div class="w-full h-full flex items-center justify-center text-gray-400">Sem imagem</div>
        @endif
        
        {{-- Ícone Play overlay (aparece no hover) --}}
        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 bg-black bg-opacity-30">
            <svg class="w-16 h-16 text-red-600 drop-shadow-lg" fill="currentColor" viewBox="0 0 24 24">
                <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
            </svg>
        </div>
    </div>

    {{-- Área de Texto (Título e Data) --}}
    <div class="p-4 flex flex-col flex-grow">
        {{-- O 'line-clamp-2' limita o texto a 2 linhas, evitando quebrar o layout --}}
        <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2 line-clamp-2 leading-tight group-hover:text-pink-600 transition">{{ $title }}</h3>
        
        <div class="mt-auto pt-4 flex items-center justify-between text-sm text-gray-500 dark:text-gray-400 font-sans">
            <span>{{ $publishedAt }}</span>
            <span class="font-medium flex items-center gap-1 group-hover:text-pink-500 transition">
                Assistir
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </span>
        </div>
    </div>
</a>
@endif
