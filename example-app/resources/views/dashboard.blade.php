<x-app-layout>
    <div>
        <div class="row">
            @if(session('msg'))
            <p class="msg">{{ session('msg') }}</p>
            @endif
        </div>
    </div>
    <form action="/dashboard" method="POST">
        <h1>Cadastre um novo contato</h1>
        @csrf
        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" placeholder="Nome do contato">
        </div>
        <div>
            <label for="numero">Numero:</label>
            <input type="text" id="numero" name="numero" placeholder="Digite o numero">
        </div>
        <div>
            <label for="whatsapp">Tem whatsapp?</label>
            <select name="whatsapp" id="whatsapp">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
        </div>
        <input type="submit" value="Salvar">
    </form>
    <br />
    <br />
    <h2>Pesquise por um contato especifico</h2>
    <form action="/dashboard" method="GET">
        <input type="text" id="search" name="search" placeholder="Procurar...">
    </form>
    @if($search)
    <h2>Buscando por: {{ $search }}</h2>
    <br />
    @else
    <br />
    <h2>Todos seus contatos:</h2>
    <br />
    @endif

    @foreach($contatos as $contato) <div class="card col-md-3">
        <h5 class="card-title">nome: {{ $contato->nome }}</h5>
        <h5 class="card-title">numero: {{ $contato->numero }}</h5>
        <h5 class="card-title">Tem whatsapp: {{ $contato->whatsapp }}</h5>
        <a href="/dashboard/edit/{{ $contato->id }}">Editar</a>
        <form action="/dashboard/{{ $contato->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit"> Deletar </button>
        </form>
    </div>
    @endforeach

    @if(count($contatos) == 0)
    @if(count($contatos) == 0 && $search)
    <p>Não foi possível encontrar nenhum contato com {{ $search }}! <a href="/dashboard">Ver todos</a></p>
    @elseif(count($contatos) == 0)
    <p>Não há nenhum contato</p>
    @endif
    @endif

</x-app-layout>