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
                        
                        <table class="table">
                            <thead>
                              <tr>
                                <th>Id</th>
                                <th>Tag</th>
                                <th>Enunciado</th>
                                <th>Resposta</th>
                              </tr>
                            </thead>
                            <tbody>
                            
                            @foreach($questions as $question)
    
                              <tr>
                                <td>{{$question->id}}</td>
                                <td>{{$question->tag}}</td>
                                <td>{{$question->enunciado}}</td>
                                <td>{{$question->answer}}</td>
                               
                                <td>
                                    <x-button type="button" class="mt" data-toggle="modal" data-target="#aberta-Modal">
                                        Editar
                                    </x-button>

                                    @if ($question->answer == null)
                                        <form action="update" method="POST">
                                            @method('PUT')
                                            @csrf
                                        </form>
                                    @else
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
                                                        <form action="/questions/update/{{ $question->id }}" method="POST">
                                                            @method('PUT')
                                                            @csrf
                                                            <div class="form-group">
                                                            <label for="exampleInputEmail1">Tag</label>
                                                            <input name="tag" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="..." required value="{{ $question->tag }}">
                                                            </div>
                                                            <div class="form-group">
                                                            <label for="exampleInputEmail1">Enunciado</label>
                                                            <input name="enunciado" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="..." required value="{{ $question->enunciado }}">
                                                            </div>
                                                            <div class="form-group">
                                                            <label for="exampleInputPassword1">Resposta</label>
                                                            <input name="answer" type="text" class="form-control" id="exampleInputPassword1" placeholder="..." required value="{{ $question->answer }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <x-button type="button" class="mt" data-dismiss="modal">Fechar</x-button>
                                                                <x-button type="submit" class="mt">Editar Questão</x-button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            <!-- Modal Aberta -->
                            
                                    @endif
                                </td>

                                <td>
                                    <form action="/questions/view/{{$question->id}}" method="GET">
                                        <button
                                            type="submit"> Visualizar
                                        </button>
                                    </form>
                                </td>
    
                                <td>
                                    <form action="/questions/delete/{{$question->id}}" method="POST">
                                        @csrf
                                        @method('delete')
                                            <button
                                                type="submit"> Deletar
                                            </button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
