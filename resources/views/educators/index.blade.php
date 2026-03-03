<x-app-layout>
    <main>
        <section class="container mx-auto px-4 sm:px-6 lg:px-8 py-12 max-w-6xl font-sans">
            <div class="flex flex-col items-center w-full">
                {{-- Título Principal --}}
                <div class="mb-16 text-center">
                    <h1 class="text-4xl md:text-5xl font-extralight text-gray-900 dark:text-gray-100 tracking-tight">
                        Conheça nossos <span class="font-bold border-b-4 border-brand-blue dark:border-brand-green pb-2">educadores</span>
                    </h1>
                    <p class="mt-4 text-lg text-gray-600 dark:text-gray-400">Os profissionais que guiam nossa jornada de aprendizado.</p>
                </div>

                {{-- 1. Seção do Coordenador (Hero Card Destaque) --}}
                @if($coordinator)
                    <div class="w-full mb-16">
                        <article class="relative overflow-hidden bg-white dark:bg-gray-800 rounded-3xl shadow-xl flex flex-col md:flex-row items-center border border-gray-100 dark:border-gray-700 hover:shadow-2xl transition-all duration-300 group">
                            <!-- Elemento visual decorativo de fundo -->
                            <div class="absolute -right-20 -top-20 w-64 h-64 bg-brand-blue/10 dark:bg-brand-green/10 rounded-full blur-3xl group-hover:bg-brand-blue/20 dark:group-hover:bg-brand-green/20 transition-all duration-500"></div>
                            
                            <!-- Avatar Column -->
                            <div class="w-full md:w-1/3 p-6 flex justify-center items-center bg-gray-50/50 dark:bg-gray-800/50 border-b md:border-b-0 md:border-r border-gray-100 dark:border-gray-700">
                                <div class="relative">
                                    <div class="absolute inset-0 bg-gradient-to-tr from-brand-blue to-brand-green rounded-full blur-md opacity-40 group-hover:opacity-60 transition-opacity"></div>
                                    <img 
                                        class="relative z-10 w-32 h-32 md:w-40 md:h-40 object-cover object-top rounded-full border-4 border-white dark:border-gray-800 shadow-lg"
                                        src="{{ $coordinator->avatar ? asset($coordinator->avatar) : asset('images/logos/favicon pato site.png') }}" 
                                        alt="Foto de {{ $coordinator->name }}"
                                    >
                                    <div class="absolute -bottom-4 left-1/2 transform -translate-x-1/2 z-20">
                                        <span class="bg-gradient-to-r from-brand-blue to-blue-600 text-white text-xs font-bold uppercase tracking-wider py-1.5 px-4 rounded-full shadow-md whitespace-nowrap">
                                            Coordenação
                                        </span>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Content Column -->
                            <div class="w-full md:w-2/3 p-6 md:p-8 z-10">
                                <header class="mb-4 text-center md:text-left">
                                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white mb-1 group-hover:text-brand-blue dark:group-hover:text-brand-green transition-colors">
                                        {{ $coordinator->name }} {{ $coordinator->last_name }}
                                    </h2>
                                    <p class="text-brand-blue dark:text-brand-green font-medium text-base">
                                        {{ $coordinator->position ?? 'Coordenador(a)' }}
                                    </p>
                                </header>
                                <div class="text-gray-600 dark:text-gray-300 prose prose-base dark:prose-invert text-center md:text-left line-clamp-4 leading-relaxed">
                                    {!! nl2br(e($coordinator->bio)) !!}
                                </div>
                            </div>
                        </article>
                    </div>
                @endif

                {{-- 2. Loop de Professores (Grid Vertical Moderno) --}}
                @if($educators->count() > 0)
                    <div class="w-full mb-8">
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-8 border-l-4 border-brand-green pl-4">Corpo Docente</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 w-full">
                            @foreach($educators as $educator)
                                <article class="bg-white dark:bg-gray-800 rounded-2xl shadow-md border border-gray-100 dark:border-gray-700 p-6 flex flex-col items-center text-center hover:-translate-y-2 hover:shadow-xl transition-all duration-300 group">
                                    <div class="relative w-32 h-32 mb-6 mt-2">
                                        <div class="absolute inset-0 bg-brand-green/20 rounded-full blur-md group-hover:bg-brand-green/40 transition-colors duration-300"></div>
                                        <img 
                                            class="relative z-10 w-32 h-32 rounded-full object-cover object-top border-4 border-white dark:border-gray-700 shadow-sm transition-transform duration-300 group-hover:scale-105" 
                                            src="{{ $educator->avatar ? asset($educator->avatar) : asset('images/logos/favicon pato site.png') }}" 
                                            alt="Foto de {{ $educator->name }}"
                                        >
                                    </div>
                                    
                                    <header class="mb-4">
                                        <h3 class="text-xl font-bold text-gray-900 dark:text-white group-hover:text-brand-green transition-colors">
                                            {{ $educator->name }} {{ $educator->last_name }}
                                        </h3>
                                        <p class="text-sm font-medium text-brand-green dark:text-brand-green/80 mt-1 uppercase tracking-wider">
                                            {{ $educator->position ?? 'Professor(a)' }}
                                        </p>
                                    </header>
                                    
                                    <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed line-clamp-4 flex-grow">
                                        {!! nl2br(e($educator->bio)) !!}
                                    </p>
                                </article>
                            @endforeach
                        </div>
                    </div>
                @else
                    @if(!$coordinator)
                        <div class="w-full text-center py-20 bg-gray-50 dark:bg-gray-800/50 rounded-2xl border border-dashed border-gray-200 dark:border-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 mx-auto text-gray-400 mb-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                            </svg>
                            <p class="text-gray-500 dark:text-gray-400 text-lg">Nenhum educador cadastrado no momento.</p>
                        </div>
                    @endif
                @endif

                {{-- 3. Paginação Automática do Laravel --}}
                <div class="mt-8 w-full flex justify-center">
                    {{ $educators->links() }}
                </div>
            </div>
        </section>
    </main>
</x-app-layout>