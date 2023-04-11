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
                                    <form action="{{ route('add_questions') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                          <label for="exampleInputEmail1">Tag</label>
                                          <input name="tag" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="..." required>
                                        </div>
                                    <form>
                                        <div class="form-group">
                                          <label for="exampleInputEmail1">Enunciado</label>
                                          <input name="enunciado" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="..." required>
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleInputPassword1">Resposta</label>
                                          <input name="answer" type="text" class="form-control" id="exampleInputPassword1" placeholder="..." required>
                                        </div>
                                        <div class="modal-footer">
                                            <x-button type="button" class="mt" data-dismiss="modal">Fechar</x-button>
                                            <x-button type="submit" class="mt">Criar Questão</x-button>
                                        </div>
                                      </form>
                                </div>
                            </div>
                            </div>
                        </div>

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
                                <form action="{{ route('add_questions') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tag</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="..." required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Enunciado</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="..." required>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                            A
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option2">
                                            <label class="form-check-label" for="exampleRadios2">
                                            B
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option2">
                                            <label class="form-check-label" for="exampleRadios2">
                                            C
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option2">
                                            <label class="form-check-label" for="exampleRadios2">
                                            D
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios" value="option2">
                                            <label class="form-check-label" for="exampleRadios2">
                                            E
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
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                            A
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                            B
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                            C
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                            D
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                            E
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
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                            A
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option2">
                                            <label class="form-check-label" for="exampleRadios2">
                                            B
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option2">
                                            <label class="form-check-label" for="exampleRadios2">
                                            C
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option2">
                                            <label class="form-check-label" for="exampleRadios2">
                                            D
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios" value="option2">
                                            <label class="form-check-label" for="exampleRadios2">
                                            E
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
                        <!-- Modal com Apenas 1 Correta -->
                        
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
