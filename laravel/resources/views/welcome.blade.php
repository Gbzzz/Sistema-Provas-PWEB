@extends('layouts.main')

@section('title', 'Criar Prova')

@section('content')

<h1>Prova Virtual</h1>
<h2>Formulário para Criação de Prova Online</h2>

    <form action="{{ url('/validar') }}" method="POST">
        @csrf
         
        <table>
            <tr>
                <th><h3>Questões:</h3></th>
            </tr>
            <td>
                <div id="atividadesExtra">
                    <h4>Questão 1</h4>
                    <input type="checkbox" class="check" name="atividade[]" value="informatica">Aberta
                    <input type="checkbox" class="check" name="atividade[]" value="musica">Múltiplas escolhas (1 correta)
                    <input type="checkbox" class="check" name="atividade[]" value="balet">Múltiplas escolhas (+ de 1 correta)
                    <input type="checkbox" class="check" name="atividade[]" value="pintura">V ou F
                </div>
            </td>
        </table>
        <div id="botoes">
            <button type="submit" class="button-enviar">Criar Prova</button>
            <button href="{{ url('/') }}" type="reset" class="button-limpar">Limpar Campos</button>
        </div>

@endsection
