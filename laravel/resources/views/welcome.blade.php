@extends('layouts.main')

@section('title', 'Prova')

@section('content')

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Criar Questão
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nova Questão</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <label>Tipo de questão:</label>
              <select id="tipos" onchange="escolherQuestao()">
                  <option disabled selected value> -- Escolha uma opção --</option>
                  <option value="1">Aberta</option>
                  <option value="2">Múltipla escolha (1 correta)</option>
                  <option value="3">Múltipla escolha (mais de 1 correta)</option>
                  <option value="4">Verdadeiro ou falso</option> <br>
              </select>
            <div class="form-group">
              <br>
              <label for="exampleInputPassword1">Enunciado:</label>
              <input type="text" class="form-control" id="enunciado" placeholder="Enunciado da Questão...">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Materia:</label>
              <input type="text" class="form-control" id="materia" placeholder="Matéria">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Tag:</label>
              <input type="text" class="form-control" id="tag" placeholder="Tag da Questão">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Dificuldade:</label>
              <input type="text" class="form-control" id="dificuldade" placeholder="Nível de 1">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-primary">Criar Questão</button>
        </div>
      </div>
    </div>
  </div>


<script>
  function escolherQuestao() {
    var select = document.getElementById("tipos");
    var valor = select.options[select.selectedIndex].value;
    if (valor == 1) {

        var fechada1 = document.getElementById("questao-fechada-1");
        fechada1.style.display = 'none';
        var fechada2 = document.getElementById("questao-fechada-2");
        fechada2.style.display = 'none';
        var vf = document.getElementById("questao-vf");
        vf.style.display = 'none'
        var aberta = document.getElementById("questao-aberta");
        aberta.style.display = 'block';

    } else if (valor == 2) {

        var fechada1 = document.getElementById("questao-fechada-1");
        fechada1.style.display = 'block';
        var fechada2 = document.getElementById("questao-fechada-2");
        fechada2.style.display = 'none';
        var vf = document.getElementById("questao-vf");
        vf.style.display = 'none'
        var aberta = document.getElementById("questao-aberta");
        aberta.style.display = 'none';

    } else if ( valor == 3) {
      
        var fechada1 = document.getElementById("questao-fechada-1");
        fechada1.style.display = 'none';
        var fechada2 = document.getElementById("questao-fechada-2");
        fechada2.style.display = 'block';
        var vf = document.getElementById("questao-vf");
        vf.style.display = 'none'
        var aberta = document.getElementById("questao-aberta");
        aberta.style.display = 'none';

    } else {

        var fechada1 = document.getElementById("questao-fechada-1");
        fechada1.style.display = 'none';
        var fechada2 = document.getElementById("questao-fechada-2");
        fechada2.style.display = 'none';
        var vf = document.getElementById("questao-vf");
        vf.style.display = 'block'
        var aberta = document.getElementById("questao-aberta");
        aberta.style.display = 'none';
    }
}

@endsection