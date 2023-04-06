//INÍCIO 1

// Mostrar/esconder questão de acordo com o tipo selecionado

tipo.onchange = function(){

    var bt = document.getElementById("salvar");
    var txt = document.getElementById("enunciado");
    var bts1 = document.getElementById("botoes_fechada_1");
    var bts2 = document.getElementById("botoes_fechada_2");
    bt.style.display = 'block';
    txt.style.display = 'block';

    var select = document.getElementById("tipo");
    var aberta = document.getElementById("questao-aberta");
    var fechada1 = document.getElementById("questao-fechada-1");
    var fechada2 = document.getElementById("questao-fechada-2");
    var vf = document.getElementById("questao-vf");

    var valor = select.options[select.selectedIndex].value;
    if (valor == 1) {

        fechada1.style.display = 'none';
        fechada2.style.display = 'none';
        vf.style.display = 'none'
        aberta.style.display = 'block';
        bts1.style.display = 'none';
        bts2.style.display = 'none';

    } else if (valor == 2) {

        fechada1.style.display = 'block';
        fechada2.style.display = 'none';
        vf.style.display = 'none'
        aberta.style.display = 'none';
        bts1.style.display = 'block';
        bts2.style.display = 'none';

    } else if ( valor == 3) {

        fechada1.style.display = 'none';
        fechada2.style.display = 'block';
        vf.style.display = 'none'
        aberta.style.display = 'none';
        bts1.style.display = 'none';
        bts2.style.display = 'block';

    } else {

        fechada1.style.display = 'none';
        fechada2.style.display = 'none';
        vf.style.display = 'block'
        aberta.style.display = 'none';
        bts1.style.display = 'none';
        bts2.style.display = 'none';
    }
}

// FIM 1

// INÍCIO 2

// Adicionar e remover alternativas para questões de múltipla escolha

function adicionarAlternativa(id, tipo, nome1, nome2) {

    var tabela = document.getElementById(id);

    var coluna = document.createElement('tr');
    var linha1 = document.createElement('td');
    var linha2 = document.createElement('td');

    tabela.appendChild(coluna);
    coluna.appendChild(linha1);
    coluna.appendChild(linha2);

    qtd = tabela.getElementsByTagName('tr').length;

    var alternativa = document.createElement('input');
    alternativa.setAttribute('type', tipo);
    alternativa.setAttribute('name', nome1);
    alternativa.setAttribute('value', qtd.toString());

    var resposta = document.createElement('input');
    resposta.setAttribute('type', 'text');
    resposta.setAttribute('placeholder', 'Resposta...');
    resposta.setAttribute('name', nome2);


    linha1.appendChild(alternativa);
    linha2.appendChild(resposta);
}

function removerAlternativa(id) {

    var tabela = document.getElementById(id);

    var inputs = tabela.getElementsByTagName('tr');
    if(inputs.length > 1) {
        tabela.removeChild(inputs[(inputs.length) - 1]);
    }
}

// FIM 2