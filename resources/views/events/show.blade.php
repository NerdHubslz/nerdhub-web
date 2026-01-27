<x-app-layout>
     <div class="relative bg-gray-900 h-96">
        @if($event->banner_image)
            <img src="{{ Storage::url($event->banner_image) }}" class="absolute inset-0 w-full h-full object-cover opacity-50">
        @else
             <div class="absolute inset-0 bg-gradient-to-br from-indigo-900 to-purple-900 opacity-50"></div>
        @endif
        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex flex-col justify-end pb-12">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 leading-tight">{{ $event->title }}</h1>
            <div class="flex flex-wrap text-gray-300 gap-6 text-sm md:text-base">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    {{ $event->start_time->isoFormat('D \d\e MMMM \d\e Y, HH:mm') }}
                </div>
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    {{ $event->location }}
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-8">
                    <div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-sm prose dark:prose-invert max-w-none">
                        {!! $event->description !!}
                    </div>
                    
                    <div class="mt-8 flex justify-between items-center border-t dark:border-gray-700 pt-8">
                        <a href="{{ route('events.index') }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 font-medium flex items-center">
                            ← Voltar para Eventos
                        </a>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm sticky top-24 border border-gray-100 dark:border-gray-700">
                        @if($event->start_time->isFuture())
                            <div class="text-center mb-6">
                                <p class="text-gray-500 dark:text-gray-400 mb-1 text-sm uppercase tracking-wider font-semibold">O evento começa em</p>
                                <div class="text-2xl font-bold text-indigo-600 dark:text-indigo-400">
                                    {{ $event->start_time->diffForHumans(null, true) }}
                                </div>
                            </div>
                            @if($event->registration_link)
                                <a href="{{ $event->registration_link }}" target="_blank" class="block w-full text-center bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-4 rounded-xl transition duration-300 transform hover:scale-105 shadow-md shadow-indigo-500/30">
                                    Inscrever-se Agora 🚀
                                </a>
                            @else
                                <div class="bg-gray-100 dark:bg-gray-700 rounded-xl p-4 text-center">
                                    <p class="text-gray-500 dark:text-gray-300 font-medium">Inscrições em breve ou no local</p>
                                </div>
                            @endif
                        @else
                            <div class="text-center">
                                <span class="inline-block bg-gray-200 dark:bg-gray-700 rounded-full px-4 py-2 text-sm font-semibold text-gray-600 dark:text-gray-300">
                                    Evento Finalizado
                                </span>
                                <p class="mt-4 text-sm text-gray-500">Este evento já ocorreu em {{ $event->start_time->format('d/m/Y') }}.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
