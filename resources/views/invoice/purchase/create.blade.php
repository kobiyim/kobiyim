<div>
    <div class="container-fluid">
        <form wire:submit.prevent="store">
            <div class="row">
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Fatura Detayı</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-2">
                                <label for="choices-publish-status-input" class="form-label">Fatura No:</label>
                                <input type="text" wire:model="invoice_no" placeholder="Invoice No" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label for="choices-publish-status-input" class="form-label">Cari:</label>
                                {{ html()->select('', $cards)->attributes([ 'wire:model' => 'card_id', 'class' => 'form-control form-select']) }}
                            </div>
                            <div class="mb-2">
                                <label for="choices-publish-status-input" class="form-label">Tarih:</label>
                                <input type="date" wire:model="date_" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label for="choices-publish-status-input" class="form-label">Açıklama:</label>
                                <textarea wire:model="description" placeholder="Description" class="form-control"></textarea>
                            </div>
                            <div class="mb-2">
                                <label for="choices-publish-status-input" class="form-label">Belge No:</label>
                                <input type="text" wire:model="docode" placeholder="Invoice No" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label for="choices-publish-status-input" class="form-label">Fatura Türü:</label>
                                {{ html()->select('', purchaseTypes()->prepend('Seçiniz', ''))->attributes([ 'wire:model' => 'type', 'class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Fatura Detayları</h4>
                            <div class="flex-shrink-0">
                                <div class="form-check form-switch form-switch-right form-switch-md">
                                    <a class="btn btn-secondary" wire:navigate href="{{ url('invoice/purchase') }}">Faturalar</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-lg-12">
                                    <table class="table table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th width="20%">Stok</th>
                                                <th>Açıklama</th>
                                                <th width="7%">Miktar</th>
                                                <th width="7%">Birim</th>
                                                <th width="12%">Fiyatı</th>
                                                <th width="12%">Toplam</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($details as $index => $detail)
                                                <tr>
                                                    <td>
                                                        {{ html()->select('', $stocks)->attributes([ 'wire:model.change' => 'details.' . $index . '.stock_id', 'class' => 'form-control form-select']) }}
                                                    </td>
                                                    <td>
                                                        <input type="text" wire:model="details.{{$index}}.description" class="form-control" placeholder="Açıklama">
                                                    </td>
                                                    <td>
                                                        <input type="number" wire:model="details.{{$index}}.quantity" class="form-control" placeholder="Miktar" step="0.001">
                                                    </td>
                                                    <td>
                                                        <select wire:model="details.{{$index}}.unit_id" class="form-control">
                                                            @if($details[$index]['stock_id'])
                                                                @foreach (\App\Models\Lunaris\Unit::where('unit_set_id', \App\Models\Lunaris\Item::find($details[$index]['stock_id'])->unit_set_id)->get()->pluck('name', 'id')->prepend('Seçiniz', '') as $unitKey => $unitName)
                                                                    <option value="{{ $unitKey }}">{{ $unitName }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="number" wire:model="details.{{$index}}.price" class="form-control" placeholder="Fiyat" step="0.01">
                                                    </td>
                                                    <td>
                                                        <input type="number" wire:model="details.{{$index}}.total" class="form-control" placeholder="Toplam" readonly>
                                                    </td>
                                                    <td>
                                                        <button type="button" wire:click="removeDetail({{ $index }})" class="btn btn-danger btn-sm">X</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <button type="button" wire:click="addDetail" class="btn btn-secondary mb-3">+ Satır Ekle</button>

                                    <div class="form-group">
                                        <label>Genel Toplam: {{ number_format($total, 2) }} ₺</label>
                                    </div>

                                    <button class="btn btn-primary">Kaydet</button>
                                </div>

                                @if (session()->has('message'))
                                    <div class="alert alert-success mt-2">{{ session('message') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
