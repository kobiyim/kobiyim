<div>
    <div class="container-fluid">
        <form wire:submit.prevent="store">
            <div class="row">
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Banka Fişi</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-2">
                                <label for="choices-publish-status-input" class="form-label">Fiş No:</label>
                                <input type="text" wire:model="fiche_no" placeholder="Invoice No" class="form-control">
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
                                <label for="choices-publish-status-input" class="form-label">Fatura Türü:</label>
                                {{ html()->select('', bankFicheTypes()->prepend('Seçiniz', ''))->attributes([ 'wire:model' => 'transaction', 'class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Fiş Detayları</h4>
                            <div class="flex-shrink-0">
                                <div class="form-check form-switch form-switch-right form-switch-md">
                                    <a class="btn btn-secondary" wire:navigate href="{{ url('bank/fiches') }}">Fişler</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-lg-12">
                                    <table class="table table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th>Banka</th>
                                                <th>Hesap</th>
                                                <th>Cari</th>
                                                <th>Tutar</th>
                                                <th>Açıklama</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($details as $index => $detail)
                                                <tr>
                                                    <td>
                                                        {{ html()->select('', $banks)->attributes([ 'wire:model.change' => 'details.' . $index . '.bank_id', 'class' => 'form-control']) }}
                                                    </td>
                                                    <td>
                                                        @php
                                                            $unitss = \App\Models\Lunaris\BankAccount::where('bank_id', $details[$index]['bank_id'])->get()->pluck('name', 'id');
                                                        @endphp
                                                        {{ html()->select($details[$index]['bank_account_id'], $unitss)->attributes([ 'wire:model' => 'details.' . $index . '.bank_account_id', 'class' => 'form-control form-select']) }}
                                                    </td>
                                                    <td>
                                                        {{ html()->select('', $cards)->attributes([ 'wire:model' => 'details.' . $index . '.card_id', 'class' => 'form-control']) }}
                                                    </td>
                                                    <td>
                                                        <input type="number" wire:model="details.{{$index}}.amount" class="form-control" placeholder="Fiyat" step="0.01">
                                                    </td>
                                                    <td>
                                                        <input type="text" wire:model="details.{{$index}}.description" class="form-control" placeholder="Açıklama">
                                                    </td>
                                                    <td>
                                                        <button type="button" wire:click="removeFromDetail({{ $index }})" class="btn btn-danger btn-sm">X</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @foreach($newCreation as $index => $detail)
                                                <tr>
                                                    <td>
                                                        {{ html()->select('', $banks)->attributes([ 'wire:model.change' => 'newCreation.' . $index . '.bank_id', 'class' => 'form-control']) }}
                                                    </td>
                                                    <td>
                                                        <select wire:model="newCreation.{{$index}}.bank_account_id" class="form-control">
                                                            @foreach (\App\Models\Lunaris\BankAccount::where('bank_id', $newCreation[$index]['bank_id'])->get()->pluck('name', 'id')->prepend('Seçiniz', '') as $accId => $accName)
                                                                <option value="{{ $accId }}">{{ $accName }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        {{ html()->select('', $cards)->attributes([ 'wire:model' => 'newCreation.' . $index . '.card_id', 'class' => 'form-control']) }}
                                                    </td>
                                                    <td>
                                                        <input type="number" wire:model="newCreation.{{$index}}.amount" class="form-control" placeholder="Fiyat" step="0.01">
                                                    </td>
                                                    <td>
                                                        <input type="text" wire:model="newCreation.{{$index}}.description" class="form-control" placeholder="Açıklama">
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
