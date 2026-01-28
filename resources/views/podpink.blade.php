<x-app-layout>
    {{-- Header Principal com Identidade Visual do Projeto --}}
    <div class="bg-[#DB2777] py-16 text-white shadow-inner">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <img src="{{ asset('images/logos/podpink.png') }}" alt="PodPink" class="mx-auto w-48 mb-6 drop-shadow-2xl transform hover:rotate-3 transition duration-500">
            <h1 class="text-5xl font-black mb-4 tracking-tight">PodPink</h1>
            <p class="text-xl max-w-2xl mx-auto font-[Poppins] leading-relaxed">
                O <strong>PodPink</strong> é um portal de voz dedicado a valorizar e ampliar a visibilidade feminina no mercado de tecnologia.
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 py-16">
        {{-- Título de Seção seguindo o padrão da Home --}}
        <h2 class="text-[2.5rem] text-pink-600 dark:text-pink-400 font-extralight underline text-center mb-12">
            Apresentadoras
        </h2>

        {{-- Grid de Apresentadoras com animações do card-news --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-20">
            {{-- Card Jhenefer Amorim --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition duration-300 border-b-8 border-pink-500 flex flex-col">
                <div class="p-8 flex flex-col items-center text-center flex-grow">
                    <div class="relative mb-6">
                        <img src="{{ asset('images/podpink/jhenefer-2.jpg') }}" alt="Jhenefer Amorim" class="w-44 h-44 rounded-full object-cover border-4 border-pink-100 shadow-md">
                        <div class="absolute -bottom-2 -right-2 bg-pink-500 text-white text-xs font-bold px-3 py-1 rounded-full uppercase">Host</div>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">Jhenefer Amorim</h3>
                    <p class="text-gray-700 dark:text-gray-200 text-base font-[Poppins] mb-6">
                        Estudante de Ciência da Computação pela Estácio, entusiasta da tecnologia e defensora da presença feminina no setor de TI.
                    </p>
                    <div class="flex gap-4 mt-auto">
                        <a href="https://www.linkedin.com/in/jhenefer-silva-amorim-7212171a8/" target="_blank" class="text-blue-600 hover:text-blue-800 font-bold transition duration-300">LinkedIn</a>
                        <a href="https://www.instagram.com/jhenefersilvaamorim/" target="_blank" class="text-pink-500 hover:text-pink-700 font-bold transition duration-300">Instagram</a>
                    </div>
                </div>
            </div>

            {{-- Card Alynne Porto --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition duration-300 border-b-8 border-pink-500 flex flex-col">
                <div class="p-8 flex flex-col items-center text-center flex-grow">
                    <div class="relative mb-6">
                        <img src="{{ asset('images/podpink/alynne.jpg') }}" alt="Alynne Porto" class="w-44 h-44 rounded-full object-cover border-4 border-pink-100 shadow-md">
                        <div class="absolute -bottom-2 -right-2 bg-pink-500 text-white text-xs font-bold px-3 py-1 rounded-full uppercase">Co-host</div>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">Alynne Porto</h3>
                    <p class="text-gray-700 dark:text-gray-200 text-base font-[Poppins] mb-6">
                        Une os estudos na Estácio com a missão de inspirar e aumentar a participação de mulheres no ecossistema tech.
                    </p>
                    <div class="flex gap-4 mt-auto">
                        <a href="https://www.linkedin.com/in/alynne-porto-58b53723b" target="_blank" class="text-blue-600 hover:text-blue-800 font-bold transition duration-300">LinkedIn</a>
                        <a href="https://www.instagram.com/alynneporto11/" target="_blank" class="text-pink-500 hover:text-pink-700 font-bold transition duration-300">Instagram</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Chamada para Ação (YouTube) com Estilo de Card --}}
        <h2 class="text-[2.5rem] text-pink-600 dark:text-pink-400 font-extralight underline text-center mb-12">
            Últimos Episódios
        </h2>
        
        <div class="bg-pink-50 dark:bg-gray-800 rounded-lg shadow-lg p-10 border border-pink-200 dark:border-pink-900 flex flex-col md:flex-row items-center gap-10">
            <div class="w-32 h-32 flex-shrink-0 transform hover:rotate-12 transition">
                <img src="{{ asset('images/logos/youtube-podpink-logo.png') }}" alt="YouTube" class="w-full h-full object-contain">
            </div>
            <div class="flex-1 text-center md:text-left">
                <h4 class="text-3xl font-bold text-gray-800 dark:text-white mb-4">Inscreva-se no nosso Canal!</h4>
                <p class="text-lg text-gray-600 dark:text-gray-300 mb-6 font-[Poppins]">
                    Não perca nenhum debate, entrevista ou bastidor. Acompanhe a nossa jornada completa diretamente no YouTube.
                </p>
                <a href="https://youtube.com/@PodPink" target="_blank" class="inline-block bg-[#DB2777] text-white px-10 py-4 rounded-lg font-bold hover:bg-pink-700 transform hover:-translate-y-1 transition shadow-xl uppercase tracking-wider">
                    Ir para o YouTube &rarr;
                </a>
            </div>
        </div>
    </div>
</x-app-layout>