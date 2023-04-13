<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Menu Inicial') }}
        </h2>
    </x-slot>
    
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="border border-gray-200 px-4 py-2">
    
                            {{-- <x-label for="text" :value="__('Criar Questão')" /> --}}
                            <x-button type="button" class="mt" data-toggle="modal" data-target="#create-question">
                                Criar Questão
                            </x-button>
    
                            <x-button type="button" class="mt" data-toggle="modal" data-target="#register-user">
                                Cadastrar Usuário
                            </x-button>
                            
                            {{-- <x-button type="button" class="mt" data-toggle="modal" data-target="#multipla-escolha-Modal">
                                Questão Multipla Escolha
                            </x-button>
    
                            <x-button type="button" class="mt" data-toggle="modal" data-target="#uma-correta-Modal">
                                Questão com Apenas 1 Correta
                            </x-button> --}}
                            
                            <!-- Modal Aberta -->
                            <div class="modal fade" id="create-question" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Nova questão</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ url('/enviar') }}">
    
                                            @csrf
                            
                                            <div id="dados_questao">
                                                <table>
                                                    <tr>
                                                        <td class="title">
                                                            <label>Disciplina:</label>
                                                        </td>
                                                        <td class="input">
                                                            <select id="subject" name="subject">
                                                                <option class="escolha" disabled selected value> -- Escolha uma opção --</option>
                                                                <option value="PWEB">Programação Web</option>
                                                                <option value="PROO">Programação Orientada a Objetos</option>
                                                                <option value="APSI">Análise e Projeto de Sistemas de Informação</option>
                                                                <option value="FNRE">Fundamentos de Redes de Computadores</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="title">
                                                            <label>Dificuldade:</label>
                                                        </td>
                                                        <td class="input">
                                                            <select id="nivel" name="nivel">
                                                                <option class="escolha" disabled selected value> -- Escolha uma opção --</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="title">
                                                            <label>Tipo de questão:</label>
                                                        </td>
                                                        <td class="input">
                                                            <select id="type" name="type">
                                                                <option class="escolha" disabled selected value style> -- Escolha uma opção --</option>
                                                                <option value="1">Aberta</option>
                                                                <option value="2">Múltipla escolha (1 correta)</option>
                                                                <option value="3">Múltipla escolha (mais de 1 correta)</option>
                                                                <option value="4">V/F</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="title">
                                                            <label>Título:</label>
                                                        </td>
                                                        <td>
                                                            <input type="text" id="title" name="title" placeholder="Texto...">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="title">
                                                            <label>Enunciado:</label>
                                                        </td>
                                                        <td>
                                                            <input type="text" id="text" name="text" placeholder="Texto...">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        
                                        
                                            <div id="questao-aberta" style="display:none;"> </div>
                                        
                                            <div id="questao-fechada-1" style="display:none;">
                                                <table id="tabela_fechada_1">
                                                    <tr>
                                                        <td>
                                                            <input type="radio" name="alternativa" value="1">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="respostafechada[]" placeholder="Texto...">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        
                                            <div id="botoes_fechada_1" style="display:none;">
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <a class="button" href="#" id="adicionar_fechada_1" onclick="adicionarAlternativa('tabela_fechada_1','radio','alternativa','respostafechada[]')">Add</a>
                                                        </td>
                                                        <td>
                                                            <a class="button" href="#" id="remover_fechada_1" onclick="removerAlternativa('tabela_fechada_1')">Remove</a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        
                                            <div id="questao-fechada-2" style="display:none;">
                                                <table id="tabela_fechada_2">
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name = "check[]" value ="1">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="respostafechada2[]" placeholder="Texto...">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        
                                            <div id="botoes_fechada_2" style="display:none;">
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <a class="button" href="#" id="adicionar_fechada_2" onclick="adicionarAlternativa('tabela_fechada_2','checkbox','check[]','respostafechada2[]')">Add</a>
                                                        </td>
                                                        <td>
                                                            <a class="button" href="#" id="remover_fechada_2" onclick="removerAlternativa('tabela_fechada_2')">Remove</a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        
                                            <div id="questao_vf" style="display:none;">
                                                <table id="tabela_vf">
                                                    <tr>
                                                        <th></th>
                                                        <th>V</th>
                                                        <th>F</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="respostavf[]" placeholder="Texto..."></td>
                                                        <td><input type="radio" name="vf[1]" value="1"></td>
                                                        <td><input type="radio" name="vf[1]" value="0"></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        
                                            <div id="botoes_vf" style="display:none;">
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <a class="button" href="#" id="adicionar_vf" onclick="adicionarAlternativaVf()">Add</a>
                                                        </td>
                                                        <td>
                                                            <a class="button" href="#" id="remover_vf" onclick="removerAlternativa('tabela_vf')">Remove</a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        
                                            <div id="salvar" style="display:none;"><p><button type="submit">Save</button></p></div>
                                            <div class="modal-footer">
                                                <x-button type="button" class="mt" data-dismiss="modal">Fechar</x-button>
                                                <x-button type="submit" class="mt">Criar Questão</x-button>
                                            </div>
                                        
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <!-- Modal Aberta -->
    
                            {{-- <!-- Modal V/F -->
                            <div class="modal fade" id="v-f-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Questão de V/F</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <form action="{{ route('add_multipla') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Tag</label>
                                                <input name="tag" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="..." required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Enunciado</label>
                                                <input name="enunciado" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="..." required>
                                            </div>
                                            <div class="form-check">
                                                <input name="answer[0][correto]" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="true" checked>
                                                <label class="form-check-label" for="exampleRadios1">
                                                    <input name="answer[0][descricao]" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="..." required>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input name="answer[1][correto]" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="true">
                                                <label class="form-check-label" for="exampleRadios2">
                                                    <input name="answer[1][descricao]" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="..." required>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input name="answer[2][correto]" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="true">
                                                <label class="form-check-label" for="exampleRadios2">
                                                    <input name="answer[2][descricao]" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="..." required>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input name="answer[3][correto]" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="true">
                                                <label class="form-check-label" for="exampleRadios2">
                                                    <input name="answer[3][descricao]" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="..." required>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input name="answer[4][correto]" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios" value="true">
                                                <label class="form-check-label" for="exampleRadios2">
                                                    <input name="answer[4][descricao]" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="..." required>
                                                </label>
                                            </div>
    
                                            <div class="modal-footer">
                                                <x-button type="button" class="mt" data-dismiss="modal">Fechar</x-button>
                                                <x-button type="submit" class="mt">Criar Questão</x-button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                </div>
                            </div>
                            <!-- Modal V/F -->
    
                            <!-- Modal Multipla Escolha -->
                            <div class="modal fade" id="multipla-escolha-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Questão de Multipla Escolha</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <form action="{{ route('add_multipla') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Tag</label>
                                                <input name="tag" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="..." required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Enunciado</label>
                                                <input name="enunciado" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="..." required>
                                            </div>
                                            <div class="form-check">
                                                <input name="answer[0][correto]" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="true" checked>
                                                <label class="form-check-label" for="exampleRadios1">
                                                    <input name="answer[0][descricao]" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="..." required>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input name="answer[1][correto]" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="true">
                                                <label class="form-check-label" for="exampleRadios2">
                                                    <input name="answer[1][descricao]" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="..." required>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input name="answer[2][correto]" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="true">
                                                <label class="form-check-label" for="exampleRadios2">
                                                    <input name="answer[2][descricao]" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="..." required>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input name="answer[3][correto]" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="true">
                                                <label class="form-check-label" for="exampleRadios2">
                                                    <input name="answer[3][descricao]" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="..." required>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input name="answer[4][correto]" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios" value="true">
                                                <label class="form-check-label" for="exampleRadios2">
                                                    <input name="answer[4][descricao]" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="..." required>
                                                </label>
                                            </div>
    
                                            <div class="modal-footer">
                                                <x-button type="button" class="mt" data-dismiss="modal">Fechar</x-button>
                                                <x-button type="submit" class="mt">Criar Questão</x-button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                </div>
                            </div>
                             <!-- Modal Multipla Escolha -->
    
                            <!-- Modal com Apenas 1 Correta -->
                            <div class="modal fade" id="uma-correta-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Questão com apenas 1 correta</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <form action="{{ route('add_questions') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Tag</label>
                                                <input name="tag" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="..." required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Enunciado</label>
                                                <input name="enunciado" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="..." required>
                                            </div>
                                            <div class="form-check">
                                                <input name="answer[0][correto]" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="true" checked>
                                                <label class="form-check-label" for="exampleRadios1">
                                                    <input name="answer[0][descricao]" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="..." required>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input name="answer[1][correto]" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="true">
                                                <label class="form-check-label" for="exampleRadios2">
                                                    <input name="answer[1][descricao]" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="..." required>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input name="answer[2][correto]" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="true">
                                                <label class="form-check-label" for="exampleRadios2">
                                                    <input name="answer[2][descricao]" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="..." required>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input name="answer[3][correto]" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="true">
                                                <label class="form-check-label" for="exampleRadios2">
                                                    <input name="answer[3][descricao]" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="..." required>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input name="answer[4][correto]" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios" value="true">
                                                <label class="form-check-label" for="exampleRadios2">
                                                    <input name="answer[4][descricao]" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="..." required>
                                                </label>
                                            </div>
    
                                            <div class="modal-footer">
                                                <x-button type="button" class="mt" data-dismiss="modal">Fechar</x-button>
                                                <x-button type="button" class="mt">Criar Questão</x-button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                </div>
                            </div>
                            <!-- Modal com Apenas 1 Correta --> --}}
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
</x-app-layout>
