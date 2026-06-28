<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $titulo }}</title>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    @vite(['resources/css/app.css'])
</head>

<body>
    <script src="{{ asset('script.js') }}"></script>
    <header>
        <h1>Baú Mágico</h1>
        <p>Brechó e Afins</p>
    </header>

    <main>
        <button id="btn-menu" onclick="menu()">☰ Menu</button>
        @if(Auth::check())
        <section class="bemVindo">
            <p>
                ✦ Bem-vindo(a), <strong>{{ Auth::user()->name }}</strong>
                <a href="/sair">Sair</a>
            </p>
        </section>
        @endif

        <div id="sidebar" class="sidebar">
            <br /><br />
            <a href="/home">
                <h2>🏠︎ Início</h2>
            </a>
            <a href="/usuario/login">
                <h2>➜] Entrar</h2>
            </a>
            <!-- <a href="/usuario/cadastrar">
                <h2>➜] Criar conta</h2>
            </a> -->
            <a href="/catalogo">
                <h2>🏷 Roupas</h2>
            </a>
            <a href="/roupas">
                <h2>ⓘ Admin</h2>
            </a>
            <a href="/contato">
                <h2>☏ Contato</h2>
            </a>
        </div>

        {{ $slot }}

    </main>
    <footer>© 2026 Baú Mágico • Brechó e Afins</footer>
    <script src="{{ asset('script.js') }}"></script>
</body>

</html>