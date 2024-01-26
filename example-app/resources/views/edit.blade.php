<x-app-layout>
    <x-alert />

    <section class=" flex flex-col justify-center items-center">
        <div class=" w-2/3">
            <form class=" flex flex-col justify-center items-center gap-2"
                action=" /dashboard/update/{{ $contato->id }}" method="POST" enctype="multipart/form-data">
                <h1 class="text-center font-bold">Editando: {{ $contato->nome }}</h1>
                @csrf
                @method('PUT')
                <div class=" flex gap-1 items-center w-full">
                    <label for="nome">Nome:</label>
                    <input class=" rounded-lg w-full" type="text" id="nome" name="nome" placeholder="Nome do contato"
                        value="{{ $contato->nome }}">
                </div>
                <div class=" flex gap-1 items-center w-full">
                    <label for="numero">Numero:</label>
                    <input class=" rounded-lg w-full" type="number" id="numero" name="numero"
                        placeholder="Digite o numero" value="{{ $contato->numero }}">
                </div>
                <div class=" flex gap-1  justify-center  items-center w-full">
                    <label for=" whatsapp">Tem whatsapp?</label>
                    <select class=" rounded-lg appearance-none w-16 p-1" name="whatsapp" id="whatsapp">
                        <option value="0">Não</option>
                        <option value="1" {{ $contato->whatsapp == 1 ? "selected='selected'" : "" }}>Sim</option>
                    </select>
                </div>
                <button
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded w-full text-center"
                    type="
                    submit"> Salvar edição
                </button>
            </form>
        </div>
    </section>
</x-app-layout>