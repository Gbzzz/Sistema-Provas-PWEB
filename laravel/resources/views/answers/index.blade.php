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
                        <form action="{{ route('add_answer') }}" method="POST">
                            @csrf
                            <div class="mt-4">
                                <x-label for="text" :value="__('Resposta')" />
                                <select name="question_id" id="question_id">
                                    <option value="1">questao 1</option>
                                </select>

                                <x-input id="text" class="block mt-1 w-full" type="text" name="text" :value="old('text')" required />
                            </div>
                            <x-button class="mt-4">
                                {{ __('Registrar') }}
                            </x-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
