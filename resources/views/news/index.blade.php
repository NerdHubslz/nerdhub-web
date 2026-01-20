<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="noticias-ultimas-titulo text-2xl font-bold mb-4 border-l-4 border-[#c4170c] pl-2 dark:text-gray-50">
                Últimas notícias
            </h2>
            @if($news->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-4 lg:grid-cols-6 gap-4 mb-8 auto-rows-[24rem]">
                @foreach ($news as $index => $noticia)
                    @php
                        $span_classes = '';
                        $mod_index = $index % 5; // Create a repeating pattern every 5 items

                        if ($mod_index == 0) {
                            $span_classes = 'lg:col-span-4 lg:row-span-2 sm:col-span-4';
                        } elseif ($mod_index == 1) {
                            $span_classes = 'lg:col-span-2 lg:row-span-1 sm:col-span-2';
                        } elseif ($mod_index == 2) {
                            $span_classes = 'lg:col-span-2 lg:row-span-1 sm:col-span-2';
                        } elseif ($mod_index == 3) {
                            $span_classes = 'lg:col-span-3 lg:row-span-1 sm:col-span-2';
                        } elseif ($mod_index == 4) {
                            $span_classes = 'lg:col-span-3 lg:row-span-1 sm:col-span-2';
                        }
                    @endphp
                    <div class="{{ $span_classes }}">
                        <x-card-news :news="$noticia" :featured="$mod_index == 0" class="h-full" />
                    </div>
                @endforeach
            </div>
            {{ $news->links() }}
            @else
                <p class="text-center text-gray-500 dark:text-gray-400">Nenhuma notícia encontrada.</p>
            @endif
        </div>
    </div>
</x-app-layout>