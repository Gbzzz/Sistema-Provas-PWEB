<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Questões') }}
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
                                    <form action="{{ route('edit_question', ['id' => $question->id]) }}" method="GET">
                                        @csrf
                                        <button type="submit">
                                            Editar
                                        </button>
                                    </form>
                                </td>

                                <td>
                                    <form action="/questions/view/{{$question->id}}" method="GET">
                                        @csrf
                                        <button type="submit">
                                            Visualizar
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
