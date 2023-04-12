@extends('layouts.main')

@section('title',$questions->title)

@section('content')

<h1>Edit question #{{ $questions->id }}</h1>

<form action="/questions/update/{{ $questions->id }}" method="POST">
@csrf
@method('PUT')

<table>
    <tr>
        <td class="title">
            <label>Título:</label>
        </td>
        <td>
            <input type="text" id="title" name="title" placeholder="Texto..." value="{{ $questions->title }}">
        </td>
    </tr>
    <tr>
        <td class="title">
            <label>Enunciado:</label>
        </td>
        <td>
            <input type="text" id="text" name="text" placeholder="Texto..." value="{{ $questions->text }}">
        </td>
    </tr>

    @if ($questions->type == 2)

        @foreach($options as $option)
            <tr>
                <td>
                    @if ($option->correct == 1)
                        <input type="radio" name="correct" id="correct" value ="{{ $option->id }}" checked>
                    @else
                        <input type="radio" name="correct" id="correct" value="{{ $option->id }}">
                    @endif
                </td>
                <td>
                    <input type="text" id="option" name="option[]" value="{{ $option->option }}">
                </td>
            </tr>
        @endforeach
    @elseif($questions->type == 3)
        @foreach($options as $option)
            <tr>
                <td>
                    @if ($option->correct == 1)
                        <input type="checkbox" name="correct[]" id="correct" value ="{{ $option->id }}" checked>
                    @else
                        <input type="checkbox" name="correct[]" id="correct" value="{{ $option->id }}">
                    @endif
                </td>
                <td>
                    <input type="text" id="option" name="option[]" value="{{ $option->option }}">
                </td>
            </tr>
        @endforeach
    @elseif($questions->type == 4)
        <tr>
            <th></th>
            <th>V</th>
            <th>F</th>
        </tr>
        @foreach($options as $option)
            <tr>
                <td>
                    <input type="text" id="option" name="option[]" value="{{ $option->option }}">
                </td>
                <td>
                    @if ($option->correct == 1)
                        <input type="radio" name="correct[{{ $option->id }}]" id="correct" value ="1" checked>
                    @else
                        <input type="radio" name="correct[{{ $option->id }}]" id="correct" value="1">
                    @endif
                </td>
                <td>
                    @if ($option->correct == 0)
                        <input type="radio" name="correct[{{ $option->id }}]" id="correct" value ="0" checked>
                    @else
                        <input type="radio" name="correct[{{ $option->id }}]" id="correct" value="0">
                    @endif
                </td>
            </tr>
        @endforeach
    @endif

</table>

<table>
    <tr>
        <td>
            <button type="submit">Update</button>
        </td>
        <td>
            <a class="button" href="/questions">Cancel</a>
        </td>
    </tr>
</table>

</form>

@endsection