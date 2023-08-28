<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Clientes Cadastrados</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body>
    @if (session('success'))
        <div
            class="w-[90%] h-auto py-4 bg-green-600 fixed top-10 left-1/2 transform -translate-x-1/2 -translate-y-1/2 rounded-lg">
            <h1 class="text-center font-bold text-white text-lg">{{ session('success') }}</h1>
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-500 p-4 text-white">
            {{ session('error') }}
        </div>
    @endif



    <div class="bg-purple-900 p-4 text-center">
        <h1 class="text-2xl font-bold text-white">Gerenciador de Clientes</h1>
    </div>

    <div class="bg-red-400 h-screen">
        <div class="p-3 md:p-1 flex md:flex-col md:items-center gap-3">
            <div class="overflow-auto border rounded-lg w-[50rem]">
                <table class="min-w-full bg-white rounded-lg">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="py-2 px-4">Nome</th>
                            <th class="py-2 px-4">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->nome }}</td>
                                <td>{{ $cliente->email }}</td>
                                <td>
                                    <form action="/clientes/{{ $cliente->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 text-white py-1 px-3 rounded-lg hover:bg-red-800 focus:outline-none">Del</button>
                                    </form>
                                </td>

                                <td>
                                    <a href="{{ asset('pasta_clientes/' . Str::slug($cliente->nome) . '_' . $cliente->id) }}"
                                        class="bg-blue-500 text-white py-1 px-3 rounded-lg hover:bg-blue-800 focus:outline-none">
                                        Link
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
