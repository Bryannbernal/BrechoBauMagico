<x-layout2 titulo="Báu Mágico | catalogo">
  <br><br>
  <div class="grid">
    @foreach ($catalogo as $roupa)
    <section style="text-align: center;" class="card card-roupa">
      <button class="btn-reserva">
        <a href="https://wa.me/556791994865?text={{ urlencode('Olá! Gostaria de reservar a peça: '.$roupa->tipo.' - Tamanho: '.$roupa->tamanho.' - Preço: R$ '.$roupa->preco) }}. Podemos agendar uma data para eu ir buscar?" target="_blank">RESERVAR</a>
      </button>

      <h2 class="nomeRoupa">{{ $roupa->tipo }}</h2>

      <hr>

      <img class="fotoRoupa"
        src="{{ $roupa->foto }}"
        alt="{{ $roupa->tipo }}">

      <div class="dados-roupa">
        <p class="precoRoupa">
          R$ {{ number_format($roupa->preco, 2, ',', '.') }}
        </p>

        <p class="infoRoupa">
          <strong>Tamanho:</strong>
          {{ $roupa->tamanho ?? 'Não informado' }}
        </p>

        <p class="infoRoupa">
          <strong>Marca:</strong>
          {{ $roupa->marca ?? 'Não informada' }}
        </p>
      </div>
    </section>
    @endforeach
  </div>
</x-layout2>