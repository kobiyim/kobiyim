<div class="modal fade" tabindex="-1" role="dialog" style="display:block; background-color:rgba(0,0,0,0.5);">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form wire:submit.prevent="save">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $editingUserId ? 'Kullanıcıyı Düzenle' : 'Yeni Kullanıcı' }}</h5>
                    <button type="button" class="close" wire:click="closeModal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <label>Ad</label>
                        <input type="text" class="form-control" wire:model.defer="name">
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-2">
                        <label>Email</label>
                        <input type="email" class="form-control" wire:model.defer="email">
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-2">
                        <label>Şifre {{ $editingUserId ? '(Boş bırakılırsa değişmez)' : '' }}</label>
                        <input type="password" class="form-control" wire:model.defer="password">
                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-2">
                        <label>Roller</label>
                        @foreach($roles as $role)
                            <div class="form-check">
                                <input type="checkbox" wire:model="roleIds" value="{{ $role->id }}" id="role_{{ $role->id }}" class="form-check-input">
                                <label for="role_{{ $role->id }}" class="form-check-label">{{ $role->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" wire:click="closeModal" type="button">Kapat</button>
                    <button class="btn btn-primary" type="submit">Kaydet</button>
                </div>
            </form>
        </div>
    </div>
</div>
