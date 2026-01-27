<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section class="flex justify-center mb-10">
                    <img src="{{ asset('images/banner.png') }}" alt="Banner Principal" class="size-[65%] object-cover " />
                </section>

                <!-- Sobre o nerdhub -->
                <section
                    class="bg-[#00538A] w-screen relative left-[50%] right-[50%] ml-[-50vw] mr-[-50vw] rounded-none shadow-lg p-6 sm:p-8 md:p-10 mb-10">
                    <h2 class="text-3xl sm:text-4xl font-bold mb-4 text-center underline text-white">
                        Sobre o NerdHub
                    </h2>

                    <p class="text-white mb-8 text-base sm:text-lg max-w-5xl mx-auto text-center font-[Poppins]">
                        O
                        <strong>Nerdhub</strong>
                        é um portal desenvolvido por alunos e para alunos do curso de
                        <strong>Ciência da Computação da Estácio São Luís</strong>. Aqui, você encontra informações,
                        notícias, eventos, conteúdos e tudo o que precisa para se manter conectado com o universo da
                        tecnologia, da programação e do seu curso.
                    </p>

                    <!-- Grid 2x2 -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 sm:gap-8 max-w-5xl mx-auto">
                        <div class="bg-white rounded-lg p-4 sm:p-6 shadow-md">
                            <h3 class="text-xl sm:text-2xl font-bold mb-2 text-[#00538A]">Missão</h3>
                            <p class="text-gray-700 text-sm sm:text-base">
                                Levar informação, conectar estudantes e promover o desenvolvimento acadêmico e
                                profissional na área de tecnologia.
                            </p>
                        </div>

                        <div class="bg-white rounded-lg p-4 sm:p-6 shadow-md">
                            <h3 class="text-xl sm:text-2xl font-bold mb-2 text-[#00538A]">Visão</h3>
                            <p class="text-gray-700 text-sm sm:text-base">
                                Tornar-se a principal plataforma de apoio e informação para estudantes de tecnologia da
                                região.
                            </p>
                        </div>

                        <div class="bg-white rounded-lg p-4 sm:p-6 shadow-md">
                            <h3 class="text-xl sm:text-2xl font-bold mb-2 text-[#00538A]">Valores</h3>
                            <p class="text-gray-700 text-sm sm:text-base">
                                Colaboração, aprendizado contínuo, paixão por tecnologia e comprometimento com a
                                comunidade acadêmica.
                            </p>
                        </div>

                        <div class="bg-white rounded-lg p-4 sm:p-6 shadow-md">
                            <h3 class="text-xl sm:text-2xl font-bold mb-2 text-[#00538A]">Objetivo</h3>
                            <p class="text-gray-700 text-sm sm:text-base">
                                Ser um hub de conhecimento, facilitando o acesso a conteúdos relevantes e oportunidades
                                para estudantes.
                            </p>
                        </div>
                    </div>
                </section>

                <!-- Notícias -->
                <section class="mb-10">
                    <h1
                        class="text-[2.5rem] text-green-900 dark:text-gray-100 font-extralight max-sm:text-3xl max-md:text-3xl max-sm:text-center underline text-center mb-10">
                        Noticias</h1>

                    @if($news->isNotEmpty())
                        @php
                            $mainNews = $news->first();
                            $otherNews = $news->skip(1);
                        @endphp

                        <!-- Notícia Principal -->
                        <article
                            class="bg-white rounded-lg shadow-lg overflow-hidden mb-12 hover:shadow-2xl transition-shadow flex flex-col md:flex-row">
                            <img src="{{ str_starts_with($mainNews->imagem_url, 'http') ? $mainNews->imagem_url : Storage::url($mainNews->imagem_url) }}" alt="{{ $mainNews->titulo }}"
                                class="w-full md:w-1/2 h-128 md:h-auto object-cover" />
                            <div class="p-6 flex flex-col justify-center md:w-1/2">
                                <h3 class="text-3xl font-extrabold mb-4">{{ $mainNews->titulo }}</h3>
                                <p class="text-gray-700 mb-6">
                                    {{ $mainNews->excerpt }}
                                </p>
                                <a href="{{ route('news.show', $mainNews) }}" class="text-blue-600 hover:underline mt-3 inline-block font-bold text-lg">Leia mais &rarr;</a>
                            </div>
                        </article>

                        <!-- Noticias menores -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($otherNews as $item)
                                <x-nerdhub.card-news :news="$item" />
                            @endforeach
                        </div>
                    @else
                        <p class="text-center text-gray-500">Nenhuma notícia encontrada.</p>
                    @endif
                </section>
                <!-- Próximos Eventos -->
                @if(isset($upcomingEvents) && $upcomingEvents->isNotEmpty())
                <section class="mb-12">
                    <h1 class="text-[2.5rem] text-indigo-900 dark:text-indigo-100 font-extralight max-sm:text-3xl max-md:text-3xl max-sm:text-center underline text-center mb-10">
                        Próximos Eventos
                    </h1>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($upcomingEvents as $event)
                            <a href="{{ route('events.show', $event) }}" class="block bg-white dark:bg-gray-800 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden group">
                                <div class="relative overflow-hidden h-48">
                                    @if($event->banner_image)
                                        <img src="{{ Storage::url($event->banner_image) }}" alt="{{ $event->title }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                                    @else
                                        <div class="w-full h-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                                            <span class="text-4xl">📅</span>
                                        </div>
                                    @endif
                                    <div class="absolute top-0 right-0 bg-indigo-600 text-white text-xs font-bold px-3 py-1 m-2 rounded-full">
                                        {{ $event->start_time->isToday() ? 'HOJE' : $event->start_time->diffForHumans() }}
                                    </div>
                                </div>
                                <div class="p-5">
                                    <h4 class="text-lg font-bold text-gray-800 dark:text-white mb-2 group-hover:text-indigo-400 transition-colors">{{ $event->title }}</h4>
                                    
                                    <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-2">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        {{ $event->start_time->format('d/m/Y \à\s H:i') }}
                                    </div>
                                    
                                    @if($event->location)
                                    <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                        {{ Str::limit($event->location, 30) }}
                                    </div>
                                    @endif
                                </div>
                            </a>
                        @endforeach
                    </div>
                    
                    <div class="text-center mt-8">
                        <a href="{{ route('events.index') }}" class="inline-flex items-center font-semibold text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300">
                            Ver todos os eventos 
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                </section>
                @endif
        </div>
    </div>
</x-app-layout>