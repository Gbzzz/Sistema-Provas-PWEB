<style>
    input[type='checkbox']{
        color: #28a745;
    }
</style>
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

                    @if($question->answer)
                    <form action="{{ route('update_questionOpen', $question->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label>Tag</label>
                            <input name="tag" type="text" class="form-control" value="{{ $question->tag }}" id="box">
                        </div>

                        <div>
                        <label>Enunciado</label>
                        <input name="enunciado" type="text" class="form-control" value="{{ $question->enunciado }}" id="box">
                    </div>


                        <br>
                        <div>
                            <label>Resposta</label>
                            <input name="answer" type="text" class="form-control" value="{{ $question->answer }}" id="box">
                        </div>
                        <br>

                        <button type="submit" class="btn btn-primary">
                            Atualizar
                        </button>

                        @else

                        <form action="{{ route('update_questionMark', $question->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label>Tag</label>
                            <input name="tag" type="text" class="form-control" value="{{ $question->tag }}" id="box">
                        </div>

                        <div>
                            <label>Enunciado</label>
                            <input name="enunciado" type="text" class="form-control" value="{{ $question->enunciado }}" id="box">
                        </div>

                        <br>

                        @php
                            $letras = ['A', 'B', 'C', 'D', 'E'];
                        @endphp

                        <label>Respostas</label>
                        @foreach($question->answers as $index => $answer)
                            <div>
                                <label>Letra {{ $letras[$index] }}</label>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-1">
                                    <input type="hidden" name="answers[{{ $index }}][id]" value="{{$answer->id}}" />
                                    <input type="checkbox" name="answers[{{ $index }}][correto]" value="1" {{$answer->correto ? 'checked' : ''}}/>
                                </div>
                                <!-- <input name="answers[{{ $index }}][correto]" type="text" class="form-control" value="{{ $answer->correto }}" id="box"> -->
                                <div class="col-sm-11">
                                    <input name="answers[{{ $index }}][descricao]" type="text" class="form-control" value="{{ $answer->descricao }}" id="box">
                                </div>
                            </div>
                            <br>
                        @endforeach


                        <button type="submit" class="btn btn-primary">
                            Atualizar
                        </button>

                        </form>

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
