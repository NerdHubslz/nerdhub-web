<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Error' }} - NerdHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            blue: '#00538A',
                            green: '#1AFEAB',
                        }
                    },
                    fontFamily: {
                        sans: ['Figtree', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Figtree', sans-serif; }
    </style>
</head>
<body class="bg-[#002b4d] text-white min-h-screen flex items-center justify-center p-4">
    <div class="max-w-4xl w-full flex flex-col md:flex-row items-center justify-center gap-12 text-center md:text-left">
        
        <!-- Illustration -->
        <div class="flex-1 flex justify-center">
            @if(isset($image))
                {{ $image }}
            @else
                <div class="text-9xl opacity-50">⚠️</div>
            @endif
        </div>

        <!-- Content -->
        <div class="flex-1 space-y-6">
            <h1 class="text-9xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-brand-green to-white drop-shadow-md">
                {{ $code ?? '' }}
            </h1>
            <h2 class="text-3xl md:text-4xl font-bold text-white">
                {{ $message ?? 'Something went wrong' }}
            </h2>
            <p class="text-blue-100 text-lg">
                {{ $description ?? '' }}
            </p>
            
            <div class="pt-4">
                <a href="{{ url('/') }}" class="inline-flex items-center justify-center px-8 py-3 text-base font-bold text-brand-blue bg-brand-green border border-transparent rounded-full shadow-lg hover:bg-white hover:text-brand-blue transition duration-150 ease-in-out transform hover:scale-105">
                    Voltar para o Hub
                </a>
            </div>
        </div>

    </div>
</body>
</html>
