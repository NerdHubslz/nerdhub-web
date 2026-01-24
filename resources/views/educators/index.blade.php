<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Nossos Educadores') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="text-center mb-16">
                <h1 class="text-4xl font-extralight text-brand-blue dark:text-gray-100 font-['Poppins']">
                    Conheça quem faz a <span class="font-bold text-brand-blue dark:text-brand-green underline decoration-brand-green">diferença</span>
                </h1>
                <p class="mt-4 text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                    Nossa equipe de educadores é formada por profissionais apaixonados por tecnologia e ensino.
                </p>
            </div>

            {{-- Coordinator Section --}}
            @if($coordinator)
                <div class="mb-16 relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-brand-blue to-cyan-600 shadow-lg transform -skew-y-2 sm:skew-y-0 sm:-rotate-1 sm:rounded-3xl opacity-20 dark:opacity-40"></div>
                    <div class="relative bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden border border-gray-100 dark:border-gray-700">
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-0">
                            {{-- Image Side --}}
                            <div class="relative h-64 lg:h-auto bg-gray-200 dark:bg-gray-700">
                                @php
                                    $coordAvatar = $coordinator->avatar ? asset($coordinator->avatar) : asset('images/avatar.png');
                                @endphp
                                <img src="{{ $coordAvatar }}" alt="{{ $coordinator->name }}" class="absolute inset-0 w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent lg:bg-gradient-to-r"></div>
                                <div class="absolute bottom-4 left-4 text-white lg:hidden">
                                    <span class="bg-brand-blue text-xs font-bold px-2 py-1 rounded uppercase tracking-wide">Coordenador(a)</span>
                                </div>
                            </div>

                            {{-- Content Side --}}
                            <div class="col-span-2 p-8 lg:p-12 flex flex-col justify-center">
                                <div class="hidden lg:block mb-4">
                                    <span class="bg-brand-blue/10 text-brand-blue dark:text-brand-green dark:bg-brand-green/10 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">
                                        Coordenador(a) do Curso
                                    </span>
                                </div>
                                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-2 font-['Poppins']">
                                    {{ $coordinator->name }} {{ $coordinator->last_name }}
                                </h2>
                                <p class="text-brand-blue dark:text-gray-300 font-medium mb-6 text-lg">
                                    {{ $coordinator->position }}
                                </p>
                                <div class="prose prose-sm dark:prose-invert text-gray-600 dark:text-gray-400 max-w-none">
                                    <p>{!! nl2br(e($coordinator->bio)) !!}</p>
                                </div>
                                
                                <div class="mt-8 flex gap-4">
                                    @if($coordinator->email)
                                        <a href="mailto:{{ $coordinator->email }}" class="inline-flex items-center text-sm font-medium text-brand-blue dark:text-brand-green hover:underline">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                            Entrar em contato
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            {{-- Other Educators Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($educators as $educator)
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100 dark:border-gray-700 group overflow-hidden flex flex-col">
                        <div class="relative h-48 overflow-hidden bg-gray-100 dark:bg-gray-700">
                             @php
                                $avatar = $educator->avatar ? asset($educator->avatar) : asset('images/avatar.png');
                            @endphp
                            <img src="{{ $avatar }}" alt="{{ $educator->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-60"></div>
                            <div class="absolute bottom-4 left-4 right-4">
                                <h3 class="text-xl font-bold text-white truncate shadow-black drop-shadow-md">
                                    {{ $educator->name }} {{ $educator->last_name }}
                                </h3>
                                <p class="text-gray-200 text-sm truncate">
                                    {{ $educator->position ?? 'Professor(a)' }}
                                </p>
                            </div>
                        </div>
                        
                        <div class="p-6 flex-1 flex flex-col">
                            <div class="text-gray-600 dark:text-gray-400 text-sm mb-4 line-clamp-4 flex-1">
                                {!! nl2br(e($educator->bio)) !!}
                            </div>
                            
                            <div class="pt-4 border-t border-gray-100 dark:border-gray-700 mt-auto">
                                <a href="mailto:{{ $educator->email }}" class="text-sm text-gray-500 dark:text-gray-400 hover:text-brand-blue dark:hover:text-brand-green flex items-center transition-colors">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                    {{ $educator->email }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if($educators->isEmpty() && !$coordinator)
                 <div class="text-center py-20">
                    <p class="text-gray-500 dark:text-gray-400 text-lg">Nenhum educador encontrado no momento.</p>
                </div>
            @endif

            <div class="mt-12">
                {{ $educators->links() }}
            </div>
        </div>
    </div>
</x-app-layout>