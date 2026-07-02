<x-layout2 titulo="Báu Mágico | nova roupa">
    <section class="card card-cadastro">
        <h2>Cadastrar Roupa</h2>
        <hr>
        <form action="/roupa/salvar" enctype="multipart/form-data" method="POST">
            @csrf
            <label>
                Tipo da peça
                <input
                    type="text"
                    name="tipo"
                    placeholder="Ex.: Vestido">
            </label>
            <label>
                Marca
                <input
                    type="text"
                    name="marca"
                    placeholder="Ex.: Rosa Bordados">
            </label>
            <label>
                Preço
                <input
                    type="number"
                    name="preco"
                    step="00.10"
                    placeholder="00,00">
            </label>
            <label>
                Tamanho
                <select name="tamanho">
                    <option value="P">P</option>
                    <option value="M">M</option>
                    <option value="G">G</option>
                    <option value="GG">GG</option>
                </select>
            </label>
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