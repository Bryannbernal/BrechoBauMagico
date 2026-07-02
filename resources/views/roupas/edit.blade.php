<x-layout2 titulo="Báu Mágico | editar">

    <section class="card card-cadastro">
        <h2>Cadastrar Roupa</h2>
        <hr>
        <form action="/roupa/alterar" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <input
                type="hidden"
                name="id"
                value="{{ $roupa->id }}" />
            <label>
                Tipo da peça
                <input
                    type="text"
                    name="tipo"
                    value="{{ $roupa->tipo }}">
            </label>
            <label>
                Marca
                <input
                    type="text"
                    name="marca"
                    value="{{ $roupa->marca ?? 'Não informado' }}">
            </label>
            <label>
                Preço
                <input
                    type="number"
                    name="preco"
                    step="00.10"
                    value="{{ $roupa->preco }}">
            </label>
            <label>
                Tamanho
                <select style="margin-bottom: 0;" name="tamanho">
                    <option value="P">P</option>
                    <option value="M">M</option>
                    <option value="G">G</option>
                    <option value="GG">GG</option>
                </select>
                <span style="font-size: 1rem;color: var(--texto)"> P.S: Tamanho original: {{ $roupa->tamanho }}</span>
            </label>
            <select name="situacao">
                <option value="1">Disponível</option>
                <option value="0">Reservado</option>
            </select>
            <label>
                Foto da roupa
                <input
                    type="file"
                    name="foto"
                    accept="image/*">
            </label>
            <button class="btn-magico" type="submit">
                Salvar
            </button>
        </form>

    </section>


</x-layout2>