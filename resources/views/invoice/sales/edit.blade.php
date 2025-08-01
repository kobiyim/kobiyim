<div>
    <div class="container-fluid">
        <form wire:submit.prevent="update">
            <div class="row">
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Fatura Detayı</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-2">
                                <label class="form-label">Fatura No:</label>
                                <input type="text" wire:model="invoice_no" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Cari:</label>
                                <select wire:model="card_id" class="form-control form-select">
                                    @foreach($cards as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Tarih:</label>
                                <input type="date" wire:model="date_" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Açıklama:</label>
                                <textarea wire:model="description" class="form-control"></textarea>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Fatura Türü:</label>
                                <select wire:model="type" class="form-control">
                                    @foreach(salesTypes() as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Fatura Detayları</h4>
                            <div class="flex-shrink-0">
                                <a class="btn btn-secondary" wire:navigate href="{{ url('invoice/sales') }}">Faturalar</a>
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
                                                        <input type="text" wire:model="details.{{ $index }}.description" class="form-control" placeholder="Açıklama">
                                                    </td>
                                                    <td>
                                                        <input type="number" wire:model="details.{{ $index }}.quantity" class="form-control" step="0.001">
                                                    </td>
                                                    <td>
                                                        @php
                                                            $unitss = \App\Models\Lunaris\Unit::where('unit_set_id', \App\Models\Lunaris\Item::find($details[$index]['stock_id'])->unit_set_id)->get()->pluck('name', 'id');
                                                        @endphp
                                                        {{ html()->select($details[$index]['unit_id'], $unitss)->attributes([ 'wire:model' => 'details.' . $index . '.unit_id', 'class' => 'form-control form-select']) }}
                                                    </td>
                                                    <td>
                                                        <input type="number" wire:model="details.{{ $index }}.price" class="form-control" step="0.01">
                                                    </td>
                                                    <td>
                                                        <input type="number" wire:model="details.{{ $index }}.total" class="form-control" readonly>
                                                    </td>
                                                    <td>
                                                        <button type="button" wire:click="removeFromDetail({{ $index }})" class="btn btn-danger btn-sm">X</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @foreach($newCreation as $index => $detail)
                                                <tr>
                                                    <td>
                                                        {{ html()->select('', $stocks)->attributes([ 'wire:model.change' => 'newCreation.' . $index . '.stock_id', 'class' => 'form-control form-select']) }}
                                                    </td>
                                                    <td>
                                                        <input type="text" wire:model="newCreation.{{ $index }}.description" class="form-control" placeholder="Açıklama">
                                                    </td>
                                                    <td>
                                                        <input type="number" wire:model="newCreation.{{ $index }}.quantity" class="form-control" step="0.001">
                                                    </td>
                                                    <td>
                                                        <select wire:model="newCreation.{{ $index }}.unit_id" class="form-control">
                                                            @php
                                                                $item = \App\Models\Lunaris\Item::find($newCreation[$index]['stock_id']);
                                                                $units = $item ? \App\Models\Lunaris\Unit::where('unit_set_id', $item->unit_set_id)->get() : [];
                                                            @endphp
                                                            @foreach($units as $unit)
                                                                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="number" wire:model="newCreation.{{ $index }}.price" class="form-control" step="0.01">
                                                    </td>
                                                    <td>
                                                        <input type="number" wire:model="newCreation.{{ $index }}.total" class="form-control" readonly>
                                                    </td>
                                                    <td>
                                                        <button type="button" wire:click="removeFromCreation({{ $index }})" class="btn btn-danger btn-sm">X</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <button type="button" wire:click="addDetail" class="btn btn-secondary mb-3">+ Satır Ekle</button>

                                    <div class="form-group">
                                        <label>Genel Toplam: {{ number_format($total, 2) }} ₺</label>
                                    </div>

                                    <button class="btn btn-primary">Güncelle</button>

                                    @if (session()->has('message'))
                                        <div class="alert alert-success mt-2">{{ session('message') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>