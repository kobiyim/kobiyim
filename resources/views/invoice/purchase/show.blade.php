<div>
    <div class="container-fluid">
        <!-- end page title -->
        <div class="row">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Fatura Detayı</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-2">
                            <label for="choices-publish-status-input" class="form-label">Fatura No:</label>
                            <div class="fw-bolder">{{ $invoice->invoice_no }}</div>
                        </div>
                        <div class="mb-2">
                            <label for="choices-publish-status-input" class="form-label">Cari:</label>
                            <div class="fw-bolder">{{ $invoice->card->name }}</div>
                        </div>
                        <div class="mb-2">
                            <label for="choices-publish-status-input" class="form-label">Tarih:</label>
                            <div class="fw-bolder">{{ $invoice->date_->format('d.m.Y') }}</div>
                        </div>
                        <div class="mb-2">
                            <label for="choices-publish-status-input" class="form-label">Açıklama:</label>
                            <div class="fw-bolder">{{ $invoice->description }}</div>
                        </div>
                        <div class="mb-2">
                            <label for="choices-publish-status-input" class="form-label">Fatura Türü:</label>
                            <div class="fw-bolder">{{ purchaseTypes($invoice->type) }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Fatura Detayları</h4>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th width="20%">Stok</th>
                                            <th>Açıklama</th>
                                            <th width="7%">Miktar</th>
                                            <th width="7%">Birim</th>
                                            <th width="12%">Fiyatı</th>
                                            <th width="12%">Toplam</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($invoice->details as $detail)
                                            <tr>
                                                <td>
                                                    {{ $detail->item->name }}
                                                </td>
                                                <td>
                                                    {{ $detail->description }}
                                                </td>
                                                <td class="text-end">
                                                    {{ $detail->quantity }}
                                                </td>
                                                <td>
                                                    {{ $detail->unit->name }}
                                                </td>
                                                <td class="text-end">
                                                    {{ moneyFormat($detail->price) }}
                                                </td>
                                                <td class="text-end">
                                                    {{ moneyFormat($detail->total) }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot class="table-light">
                                        <tr>
                                            <td colspan="5" class="text-end">
                                                Genel Toplam:
                                            </td>
                                            <td class="text-end">
                                                {{ moneyFormat($invoice->total) }} ₺
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('title', 'Fatura İncele')