<x-layout2 titulo="Báu Mágico | administração">
  <section class="tabela">
    <table>
      <thead>
        <tr>
          <th>Tipo</th>
          <th>Marca</th>
          <th>Tamanho</th>
          <th>Situação</th>
          <th>Preço</th>
          <th colspan="2"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($catalogo as $roupa)
        <tr>
          <td>{{ $roupa->tipo ?? 'Não informado' }}</td>
          <td>{{ $roupa->marca ?? 'Não informado' }}</td>
          <td>{{ $roupa->tamanho ?? 'Não informado' }}</td>
          <td>
            @if($roupa->situacao === null)
            -
            @elseif($roupa->situacao)
            Disponível
            @else
            Reservado
            @endif
          </td>
          <td>{{ $roupa->preco ?? 'Não informado' }}</td>

          <td><button class="btn-editar">
              <a style="text-decoration: none; color: inherit" href="roupa/editar/{{ $roupa->id }}">Editar</a></button>
          </td>

          <td>
            <button onclick="abrirCard('info4')" class="btn-excluir">Excluir</button>
          </td>
        </tr>
        <div id="info4" class="overlay" onclick="fecharCard('info4')">
          <div class="popup-card" onclick="event.stopPropagation()">
            <h2 id="achados"> Tem certeza que deseja <strong>excluir</strong> essa peça de roupa? Essa ação é irreversivel.</h2>
            <br>
            <form action="/roupa/excluir" method="post">
              @csrf
              @method("DELETE")
              <input type="hidden" name="id" value="{{ $roupa->id }}">
              <input style="font-size: 1.5rem;" onclick="fecharCard('info4')" class="btn-excluir" type="submit" value="Sim, excluir">
            </form>
          </div>
        </div>
        @endforeach
      </tbody>
    </table>
  </section>
  <br>
  <button class="btn-magico">
    <a style="text-decoration: inherit; color: inherit" href="/roupa/novo">Cadastrar Item</a>
  </button>
</x-layout2>