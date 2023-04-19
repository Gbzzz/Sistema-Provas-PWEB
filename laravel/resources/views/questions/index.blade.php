<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Questões') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="border border-gray-200 px-4 py-2">

                        <x-label for="text" :value="__('Criar Questão')" />
                        <x-button type="button" class="mt" data-toggle="modal" data-target="#aberta-Modal">
                            Questão Aberta
                        </x-button>

                        <x-button type="button" class="mt" data-toggle="modal" data-target="#v-f-Modal">
                            Questão de V/F
                        </x-button>

                        <x-button type="button" class="mt" data-toggle="modal" data-target="#multipla-escolha-Modal">
                            Questão Multipla Escolha
                        </x-button>

                        <x-button type="button" class="mt" data-toggle="modal" data-target="#uma-correta-Modal">
                            Questão com Apenas 1 Correta
                        </x-button>

                        <!-- Modal Aberta -->
                        <div class="modal fade" id="aberta-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Questão Aberta</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('add_questionOpen') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                          <label for="exampleInputEmail1">Tag</label>
                                          <input name="tag" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="..." required>
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleInputEmail1">Enunciado</label>
                                          <input name="enunciado" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="..." required>
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleInputPassword1">Resposta</label>
                                          <input name="answer" type="text" class="form-control" id="exampleInputPassword1" placeholder="..." required>
                                        </div>

                                        <input type="hidden" name="tipoQuestao" value="1">

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

                        <!-- Modal V/F -->
                        <div class="modal fade" id="v-f-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Questão de V/F</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <form action="{{ route('add_questionMark') }}" method="POST">
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
                                            <input name="answer[0][correto]" class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="true" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                <input name="answer[0][descricao]" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="..." required>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input name="answer[1][correto]" class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="true">
                                            <label class="form-check-label" for="exampleRadios2">
                                                <input name="answer[1][descricao]" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="..." required>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input name="answer[2][correto]" class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="true">
                                            <label class="form-check-label" for="exampleRadios2">
                                                <input name="answer[2][descricao]" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="..." required>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input name="answer[3][correto]" class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="true">
                                            <label class="form-check-label" for="exampleRadios2">
                                                <input name="answer[3][descricao]" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="..." required>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input name="answer[4][correto]" class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios" value="true">
                                            <label class="form-check-label" for="exampleRadios2">
                                                <input name="answer[4][descricao]" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="..." required>
                                            </label>
                                        </div>

                                        <input type="hidden" name="tipoQuestao" value="2">

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
                                <form action="{{ route('add_questionMark') }}" method="POST">
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
                                            <input name="answer[0][correto]" class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="true" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                <input name="answer[0][descricao]" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="..." required>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input name="answer[1][correto]" class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="true">
                                            <label class="form-check-label" for="exampleRadios2">
                                                <input name="answer[1][descricao]" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="..." required>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input name="answer[2][correto]" class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="true">
                                            <label class="form-check-label" for="exampleRadios2">
                                                <input name="answer[2][descricao]" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="..." required>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input name="answer[3][correto]" class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="true">
                                            <label class="form-check-label" for="exampleRadios2">
                                                <input name="answer[3][descricao]" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="..." required>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input name="answer[4][correto]" class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios" value="true">
                                            <label class="form-check-label" for="exampleRadios2">
                                                <input name="answer[4][descricao]" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="..." required>
                                            </label>
                                        </div>

                                        <input type="hidden" name="tipoQuestao" value="3">

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
                                <form action="{{ route('add_questionMark') }}" method="POST">
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
                                            <input name="answer[0][correto]" onclick="onlyOne(this)" class="form-check-input only-one" type="radio" name="exampleRadios" id="exampleRadios1" value="true" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                <input name="answer[0][descricao]" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="..." required>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input name="answer[1][correto]" onclick="onlyOne(this)" class="form-check-input only-one" type="radio" name="exampleRadios" id="exampleRadios1" value="true">
                                            <label class="form-check-label" for="exampleRadios2">
                                                <input name="answer[1][descricao]" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="..." required>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input name="answer[2][correto]" onclick="onlyOne(this)" class="form-check-input only-one" type="radio" name="exampleRadios" id="exampleRadios1" value="true">
                                            <label class="form-check-label" for="exampleRadios2">
                                                <input name="answer[2][descricao]" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="..." required>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input name="answer[3][correto]" onclick="onlyOne(this)" class="form-check-input only-one" type="radio" name="exampleRadios" id="exampleRadios1" value="true">
                                            <label class="form-check-label" for="exampleRadios2">
                                                <input name="answer[3][descricao]" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="..." required>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input name="answer[4][correto]" onclick="onlyOne(this)" class="form-check-input only-one" type="radio" name="exampleRadios" id="exampleRadios" value="true">
                                            <label class="form-check-label" for="exampleRadios2">
                                                <input name="answer[4][descricao]" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="..." required>
                                            </label>
                                        </div>

                                        <input type="hidden" name="tipoQuestao" value="4">

                                        <div class="modal-footer">
                                            <x-button type="button" class="mt" data-dismiss="modal">Fechar</x-button>
                                            <x-button type="submit" class="mt">Criar Questão</x-button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>
                        <!-- Modal com Apenas 1 Correta -->

                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>

<script>
    const radiosOnlyOne = document.getElementsByClassName('only-one');

    const onlyOne = ($event)=>{
        for(let i = 0; radiosOnlyOne.length > i; i++){
            if(radiosOnlyOne[i].name != $event.name)
            radiosOnlyOne[i].checked = false;
        }
    };
</script>
