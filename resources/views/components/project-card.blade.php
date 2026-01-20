@props(['project'])

@php
    $statusColors = [
        'Em andamento' => 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300',
        'Concluído' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300',
        'Planejamento' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300',
    ];

    $clientTypeColors = [
        'Curso' => 'bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-300',
        'Empresa' => 'bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-orange-300',
        'Institucional' => 'bg-indigo-100 text-indigo-800 dark:bg-indigo-900 dark:text-indigo-300',
    ];

    $statusBg = $statusColors[$project->status] ?? 'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-300';
    $clientTypeBg = $clientTypeColors[$project->client_type] ?? 'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-300';
@endphp

<div class="bg-white dark:bg-gray-800 rounded-xl shadow-md hover:shadow-2xl transition-all duration-300 flex flex-col h-full border border-gray-100 dark:border-gray-700 hover:-translate-y-1 group p-6">
    <div class="flex items-start justify-between gap-4">
        <div class="flex-1 min-w-0">
          <div class="flex items-center gap-2 mb-2">
            <span class="text-xs font-medium px-2 py-0.5 rounded-full {{ $statusBg }}">
              {{ $project->status }}
            </span>
            <span class="text-xs font-medium px-2 py-0.5 rounded-full {{ $clientTypeBg }}">
              {{ $project->client_type }}
            </span>
          </div>
          <h3 class="text-lg font-semibold text-gray-800 dark:text-white truncate group-hover:text-brand-blue dark:group-hover:text-brand-green transition-colors">
            {{ $project->name }}
          </h3>
          <p class="mt-1 text-sm text-gray-600 dark:text-gray-400 line-clamp-2">
            {{ $project->description }}
          </p>
        </div>
        <a href="{{ route('ltd.show', $project) }}" class="shrink-0 opacity-0 group-hover:opacity-100 transition-opacity p-2 text-gray-400 hover:text-brand-blue dark:hover:text-brand-green">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
          </svg>
        </a>
      </div>

      <!-- Meta Info -->
      <div class="mt-4 flex items-center gap-4 text-sm text-gray-500 dark:text-gray-400">
        <div class="flex items-center gap-1.5">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
          </svg>
          <span>{{ $project->member_count }} membros</span>
        </div>
        <div class="flex items-center gap-1.5">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
          </svg>
          <span>{{ $project->start_date?->format('d/m/Y') }}</span>
        </div>
      </div>

      <!-- Technologies -->
      @if($project->technologies)
      <div class="mt-4 flex flex-wrap gap-1.5">
        @foreach(array_slice($project->technologies, 0, 3) as $tech)
          <span class="rounded-md bg-gray-100 dark:bg-gray-700 px-2 py-1 text-xs font-medium text-gray-600 dark:text-gray-300">
            {{ $tech }}
          </span>
        @endforeach
        @if(count($project->technologies) > 3)
          <span class="rounded-md bg-gray-100 dark:bg-gray-700 px-2 py-1 text-xs font-medium text-gray-600 dark:text-gray-300">
            +{{ count($project->technologies) - 3 }}
          </span>
        @endif
      </div>
      @endif

      <!-- Progress -->
      <div class="mt-4">
        <div class="flex items-center justify-between text-sm mb-2">
          <span class="text-gray-500 dark:text-gray-400">Progresso</span>
          <span class="font-medium text-gray-800 dark:text-white">{{ $project->progress }}%</span>
        </div>
        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
            <div class="bg-brand-blue dark:bg-brand-green h-2 rounded-full" style="width: {{ $project->progress }}%"></div>
        </div>
      </div>

      <!-- Client -->
      <div class="mt-4 pt-4 border-t border-gray-100 dark:border-gray-700">
        <p class="text-xs text-gray-500 dark:text-gray-400">Cliente</p>
        <p class="text-sm font-medium text-gray-800 dark:text-white truncate">{{ $project->client_name }}</p>
      </div>
</div>