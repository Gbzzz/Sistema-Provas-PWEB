@extends('layouts.main')

@section('title', $question->title)

@section('content')

<h2>#{{ $question->id }} {{ $question->title }}</h2>

<p style="text-align: left;">{{ $question->text }}</p>

<table>
    @if ($question->type == 2)

        @foreach($options as $option)
            <tr>
                <td>
                    <input type="radio" name="correct" id="correct" value ="{{ $option->id }}">
                </td>
                <td>
                    <p>{{ $option->option }}</p>
                </td>
            </tr>
        @endforeach

    @endif
</table>

@endsection