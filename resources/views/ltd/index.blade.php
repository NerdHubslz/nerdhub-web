<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Header / Intro Section -->
            <section class="bg-brand-blue rounded-xl shadow-lg p-6 sm:p-10 mb-12 flex flex-col md:flex-row items-center gap-8 text-white">
                <div class="w-full md:w-1/3 flex justify-center">
                     <img class="w-48 h-48 object-contain bg-white rounded-full p-2" src="{{ asset('images/logos/ltd_logo.png') }}" alt="Logo LTD">
                </div>
                <div class="w-full md:w-2/3 text-center md:text-left">
                    <h1 class="text-3xl sm:text-4xl font-bold mb-4 underline decoration-brand-green underline-offset-8">
                        Laboratório de Transformação Digital (LTD)
                    </h1>
                    <p class="text-base sm:text-lg leading-relaxed text-gray-100">
                        O Laboratório de Transformação Digital (LTD) da Estácio é uma initiative voltada para a inovação e a digitalização de processos institucionais. Seu principal objetivo é explorar e implementar soluções tecnológicas que otimizem processos e aprimorem a experiência de alunos e professores. O LTD integra os Núcleos Extensionistas da Estácio, proporcionando aos estudantes oportunidades práticas de aplicar conhecimentos para resolver desafios reais e contribuir para o desenvolvimento da sociedade.
                    </p>
                </div>
            </section>

            <!-- Coordenação Section -->
            <section class="mb-16">
                 <h2 class="text-3xl font-bold text-center mb-10 text-gray-800 dark:text-white underline decoration-brand-blue underline-offset-8">Coordenação</h2>
                 <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden max-w-4xl mx-auto flex flex-col md:flex-row transform transition duration-300 hover:shadow-2xl">
                    <div class="md:w-2/5 relative">
                        <img src="{{ asset('images/educadores/arlisonwady.jpg') }}" class="w-full h-full object-cover absolute inset-0" alt="Arlison Wady" style="min-height: 300px;" />
                    </div>
                    <div class="p-8 md:w-3/5 flex flex-col justify-center">
                        <h3 class="text-2xl font-bold text-brand-blue dark:text-brand-green">Arlison Wady</h3>
                        <p class="text-lg font-semibold text-gray-600 dark:text-gray-300 mb-4">Professor & Coordenador do LTD</p>
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                             Diretor do Laboratório de Tecnologia e Desenvolvimento (LTD) do Centro Universitário Estácio São Luís, onde lidera projetos comunitários e initiatives acadêmicas voltadas para a inovação e o impacto social. Sua atuação destaca-se pelo desenvolvimento de soluções tecnológicas que conectam o conhecimento universitário às necessidades da comunidade.
                        </p>
                    </div>
                 </div>
            </section>

            <!-- Projetos Section -->
            <section>
                <div class="flex flex-col md:flex-row justify-between items-center mb-12 gap-4">
                    <h2 class="text-3xl font-bold text-gray-800 dark:text-white underline decoration-brand-blue underline-offset-8">Projetos Desenvolvidos</h2>
                    
                    <div class="flex items-center gap-2">
                        <span class="text-sm text-gray-500 dark:text-gray-400">Filtrar por:</span>
                        <select class="rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 text-sm focus:ring-brand-blue focus:border-brand-blue">
                            <option value="all">Todos os projetos</option>
                            <option value="in-progress">Em andamento</option>
                            <option value="completed">Concluídos</option>
                        </select>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($projects as $project)
                        <x-project-card :project="$project" />
                    @endforeach
                </div>

                @if($projects->isEmpty())
                    <div class="text-center py-20 bg-gray-50 dark:bg-gray-800/50 rounded-xl border-2 border-dashed border-gray-200 dark:border-gray-700">
                        <p class="text-gray-500 dark:text-gray-400">Nenhum projeto encontrado.</p>
                    </div>
                @endif
            </section>
        </div>
    </div>
</x-app-layout>