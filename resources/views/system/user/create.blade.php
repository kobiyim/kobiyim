<div>
    <h5>Yeni İzin Ekle</h5>

    <div class="mb-2">
        <label>Ad</label>
        <input type="text" class="form-control" wire:model.defer="name">
        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mb-2">
        <label>Ad</label>
        <input type="text" class="form-control" wire:model.defer="key">
        @error('key') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <button class="btn btn-primary" wire:click="save">Kaydet</button>
</div>
