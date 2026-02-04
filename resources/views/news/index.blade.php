<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                {{-- Sidebar de Categorias (Desktop) --}}
                <div class="hidden lg:block lg:col-span-1 space-y-6">
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-4">Categorias</h3>
                        <ul class="space-y-3">
                            <li>
                                <a href="{{ route('news.index') }}" 
                                   class="flex justify-between items-center group {{ !request('category') ? 'text-red-600 font-semibold' : 'text-gray-600 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-500' }}">
                                    <span>Todos os artigos</span>
                                    <span class="text-sm text-gray-400 group-hover:text-red-500">[{{ \App\Models\News::count() }}]</span>
                                </a>
                            </li>
                            @foreach($categories as $category)
                            <li>
                                <a href="{{ route('news.index', ['category' => $category->slug]) }}" 
                                   class="flex justify-between items-center group {{ request('category') == $category->slug ? 'text-red-600 font-semibold' : 'text-gray-600 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-500' }}">
                                    <span>{{ $category->name }}</span>
                                    <span class="text-sm text-gray-400 group-hover:text-red-500">[{{ $category->news_count }}]</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                {{-- Área Principal --}}
                <div class="lg:col-span-3">
                    <h2 class="noticias-ultimas-titulo text-2xl font-bold mb-6 border-l-4 border-[#c4170c] pl-3 dark:text-gray-50 flex items-center justify-between">
                        <span>
                            @if(request('category'))
                                {{ $categories->where('slug', request('category'))->first()->name ?? 'Categoria' }}
                            @else
                                Últimas notícias
                            @endif
                        </span>
                        @if(request('category'))
                            <a href="{{ route('news.index') }}" class="text-sm font-normal text-red-600 hover:underline">Ver todas</a>
                        @endif
                    </h2>

                    @if($news->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-6 mb-8">
                            @foreach ($news as $noticia)
                                <div class="col-span-1">
                                    <x-card-news :news="$noticia" class="h-full" />
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-6">
                            {{ $news->appends(request()->query())->links() }}
                        </div>
                    @else
                        <div class="bg-white dark:bg-gray-800 rounded-lg p-8 text-center shadow-sm">
                            <p class="text-gray-500 dark:text-gray-400 text-lg">Nenhuma notícia encontrada nesta categoria.</p>
                            <a href="{{ route('news.index') }}" class="mt-4 inline-block text-red-600 hover:underline">Voltar para todas as notícias</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>