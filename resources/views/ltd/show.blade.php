<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <nav class="flex mb-8" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('home') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-brand-blue dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001.114 1.414l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <a href="{{ route('ltd') }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-brand-blue md:ml-2 dark:text-gray-400 dark:hover:text-white">LTD</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">{{ $project->name }}</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden">
                <!-- Project Header -->
                <div class="relative h-64 sm:h-80 bg-brand-blue">
                    @if($project->image)
                        <img src="{{ asset('storage/' . $project->image) }}" class="w-full h-full object-cover opacity-60" alt="{{ $project->name }}">
                    @else
                        <div class="w-full h-full flex items-center justify-center opacity-20">
                            <svg class="w-32 h-32 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.75 17L9 21h6l-.75-4M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-8 w-full">
                        <div class="flex flex-wrap items-center gap-3 mb-4">
                            @php
                                $statusColors = [
                                    'Em andamento' => 'bg-blue-500 text-white',
                                    'Concluído' => 'bg-green-500 text-white',
                                    'Planejamento' => 'bg-yellow-500 text-white',
                                ];
                                $statusBg = $statusColors[$project->status] ?? 'bg-gray-500 text-white';
                            @endphp
                            <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider {{ $statusBg }}">
                                {{ $project->status }}
                            </span>
                            <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-brand-green text-brand-blue">
                                {{ $project->client_type }}
                            </span>
                        </div>
                        <h1 class="text-3xl sm:text-5xl font-extrabold text-white mb-2">{{ $project->name }}</h1>
                    </div>
                </div>

                <div class="p-8 lg:p-12">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                        <!-- Main Content -->
                        <div class="lg:col-span-2">
                            <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6 flex items-center gap-2">
                                <svg class="w-6 h-6 text-brand-blue dark:text-brand-green" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Sobre o Projeto
                            </h2>
                            <div class="prose prose-lg dark:prose-invert max-w-none text-gray-600 dark:text-gray-300 leading-relaxed mb-10">
                                {{ $project->description }}
                            </div>

                            <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6 flex items-center gap-2">
                                <svg class="w-6 h-6 text-brand-blue dark:text-brand-green" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                                Tecnologias Utilizadas
                            </h2>
                            <div class="flex flex-wrap gap-3 mb-10">
                                @forelse($project->technologies ?? [] as $tech)
                                    <span class="px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200 rounded-xl font-medium border border-gray-200 dark:border-gray-600">
                                        {{ $tech }}
                                    </span>
                                @empty
                                    <p class="text-gray-500 dark:text-gray-400 italic">Nenhuma tecnologia listada.</p>
                                @endforelse
                            </div>

                            <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6 flex items-center gap-2">
                                <svg class="w-6 h-6 text-brand-blue dark:text-brand-green" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                Equipe e Participantes
                            </h2>
                            <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-6 border border-gray-100 dark:border-gray-700 mb-10">
                                <div class="flex items-center gap-4">
                                    <div class="flex -space-x-3 overflow-hidden">
                                        @for($i = 0; $i < min($project->member_count, 5); $i++)
                                            <img class="inline-block h-12 w-12 rounded-full ring-2 ring-white dark:ring-gray-800" src="https://ui-avatars.com/api/?name=Membro+{{ $i+1 }}&color=7F9CF5&background=EBF4FF" alt="">
                                        @endfor
                                    </div>
                                    <div>
                                        <p class="text-lg font-bold text-gray-800 dark:text-white">{{ $project->member_count }} Participantes</p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400 text-brand-blue font-bold">LTD & Extensionistas</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Gallery & Documents Section -->
                            <div x-data="{ activeTab: 'gallery' }" class="mb-10">
                                <div class="border-b border-gray-200 dark:border-gray-700 mb-6">
                                    <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                                        <button @click="activeTab = 'gallery'"
                                            :class="{ 'border-brand-blue text-brand-blue dark:border-brand-green dark:text-brand-green': activeTab === 'gallery', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300': activeTab !== 'gallery' }"
                                            class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm flex items-center gap-2">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                            Galeria de Imagens
                                        </button>
                                        <button @click="activeTab = 'documents'"
                                            :class="{ 'border-brand-blue text-brand-blue dark:border-brand-green dark:text-brand-green': activeTab === 'documents', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300': activeTab !== 'documents' }"
                                            class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm flex items-center gap-2">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                            Documentos
                                        </button>
                                    </nav>
                                </div>

                                <div x-show="activeTab === 'gallery'" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    @forelse($project->gallery ?? [] as $image)
                                        <div class="relative group rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                                            <img src="{{ $image }}" alt="Galeria do projeto" class="w-full h-48 object-cover transform group-hover:scale-105 transition-transform duration-300">
                                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300"></div>
                                        </div>
                                    @empty
                                        <p class="text-gray-500 dark:text-gray-400 italic col-span-2">Nenhuma imagem disponível na galeria.</p>
                                    @endforelse
                                </div>

                                <div x-show="activeTab === 'documents'" class="space-y-3">
                                    @forelse($project->documents ?? [] as $doc)
                                        <a href="{{ $doc['url'] }}" class="block group">
                                            <div class="flex items-center p-4 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-sm hover:shadow-md transition-shadow hover:border-brand-blue dark:hover:border-brand-green">
                                                <div class="flex-shrink-0 p-2 bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400 rounded-lg">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                                </div>
                                                <div class="ml-4 flex-1">
                                                    <h4 class="text-sm font-semibold text-gray-900 dark:text-white group-hover:text-brand-blue dark:group-hover:text-brand-green">{{ $doc['name'] }}</h4>
                                                    <p class="text-xs text-gray-500 dark:text-gray-400">{{ $doc['size'] }}</p>
                                                </div>
                                                <div class="ml-4">
                                                    <svg class="w-5 h-5 text-gray-400 group-hover:text-brand-blue dark:group-hover:text-brand-green" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                                </div>
                                            </div>
                                        </a>
                                    @empty
                                        <p class="text-gray-500 dark:text-gray-400 italic">Nenhum documento disponível.</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>

                        <!-- Sidebar -->
                        <div class="space-y-8">
                            <!-- Progress Card -->
                            <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 border border-gray-100 dark:border-gray-700 shadow-lg">
                                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-6">Progresso Atual</h3>
                                <div class="relative pt-1">
                                    <div class="flex mb-2 items-center justify-between">
                                        <div>
                                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-brand-blue bg-blue-200 dark:bg-blue-900 dark:text-blue-300">
                                                Conclusão
                                            </span>
                                        </div>
                                        <div class="text-right">
                                            <span class="text-xs font-semibold inline-block text-brand-blue dark:text-brand-green">
                                                {{ $project->progress }}%
                                            </span>
                                        </div>
                                    </div>
                                    <div class="overflow-hidden h-3 mb-4 text-xs flex rounded-full bg-gray-200 dark:bg-gray-700">
                                        <div style="width:{{ $project->progress }}%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-brand-blue dark:bg-brand-green transition-all duration-500"></div>
                                    </div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400 text-center italic">
                                        @if($project->progress == 100)
                                            Projeto finalizado com sucesso!
                                        @else
                                            Desenvolvimento em ritmo acelerado.
                                        @endif
                                    </p>
                                </div>
                            </div>

                            <!-- Info Card -->
                            <div class="bg-brand-blue dark:bg-gray-700 rounded-2xl p-8 text-white shadow-lg">
                                <h3 class="text-xl font-bold mb-6 flex items-center gap-2">
                                    <svg class="w-6 h-6 text-brand-green" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Informações
                                </h3>
                                <div class="space-y-6">
                                    <div class="flex items-start gap-4">
                                        <div class="p-2 bg-white/10 rounded-lg">
                                            <svg class="w-6 h-6 text-brand-green" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                        </div>
                                        <div>
                                            <p class="text-sm text-blue-200 uppercase font-bold tracking-widest">Cliente</p>
                                            <p class="font-medium text-lg">{{ $project->client_name }}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-4">
                                        <div class="p-2 bg-white/10 rounded-lg">
                                            <svg class="w-6 h-6 text-brand-green" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        </div>
                                        <div>
                                            <p class="text-sm text-blue-200 uppercase font-bold tracking-widest">Início</p>
                                            <p class="font-medium text-lg">{{ $project->start_date?->format('F Y') }}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-4">
                                        <div class="p-2 bg-white/10 rounded-lg">
                                            <svg class="w-6 h-6 text-brand-green" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                        </div>
                                        <div>
                                            <p class="text-sm text-blue-200 uppercase font-bold tracking-widest">Instituição</p>
                                            <p class="font-medium text-lg">Estácio São Luís</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>