<div>
    <div class="container-lg">

        @if ($successMessage)
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $successMessage }}
                <button type="button" class="btn-close" wire:click="$set('successMessage', null)"></button>
            </div>
        @endif

        <!-- end page title -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Stok Kartları</h4>
                        <div class="row row-cols-lg-auto g-3 align-items-center">
                            <div class="col-12">
                                <label class="visually-hidden" for="inlineFormInputGroupUsername">Stoklar?</label>
                                <input type="text" class="form-control" wire:model.live.debounce.250ms="search" placeholder="Stoklar?">
                            </div>
                            <!--end col-->
                            <div class="col-12">
                                <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                                <select class="form-select" aria-label=".form-select-sm example">
                                    <option selected="">Hepsi</option>
                                    <option value="1">Aktif</option>
                                    <option value="2">Pasif</option>
                                </select>
                            </div>
                            <!--end col-->
                            <div class="col-12">
                                <div class="dropdown d-inline-block">
                                    <button class="btn btn-soft-secondary btn-md dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        İşlemler
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a wire:click="resetForm" data-bs-toggle="modal" data-bs-target="#itemModal" class="dropdown-item">Yeni Stok</a></li>
                                        <li><a href="{{ url('item/movements') }}" wire:navigate class="dropdown-item">Malzeme Hareketleri</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <table class="table table-nowrap">
                                    <thead>
                                        <tr>
                                            <th wire:click="sortBy('code')" style="cursor: pointer;" scope="col">Kod  @if($sortField === 'code') @if($sortDirection === 'asc') ▲ @else ▼ @endif @endif </th>
                                            <th wire:click="sortBy('name')" style="cursor: pointer;" scope="col">Ad  @if($sortField === 'name') @if($sortDirection === 'asc') ▲ @else ▼ @endif @endif </th>
                                            <th>Birim Seti</th>
                                            <th width="5%">İşlemler</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($items as $item)
                                            <tr>
                                                <td>{{ $item->code }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->unitSet->name }}</td>
                                                <td class="text-center">
                                                    <div class="dropdown d-inline-block">
                                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-fill align-middle"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <li><a wire:click="edit({{ $item->id }})" class="dropdown-item">Düzenle</a></li>
                                                            <li><a wire:click="confirmDelete({{ $item->id }})" class="dropdown-item">Sil</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                {{ $items->links() }}
                            </div>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- container-fluid -->

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="itemModal" tabindex="-1">
        <div class="modal-dialog">
            <form wire:submit.prevent="{{ $isEditMode ? 'update' : 'store' }}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $isEditMode ? 'Stok Düzenle' : 'Yeni Stok' }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Kod</label>
                            <input type="text" class="form-control" wire:model.defer="code">
                            @error('code') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Ad</label>
                            <input type="text" class="form-control" wire:model.defer="name">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Birim Seti</label>
                            <select class="form-control" wire:model.defer="unit_set_id">
                                <option value="">Birim Seti Seçin</option>
                                @foreach($unitSets as $unitSet)
                                    <option value="{{ $unitSet->id }}">{{ $unitSet->name }}</option>
                                @endforeach
                            </select>
                            @error('unit_set_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                        <button type="submit" class="btn btn-primary">{{ $isEditMode ? 'Güncelle' : 'Kaydet' }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Confirmation -->
    @if($confirmingDelete)
        <div class="modal fade show d-block" tabindex="-1" style="background-color: rgba(0,0,0,0.5);">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Silme Onayı</h5>
                    </div>
                    <div class="modal-body">
                        <p>Bu stoku silmek istediğinizden emin misiniz?</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" wire:click="$set('confirmingDelete', false)">Vazgeç</button>
                        <button class="btn btn-danger" wire:click="delete">Evet, Sil</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <script>
        window.addEventListener('modal-close', () => {
            let modal = bootstrap.Modal.getInstance(document.getElementById('itemModal'));
            modal.hide();
        });

        window.addEventListener('modal-open', () => {
            let modal = new bootstrap.Modal(document.getElementById('itemModal'));
            modal.show();
        });
    </script>

</div>