<x-layout titulo="Báu Mágico | login">
    <section class="card card-login">
        <h2>FAZER LOGIN</h2>
        <hr>
        <p>Entre com seu usuário para acessar a administração.</p>
        <form action="/login" method="POST">
            @csrf
            <label for="email">
                Email
                <input
                    name="email"
                    type="email"
                    id="email"
                    placeholder="emailqualquer@gmail.com">
            </label>


            <div class="senha">
                <label for="password">
                    Senha
                    <input
                        name="password"
                        type="password"
                        id="senha"
                        placeholder="********">
                    <button onclick="mostrarSenha()" type="button" id="btn-senha">
                        ⌣
                    </button>
                </label>
            </div>
            <input class="btn-magico" type="submit" value="Entrar">
        </form>
    </section>
</x-layout>