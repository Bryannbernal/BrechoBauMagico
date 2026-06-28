<x-layout titulo="Báu Mágico">
  <section style="text-align: center;" class="card">
    <h2 id="achados">Achados com História</h2>
    <p style="font-size: 1.5rem; color: var(--texto);">"Cada peça possui uma história única e um encanto especial."</p>
    <br>
    <button class="btn-magico">
      <a style="font-size:1.2rem;" href="/catalogo">Ver catalogo</a>
    </button>
  </section>

  <section class="card">
    <h2 id="achados">Sobre o brechó:</h2>
    <hr />
    <button class="btn-magico" onclick="abrirCard('info1')">
      🖈 Endereço
    </button>

    <div id="info1" class="overlay" onclick="fecharCard('info1')">
      <div class="popup-card" onclick="event.stopPropagation()">
        <button class="fechar" onclick="fecharCard('info1')">✕</button>
        <iframe
          src="https://www.google.com/maps?q=Av.+José+Nogueira+Vieira,+1511,+Campo+Grande,+MS&output=embed"
          width="100%"
          height="400"
          style="border: 0; border-radius: 20px"
          loading="lazy">
        </iframe>
        <br /><br /><br />
        <a
          style="text-decoration: inherit"
          href="https://maps.app.goo.gl/9BUBQtpCSmXP1jpx5"
          target="_blank"
          class="btn-magico">
          Abrir maps
        </a>
      </div>
    </div>

    <button class="btn-magico" onclick="abrirCard('info2')">
      ◴ Horários
    </button>

    <div id="info2" class="overlay" onclick="fecharCard('info2')">
      <div class="popup-card" onclick="event.stopPropagation()">
        <button class="fechar" onclick="fecharCard('info2')">✕</button>
        <div class="status-loja">
          <span id="status-loja"></span>
        </div>
        <br /><br />
        <hr />
        <div class="calendario">
          <div class="dia" style="justify-content: start">
            <h3>📅 DIAS</h3>
            <hr />
            <p>Domingo</p>
            <p>Segunda</p>
            <p>Terça</p>
            <p>Quarta</p>
            <p>Quinta</p>
            <p>Sexta</p>
            <p>Sábado</p>
          </div>
          <div class="hora" style="justify-content: end">
            <h3>HORÁRIOS 🕓</h3>
            <hr />
            <p>09:00 - 12:00</p>
            <p>Fechado 🗙</p>
            <p>14:00 às 19:00</p>
            <p>14:00 às 19:00</p>
            <p>Fechado 🗙</p>
            <p>14:00 às 19:00</p>
            <p>14:00 às 19:00</p>
          </div>
        </div>
      </div>
    </div>

    <button class="btn-magico" onclick="abrirCard('info3')">
      $ Pagamento
    </button>

    <div id="info3" class="overlay" onclick="fecharCard('info3')">
      <div class="popup-card" onclick="event.stopPropagation()">
        <button class="fechar" onclick="fecharCard('info3')">✕</button>
        <h2>Aceitamos:</h2>
        <hr />
        <br />
        <ul style="list-style: none">
          <li>💵 Dinheiro em espécie</li>
          <li>📱 PIX</li>
          <li>💳 Débito</li>
          <li>📊 Parcelas no crédito</li>
        </ul>
        <br />
        <hr />
        <div style="text-align: center" class="centro">
          <h2>Faça já a sua reserva!</h2>
          <button class="btn-magico">
            <a href="/catalogo" style="text-decoration: inherit; color: inherit;">
              ⴵ Ver catalogo</a>
          </button>
        </div>
      </div>
    </div>
  </section>
</x-layout>