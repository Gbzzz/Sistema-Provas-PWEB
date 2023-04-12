@extends('layouts.main')

@section('title', $question->title)

@section('content')

<h2>#{{ $question->id }} {{ $question->title }}</h2>

<p>{{ $question->text }}</p>

<table>
    @if ($question->type == 2)

        @foreach($options as $option)
            <tr>
                <td>
                    @if ($option->correct == 1)
                    <input type="radio" name="correct[]" id="correct" value ="{{ $option->id }}" checked>
                    @else
                    <input type="radio" name="correct[]" id="correct" value ="{{ $option->id }}">
                    @endif
                </td>
                <td>
                    <p>{{ $option->option }}</p>
                </td>
            </tr>
        @endforeach

    @elseif ($question->type == 3)

    @foreach($options as $option)
            <tr>
                <td>
                    @if ($option->correct == 1)
                    <input type="checkbox" name="correct[]" id="correct" value ="{{ $option->id }}" checked>
                    @else
                    <input type="checkbox" name="correct[]" id="correct" value ="{{ $option->id }}">
                    @endif
                </td>
                <td>
                    <p>{{ $option->option }}</p>
                </td>
            </tr>
        @endforeach

    @elseif ($question->type == 4)
        <tr>
            <th></th>
            <th>V</th>
            <th>F</th>
        </tr>
        @foreach($options as $option)
            <tr>
                <td>
                    <p>{{ $option->option }}</p>
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

@endsection