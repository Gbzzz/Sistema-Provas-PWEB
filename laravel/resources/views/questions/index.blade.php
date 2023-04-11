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

                        <x-label for="text" :value="__('Criar Questão')" />
                        <x-button type="button" class="mt" data-toggle="modal" data-target="#aberta-Modal">
                            Questão Aberta
                        </x-button>

                        <x-button type="button" class="mt" data-toggle="modal" data-target="#v-f-Modal">
                            Questão de V/F
                        </x-button>
                        
                        <x-button type="button" class="mt" data-toggle="modal" data-target="#multipla-escolha-Modal">
                            Questão Multipla Escolha
                        </x-button>

                        <x-button type="button" class="mt" data-toggle="modal" data-target="#uma-correta-Modal">
                            Questão com Apenas 1 Correta
                        </x-button>
                        
                        <!-- Modal Aberta -->
                        <div class="modal fade" id="aberta-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Questão Aberta</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                ...
                                </div>
                                <div class="modal-footer">
                                    <x-button type="button" class="mt" data-dismiss="modal">Close</x-button>
                                    <x-button type="button" class="mt">Save changes</x-button>
                                </div>
                            </div>
                            </div>
                        </div>

                        <!-- Modal V/F -->
                        <div class="modal fade" id="v-f-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Questão de V/F</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                ...
                                </div>
                                <div class="modal-footer">
                                    <x-button type="button" class="mt" data-dismiss="modal">Close</x-button>
                                    <x-button type="button" class="mt">Save changes</x-button>
                                </div>
                            </div>
                            </div>
                        </div>

                        <!-- Modal Multipla Escolha -->
                        <div class="modal fade" id="multipla-escolha-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Questão de Multipla Escolha</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                ...
                                </div>
                                <div class="modal-footer">
                                    <x-button type="button" class="mt" data-dismiss="modal">Close</x-button>
                                    <x-button type="button" class="mt">Save changes</x-button>
                                </div>
                            </div>
                            </div>
                        </div>

                        <!-- Modal com Apenas 1 Correta -->
                        <div class="modal fade" id="uma-correta-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Questão com apenas 1 correta</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                ...
                                </div>
                                <div class="modal-footer">
                                    <x-button type="button" class="mt" data-dismiss="modal">Close</x-button>
                                    <x-button type="button" class="mt">Save changes</x-button>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
