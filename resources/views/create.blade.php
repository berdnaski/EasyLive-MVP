<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Gerenciador de Clientes</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body>

    @if(session('success'))
    <div class="w-[90%] h-auto py-4 bg-green-600 fixed top-10 left-1/2 transform -translate-x-1/2 -translate-y-1/2 rounded-lg">
        <h1 class="text-center font-bold text-white text-lg">{{session('success')}}</h1>
    </div>
    @endif

    @if(session('error'))
        <div class="w-[90%] h-auto py-4 bg-red-600 fixed top-10 left-1/2 transform -translate-x-1/2 -translate-y-1/2 rounded-lg">
            <h1 class="text-center font-bold text-white text-lg">{{session('error')}}</h1>
        </div>
    @endif


    <div class="bg-purple-900 p-4 text-center">
        <h1 class="text-2xl font-bold text-white">Gerenciador de Clientes</h1>
    </div>
    <div class="bg-red-400 p-8 h-screen flex items-center justify-center">
        <form action="/clientes" method="POST" class="flex flex-col w-full md:w-1/2 p-8 rounded-lg">
            @csrf

            <div class="mb-4 md:mb-8">
                <label class="flex text-black text-sm md:text-xl font-bold mb-2" for="nome">Nome:</label>
                <input
                    class="border rounded w-full py-2 px-3 md:py-4 text-black placeholder-black focus:outline-none focus:border-purple-500"
                    id="nome" name="nome" type="text" required placeholder="Nome do cliente">
            </div>
            <div class="mb-4">
                <label class="block text-black  text-sm md:text-xl font-bold mb-2" for="email">Email:</label>
                <input
                    class="border rounded w-full py-2 px-3 md:py-4 text-black placeholder-black focus:outline-none focus:border-purple-500"
                    id="email" name="email" type="email" required placeholder="Email do cliente">
            </div>
            <div class="flex items-center justify-between">
                <button
                    class="bg-purple-500 md:rounded-md hover:bg-purple-700 text-white font-bold py-2 px-4 md:py-3 md:px-5 rounded focus:outline-none"
                    type="submit">Adicionar Cliente</button>
            </div>
        </form>
    </div>
</body>

</html>
