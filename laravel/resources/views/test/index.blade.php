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

                <form action="{{ route('add_test') }}" method="POST">
                    @csrf
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

                                    <div class="col-sm-1">
                                        <input type="checkbox" name="id[]" value="{{ $question->id }}" />
                                        <br>
                                    </div>

                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                        <div class="form-group d-flex">
                            <div class="form-floating flex-grow-1 mx-1 w-100">
                                <label for="tag1">Início</label>
                                <input name="date_start" type="date" class="form-control" id="tag1">
                            </div>
                            <div class="form-floating flex-grow-1 w-100">
                                <label for="tag2">Fim</label>
                                <input name="date_end" type="date" class="form-control" id="tag2">
                            </div>
                            <div class="form-floating flex-grow-1 mx-1 w-100">
                                <label for="tag3">Tempo de Prova</label>
                                <input name="time_test" type="time" class="form-control" id="tag3">
                            </div>
                        </div>

                            <div class="modal-footer">
                                <x-button type="submit" class="mt">Criar prova</x-button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
