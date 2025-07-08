<div>
    <div class="container-fluid">

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
                                            <th>Cari</th>
                                            <th>Stok</th>
                                            <th>Açıklama</th>
                                            <th>Miktar</th>
                                            <th>Birim</th>
                                            <th>Fiyat</th>
                                            <th>Toplam</th>
                                            <th>Fatura Türü</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($results as $row)
                                            <tr>
                                                <td>{{ $row->invoice->card->name ?? '-' }}</td>
                                                <td>{{ $row->item->name ?? '-' }}</td>
                                                <td>{{ $row->description }}</td>
                                                <td>{{ $row->quantity }}</td>
                                                <td>{{ $row->unit->name ?? '-' }}</td>
                                                <td>{{ number_format($row->price, 2) }}</td>
                                                <td>{{ number_format($row->total, 2) }}</td>
                                                <td>{{ $row->invoice->type ?? '-' }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8">Kayıt bulunamadı.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>

                                {{ $results->links() }}
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