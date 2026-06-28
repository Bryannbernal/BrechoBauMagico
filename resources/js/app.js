function abrirCard(id) {
    document.getElementById(id).classList.add("ativo");
}

function fecharCard(id) {
    document.getElementById(id).classList.remove("ativo");
}

function verificarLojaAberta() {
    const agora = new Date();

    const dia = agora.getDay();
    const hora = agora.getHours();
    const minuto = agora.getMinutes();

    const horarioAtual = hora * 60 + minuto;

    let aberta = false;

    switch (dia) {
        case 0: // Domingo
            aberta = horarioAtual >= 9 * 60 && horarioAtual < 12 * 60;
            break;

        case 2: // Terça
        case 3: // Quarta
        case 5: // Sexta
        case 6: // Sábado
            aberta = horarioAtual >= 14 * 60 && horarioAtual < 19 * 60;
            break;

        default:
            aberta = false;
    }

    return aberta;
}

function atualizarStatus() {
    const status = document.getElementById("status-loja");

    if (verificarLojaAberta()) {
        status.innerHTML = "Agora o brechó está: 🟢 ABERTO!";
        status.style.color = "#4c9a5e";
    } else {
        status.innerHTML = "Agora o brechó está: 🌙 FECHADO";
        status.style.color = "#c27b95";
    }
}

atualizarStatus();

function menu() {
    const btn = document.getElementById("btn-menu");
    const sidebar = document.getElementById("sidebar");

    btn.addEventListener("click", () => {
        sidebar.classList.toggle("open");
    });
}

function mostrarSenha() {
    const senha = document.getElementById("senha");
    const botao = document.getElementById("btn-senha");
    console.log('MEO.')

    if (senha.type === "password") {
        senha.type = "text";
        botao.textContent = "x";
    } else {
        senha.type = "password";
        botao.textContent = "x";
    }
}