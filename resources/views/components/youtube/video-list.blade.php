@props(['videos'])

<div class="mb-16">
    <h2 class="text-[2.5rem] text-pink-600 dark:text-pink-400 font-extralight border-b-4 border-pink-500 pb-2 w-fit mx-auto block mb-12">
        Últimos Vídeos do Canal
    </h2>

    @if(empty($videos))
        <div class="text-center text-gray-500 py-10 bg-gray-50 dark:bg-gray-800 rounded-lg border border-dashed border-gray-300 dark:border-gray-700">
            <p class="mb-4">Nenhum vídeo encontrado no momento.</p>
            <p>
                Visite nosso canal no <a href="https://youtube.com/@PodPink" target="_blank" class="text-pink-600 font-bold hover:underline">YouTube</a> para conferir todas as novidades.
            </p>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($videos as $video)
                <x-youtube.video-card :video="$video" />
            @endforeach
        </div>
    @endif
</div>
