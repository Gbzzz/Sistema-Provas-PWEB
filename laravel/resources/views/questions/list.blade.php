<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Questões') }}
        </h2>
    </x-slot>

<table style="width:60%;">
    <tr>
        <th>ID</th>
        <th>TITLE</th>
        <th>SUBJECT</th>
        <th>LEVEL</th>
        <th>CREATION</th>
    </tr>
    @foreach ($questions as $question)
        <tr style="width:50%;">
            <td>{{ $question->id }}</td>
            <td style="width:40%;"><a href="/questions/{{ $question->id }}">{{ $question->title }}</a></td>
            <td style="width:10%">{{ $question->subject }}</td>
            <td style="width:10%">{{ $question->difficulty }}</td>
            <td style="width:20%">{{ $question->created_at }}</td>
            <td ><a class="button" href="/questions/edit/{{ $question->id }}">Edit</a> </td>
            <td>
                <form action="/questions/delete/{{ $question->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach

</table>
{{-- <p>
<table>
    <tr>
        <td>
            <a class="button" style="height:20px;line-height:20px;width:70px" href="/questions/create">+ Create</a>
        </td>
    </tr>
</table> --}}


</x-app-layout>
