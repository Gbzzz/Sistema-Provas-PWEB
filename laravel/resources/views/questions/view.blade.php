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

                              <tr>
                                <td>{{$question->id}}</td>
                                <td>{{$question->tag}}</td>
                                <td>{{$question->enunciado}}</td>
                                @if($question->answer)
                                    <td>{{$question->answer}}</td>
                                @endif

                                <td>
                                @if($question->answer == null)
                                    @php
                                        $letras = ['A', 'B', 'C', 'D', 'E'];
                                    @endphp

                                    @foreach($question->answers as $index => $answer)
                                        <div>
                                            <label>Letra {{ $letras[$index] }}</label>
                                            <input name="descricao" type="text" class="form-control" value="{{ $answer->descricao }}" id="box">
                                        </div>
                                        <br>
                                        <div>
                                            <label>Correto = 1, Errado = 0</label>
                                            <input name="correto" type="text" class="form-control" value="{{ $answer->correto }}" id="box">
                                        </div>
                                        <br>
                                    @endforeach
                                @endif
                                </td>

                                <td>
                                    <form action="/questions/list" method="GET">
                                        @csrf
                                            <button
                                                type="submit"> Voltar
                                            </button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
