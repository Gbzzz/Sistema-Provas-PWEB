@extends('layouts.main')

@section('title', 'Criar Prova')

@section('content')

<body>

<form>
<h3>QUESTÃO 1</h3>

<label>Enunciado:</label> <input type="text"> <br>

<label>Tipo de questão:</label>
<select id="tipos" onchange="escolherQuestao()">
    <option disabled selected value> -- Escolha uma opção --</option>
    <option value="1">Aberta</option>
    <option value="2">Múltipla escolha (1 correta)</option>
    <option value="3">Múltipla escolha (mais de 1 correta)</option>
    <option value="4">Verdadeiro ou falso</option>
</select>

<br>
<br>

<div id="questao-aberta" style="display:none;"><input type="text"> </div>

<div id="questao-fechada-1" style="display:none">
    <input type="radio" name="opcao" value ="1"> Opcão 1<br>
    <input type="radio" name="opcao" value ="2"> Opção 2<br>
    <input type="radio" name="opcao" value ="3"> Opção 3<br>
    <input type="radio" name="opcao" value ="4"> Opção 4
</div>

<div id="questao-fechada-2" style="display:none">
    <input type="checkbox" value ="1"> Opcão 1<br>
    <input type="checkbox" value ="2"> Opção 2<br>
    <input type="checkbox" value ="3"> Opção 3<br>
    <input type="checkbox" value ="4"> Opção 4
</div>


</form>
    
<script>

function escolherQuestao() {

    var select = document.getElementById("tipos");
    var valor = select.options[select.selectedIndex].value;
    if (valor == 1) {

        var fechada1 = document.getElementById("questao-fechada-1");
        fechada1.style.display = 'none';
        var fechada2 = document.getElementById("questao-fechada-2");
        fechada2.style.display = 'none';
        var aberta = document.getElementById("questao-aberta");
        aberta.style.display = 'block';

    } else if (valor == 2) {

        var fechada1 = document.getElementById("questao-fechada-1");
        fechada1.style.display = 'block';
        var fechada2 = document.getElementById("questao-fechada-2");
        fechada2.style.display = 'none';
        var aberta = document.getElementById("questao-aberta");
        aberta.style.display = 'none';

    } else if ( valor == 3) {

        var fechada1 = document.getElementById("questao-fechada-1");
        fechada1.style.display = 'none';
        var fechada2 = document.getElementById("questao-fechada-2");
        fechada2.style.display = 'block';
        var aberta = document.getElementById("questao-aberta");
        aberta.style.display = 'none';

    } else {
        document.write("Você escolheu: questão de verdadeiro ou falso.")
    }
}

</script>
</body>

@endsection
