<x-app-layout>
    <main>
        <section class="container mx-auto px-4 sm:px-6 lg:px-8 py-10 max-w-4xl font-[Poppins]">
            <div class="flex flex-col items-center w-full">
                {{-- Título Principal --}}
                <h1 class="text-[2.5rem] font-extralight max-sm:text-3xl max-md:text-3xl max-sm:text-center mb-10 text-gray-900 dark:text-gray-100">
                    Conheça nossos <span class="font-bold underline">educadores</span>
                </h1>

                {{-- 1. Seção do Coordenador (Destaque) --}}
                @if($coordinator)
                    <article class="flex bg-white dark:bg-gray-800 border border-solid rounded-xl shadow-lg p-5 items-center gap-5 duration-300 hover:shadow-xl hover:scale-[1.02] w-full mb-8 border-l-8 border-blue-900">
                        <div class="max-md:block max-md:text-center flex items-center gap-4 w-full">
                            <img 
                                class="shadow-lg w-48 h-48 md:w-56 md:h-56 rounded-full object-cover flex-shrink-0 mx-auto md:mx-0 border-2 border-gray-100" 
                                src="{{ $coordinator->avatar ? asset($coordinator->avatar) : asset('images/logos/favicon pato site.png') }}" 
                                alt="Foto de {{ $coordinator->name }}"
                            >
                            <div class="flex flex-col ml-3 gap-2 max-md:ml-0 text-left w-full">
                                <header>
                                    <p class="text-2xl font-bold max-lg:text-xl max-sm:pt-3 text-gray-900 dark:text-white">
                                        {{ $coordinator->name }} {{ $coordinator->last_name }}
                                    </p>
                                    <p class="italic text-base font-light text-blue-700 dark:text-blue-400">
                                        {{ $coordinator->position ?? 'Coordenador(a)' }}
                                    </p>
                                </header>
                                <p class="text-sm text-gray-700 dark:text-gray-300 mt-2 line-clamp-8 leading-relaxed">
                                    {!! nl2br(e($coordinator->bio)) !!}
                                </p>
                            </div>
                        </div>
                    </article>
                @endif

                {{-- 2. Loop de Professores (Corpo Docente) --}}
                @forelse($educators as $educator)
                    <article class="flex bg-white dark:bg-gray-800 border border-solid rounded-xl shadow-lg p-5 items-center gap-5 duration-300 hover:shadow-xl hover:scale-[1.02] w-full mb-8">
                        <div class="max-md:block max-md:text-center flex items-center gap-4 w-full">
                            <img 
                                class="shadow-lg w-48 h-48 md:w-56 md:h-56 rounded-full object-cover flex-shrink-0 mx-auto md:mx-0 border-2 border-gray-50" 
                                src="{{ $educator->avatar ? asset($educator->avatar) : asset('images/logos/favicon pato site.png') }}" 
                                alt="Foto de {{ $educator->name }}"
                            >
                            <div class="flex flex-col ml-3 gap-2 max-md:ml-0 text-left w-full">
                                <header>
                                    <p class="text-2xl font-bold max-lg:text-xl max-sm:pt-3 text-gray-900 dark:text-white">
                                        {{ $educator->name }} {{ $educator->last_name }}
                                    </p>
                                    <p class="italic text-base font-light text-gray-600 dark:text-gray-400">
                                        {{ $educator->position ?? 'Professor(a)' }}
                                    </p>
                                </header>
                                <p class="text-sm text-gray-700 dark:text-gray-300 mt-2 line-clamp-8 leading-relaxed">
                                    {!! nl2br(e($educator->bio)) !!}
                                </p>
                            </div>
                        </div>
                    </article>
                @empty
                    @if(!$coordinator)
                        <p class="text-center mt-10 text-gray-600 dark:text-gray-400">Nenhum educador encontrado no momento.</p>
                    @endif
                @endforelse

                {{-- 3. Paginação Automática do Laravel --}}
                <div class="mt-8 w-full">
                    {{ $educators->links() }}
                </div>
            </div>
        </section>
    </main>
</x-app-layout>