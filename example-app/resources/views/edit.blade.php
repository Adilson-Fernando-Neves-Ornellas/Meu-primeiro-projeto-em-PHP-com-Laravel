<x-app-layout>
    <h1>Editando: {{ $contato->nome }}</h1>
    <form action="/dashboard/update/{{ $contato->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" placeholder="Nome do contato" value="{{ $contato->nome }}">
        </div>
        <div>
            <label for="numero">Numero:</label>
            <input type="text" id="numero" name="numero" placeholder="Digite o numero" value="{{ $contato->numero }}">
        </div>
        <div>
            <label for=" whatsapp">Tem whatsapp?</label>
            <select name="whatsapp" id="whatsapp">
                <option value="0">Não</option>
                <option value="1" {{ $contato->whatsapp == 1 ? "selected='selected'" : "" }}>Sim</option>
            </select>
        </div>
        <input type="submit" value="Salvar edição">
    </form>
</x-app-layout>