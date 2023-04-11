<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

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
    </div><!-- Modal Aberta -->
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
    </x-auth-card>
</x-guest-layout>
