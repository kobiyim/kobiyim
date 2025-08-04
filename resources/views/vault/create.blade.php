<div>
    <div class="container-fluid">
<form wire:submit.prevent="store">
        <!-- end page title -->
        <div class="row">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Banka Fiş Detayı</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <div class="form-group mb-2">
                                    <input type="text" wire:model="fiche_no" placeholder="Fiş Numarası" class="form-control">
                                </div>
                                <div class="form-group mb-2">
                                    <input type="date" wire:model="date_" class="form-control">
                                </div>
                                <div class="form-group mb-2">
                                    <textarea wire:model="description" placeholder="Description" class="form-control"></textarea>
                                </div>
                                <div class="form-group mb-2">
                                    {{ html()->select('', bankTransactions())->attributes([ 'wire:model' => 'transaction', 'class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Banka Fiş Detayı Satırları</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Banka</th>
                                            <th>Hesap</th>
                                            <th>Cari</th>
                                            <th>Açıklama</th>
                                            <th>Tutar</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($lines as $index => $detail)
                                            <tr>
                                                <td>
                                                    <select wire:model.change="lines.{{ $index }}.bank_id" class="form-control">
                                                        @foreach (\App\Models\Lunaris\Bank::all() as $state)
                                                            <option value="{{ $state->id }}" @if($loop->first) selected @endif >{{ $state->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <select wire:model="lines.{{$index}}.bank_account_id" class="form-control">
                                                        @foreach (\App\Models\Lunaris\BankAccount::where('bank_id', $lines[$index]['bank_id'])->get() as $account)
                                                            <option value="{{ $account->id }}">{{ $account->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <select wire:model="lines.{{$index}}.card_id" class="form-control">
                                                        @foreach ($cards as $cardId => $cardName)
                                                            <option value="{{ $cardId }}">{{ $cardName }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text" wire:model="lines.{{$index}}.description" class="form-control" placeholder="Açıklama">
                                                </td>
                                                <td>
                                                    <input type="number" wire:model="lines.{{$index}}.amount" class="form-control" placeholder="Tutar" step="0.001">
                                                </td>
                                                <td>
                                                    <button type="button" wire:click="removeLine({{ $index }})" class="btn btn-danger btn-sm">X</button>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                                    <button type="button" wire:click="addLine" class="btn btn-secondary mb-3">+ Satır Ekle</button>

                                    <button class="btn btn-primary">Kaydet</button>
                                </form>

                                @if (session()->has('message'))
                                    <div class="alert alert-success mt-2">{{ session('message') }}</div>
                                @endif
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

</div>