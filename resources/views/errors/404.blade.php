<x-layouts.error
    title="Página não encontrada"
    code="404"
    message="Ops! Patinho perdido."
    description="Parece que a página que você está procurando foi movida, deletada ou nunca existiu. Nossos patinhos estão confusos!">
    
    <x-slot:image>
        <img src="{{ asset('images/nerdhub-logo-confused.png') }}" alt="Confused NerdHub Logo" class="w-full max-w-sm drop-shadow-lg opacity-90 hover:opacity-100 transition duration-300">
    </x-slot:image>
</x-layouts.error>
