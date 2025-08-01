<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Satış Faturaları</h4>
                        <div class="row row-cols-lg-auto g-3 align-items-center">
                            <div class="col-12">
                                <label class="visually-hidden" for="inlineFormInputGroupUsername">Cariler?</label>
                                <input type="text" class="form-control" wire:model.live.debounce.250ms="search" placeholder="Cariler?">
                            </div>
                            <div class="col-12">
                                <div class="dropdown d-inline-block">
                                    <button class="btn btn-soft-secondary btn-md dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        İşlemler
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a wire:navigate href="{{ url('invoice/sales/create') }}" class="dropdown-item">Yeni Fatura</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <table class="table table-striped table-sm align-middle">
                                    <thead>
                                        <tr class="text-center">
                                            <th wire:click="sortBy('date_')" style="cursor: pointer;" scope="col" width="6%">Tarih  @if($sortField === 'date_') @if($sortDirection === 'asc') ▲ @else ▼ @endif @endif </th>
                                            <th wire:click="sortBy('invoice_no')" style="cursor: pointer;" scope="col" width="7%">Fiş No  @if($sortField === 'invoice_no') @if($sortDirection === 'asc') ▲ @else ▼ @endif @endif </th>
                                            <th wire:click="sortBy('docode')" style="cursor: pointer;" scope="col" width="8%">Belge No  @if($sortField === 'docode') @if($sortDirection === 'asc') ▲ @else ▼ @endif @endif </th>
                                            <th scope="col" width="8%">Türü</th>
                                            <th scope="col">Müşteri</th>
                                            <th scope="col" width="8%">Tutarı</th>
                                            <th scope="col" width="5%">İşlemler</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($fiches as $fiche)
                                            <tr>
                                                <td>{{ $fiche->date_->format('d.m.Y') }}</td>
                                                <td>{{ $fiche->invoice_no }}</td>
                                                <td>{{ $fiche->docode }}</td>
                                                <td>{{ salesTypes($fiche->type) }}</td>
                                                <td>{{ $fiche->card->name }}</td>
                                                <td class="text-end">{{ moneyFormat($fiche->total) }}</td>
                                                <td class="text-center">
                                                    <div class="dropdown d-inline-block">
                                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-fill align-middle"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <li><a wire:navigate href="{{ url('invoice/sales/' . $fiche->id) }}" class="dropdown-item">İncele</a></li>
                                                            <li><a wire:navigate href="{{ url('invoice/sales/' . $fiche->id  . '/edit') }}" class="dropdown-item">Düzenle</a></li>
                                                            <li><a wire:click="confirmDelete({{ $fiche->id }})" class="dropdown-item">Sil</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                {{ $fiches->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                        <p>Bu faturayı silmek istediğinizden emin misiniz?</p>
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
            let modal = bootstrap.Modal.getInstance(document.getElementById('ficheModal'));
            modal.hide();
        });

        window.addEventListener('modal-open', () => {
            let modal = new bootstrap.Modal(document.getElementById('ficheModal'));
            modal.show();
        });
    </script>

</div>
