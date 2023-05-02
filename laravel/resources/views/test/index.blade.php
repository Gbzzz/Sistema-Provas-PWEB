<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adicionar questões a prova') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if(session()->has('success-message'))
                    <div class="alert alert-success mx-4 my-2">
                        {{session()->get('success-message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="border border-gray-200 px-4 py-2">

                            <div class="d-flex justify-content-center">
                                <form>
                                    @csrf
                                    <div class="container-fluid">
                                      <div class="row justify-content-start">
                                        <div class="col-12">
                                          <div class="form-group">
                                            <label for="exampleInputEmail1">Tag</label>
                                            <input name="tag" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="..." required>
                                          </div>
                                        </div>
                                        <div class="col-12">
                                          <div class="form-group">
                                            <label for="exampleInputEmail1">Enunciado</label>
                                            <input name="enunciado" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="..." required>
                                          </div>
                                        </div>
                                        <div class="col-12">
                                          <div class="form-group">
                                            <label for="exampleInputPassword1">Resposta</label>
                                            <input name="answer" type="text" class="form-control" id="exampleInputPassword1" placeholder="..." required>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <!-- Input para identificar o tipo da questão -->
                                    <input type="hidden" name="tipoQuestao" value="1">

                                  </form>
                            </div>

                    <table class="table">
                            <thead>
                              <tr>
                                <th>Id</th>
                                <th>Tag</th>
                                <th>Enunciado</th>
                              </tr>
                            </thead>
                            <tbody>

                            @foreach($questions as $question)

                              <tr>
                                <td>{{$question->id}}</td>
                                <td>{{$question->tag}}</td>
                                <td>{{$question->enunciado}}</td>

                                <td>
                                    <form action="{{ route('add_test', ['id' => $question->id]) }}" method="GET">
                                        @csrf
                                        <button type="submit">
                                            Adicionar
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
