<x-app-layout>

    <x-alert />

    <section class=" flex flex-col justify-center items-center">
        <div class=" w-2/3">
            <form class=" flex flex-col justify-center items-center gap-2" action="/dashboard" method="POST">
                <h1 class="text-center font-bold">Cadastre um novo contato</h1>
                @csrf
                <div class=" flex gap-1 items-center w-full">
                    <label for="nome">Nome:</label>
                    <input class=" rounded-lg w-full" type="text" id="nome" name="nome" placeholder=" Digite o nome ">
                </div>
                <div class=" flex gap-1 items-center w-full">
                    <label for="numero">Numero:</label>
                    <input class=" rounded-lg w-full" type="Number" id="numero" name="numero"
                        placeholder="Digite o numero">
                </div>
                <div class=" flex gap-1  justify-center  items-center w-full">
                    <label for="whatsapp">Tem whatsapp?</label>
                    <select class=" rounded-lg appearance-none w-16 p-1" name="whatsapp" id="whatsapp">
                        <option value="0"> Não</option>
                        <option value="1"> Sim</option>
                    </select>
                </div>
                <input class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded w-full text-center"
                    type="submit" value="Salvar">
            </form>
            <br />
            <h2>Pesquise por um contato especifico</h2>
            <form class="flex gap-1" action="/dashboard" method="GET">
                <input class=" rounded-lg w-4/5" type="text" id="search" name="search" placeholder="Procurar...">
                <input class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded w-1/5" type="submit"
                    value="Procurar">
            </form>
            @if($search)
            <br />
            <h2 class="text-center">Buscando por: {{ $search }}</h2>
            <br />
            @else
            <br />
            <h2 class="text-center">Todos seus contatos:</h2>
            <br />
            @endif

            <div class="flex flex-col gap-3">
                @foreach($contatos as $contato)
                <div class="flex flex-col gap-1">
                    <h5 class="card-title">Nome: {{ $contato->nome }}</h5>
                    <h5 class="card-title">Numero: {{ $contato->numero }}</h5>
                    <h5 class="card-title">Tem whatsapp: {{ $contato->whatsapp == 1 ? 'Sim' : 'Não' }}</h5>
                    <form id="formExcluir{{ $contato->id }}" class="flex gap-1" action="/dashboard/{{ $contato->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full text-center"
                            href="/dashboard/edit/{{ $contato->id }}">Editar</a>
                        <button
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded w-full text-center"
                            type="submit" onclick="confirmarExclusao(event, {{ $contato->id }})">
                            Deletar
                        </button>
                    </form>
                </div>
                @endforeach
            </div>
            @if(count($contatos) == 0)
            @if(count($contatos) == 0 && $search)
            <div class="flex flex-col gap-2">
                <p>Não foi possível encontrar nenhum contato com {{ $search }}!
                </p>
                <a class="bg-gray-300 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded text-center "
                    href=" /dashboard">Ver
                    todos</a>
            </div>
            @elseif(count($contatos) == 0)
            <p>Não há nenhum contato</p>
            @endif
            @endif
        </div>
    </section>
</x-app-layout>