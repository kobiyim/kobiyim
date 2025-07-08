<div>
    @if($isOpen)
    <div class="modal fade show d-block" tabindex="-1" style="background-color: rgba(0, 0, 0, 0.5)">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-3 position-relative">

                <!-- Kapat Butonu -->
                <button type="button" class="btn-close position-absolute top-0 end-0 m-3" wire:click="close"></button>

                <!-- Dinamik Bileşen -->
                @if ($component)
                    @livewire($component, $params, key($component . json_encode($params)))
                @endif

            </div>
        </div>
    </div>
@endif
</div>