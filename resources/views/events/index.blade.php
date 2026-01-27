<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Eventos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Upcoming Events -->
            <div class="mb-12">
                <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-6 pl-2 border-l-4 border-indigo-500">Próximos Eventos</h3>
                @if($upcomingEvents->isEmpty())
                    <p class="text-gray-600 dark:text-gray-400 ml-2">Nenhum evento futuro agendado no momento.</p>
                @else
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
                @endif
            </div>

            <!-- Past Events -->
            @if($pastEvents->isNotEmpty())
                <div>
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-6 pl-2 border-l-4 border-gray-500">Eventos Passados</h3>
                     <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($pastEvents as $event)
                            <a href="{{ route('events.show', $event) }}" class="block bg-white dark:bg-gray-800 rounded-xl shadow hover:shadow-lg transition-all duration-300 overflow-hidden opacity-75 hover:opacity-100 grayscale hover:grayscale-0">
                                <div class="h-40 relative">
                                    @if($event->banner_image)
                                        <img src="{{ Storage::url($event->banner_image) }}" alt="{{ $event->title }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                                            <span class="text-gray-400">Sem imagem</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="p-4">
                                    <h4 class="text-lg font-bold text-gray-800 dark:text-white mb-1">{{ $event->title }}</h4>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                        Realizado em {{ $event->start_time->format('d/m/Y') }}
                                    </p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
