<div>
    <div class="container-fluid">

        <!-- end page title -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Banka Hareketleri</h4>
                        <div class="row row-cols-lg-auto g-3 align-items-center">
                            <div class="col-12">
                                <label class="visually-hidden" for="inlineFormInputGroupUsername">Banka Hareketleri?</label>
                                <input type="text" class="form-control" wire:model.live.debounce.250ms="search" placeholder="Banka Hareketleri?">
                            </div>
                            <!--end col-->
                            <div class="col-12">
                                <div class="dropdown d-inline-block">
                                    <button class="btn btn-soft-secondary btn-md dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        İşlemler
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a wire:navigate href="{{ url('bank/fiche/create') }}" class="dropdown-item">Yeni Banka Fişi</a></li>
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
                                            <th scope="col">Fiş No</th>
                                            <th scope="col">Tarih</th>
                                            <th scope="col">Açıklama</th>
                                            <th scope="col">Borç</th>
                                            <th scope="col">Alacak</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($bankFicheLines as $fiche)
                                            <tr>
                                                <td>{{ $fiche->fiche->fiche_no }}</td>
                                                <td>{{ $fiche->fiche->date_->format('d.m.Y') }}</td>
                                                <td>{{ $fiche->description }}</td>
                                                <td>@if($fiche->fiche->sign == 1) {{ $fiche->amount }} @endif</td>
                                                <td>@if($fiche->fiche->sign == 0) {{ $fiche->amount }} @endif</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                {{ $bankFicheLines->links() }}
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