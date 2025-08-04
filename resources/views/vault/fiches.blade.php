<div>
    <div class="container-fluid">

        <!-- end page title -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Kasa Fişleri</h4>
                        <div class="row row-cols-lg-auto g-3 align-items-center">
                            <div class="col-12">
                                <label class="visually-hidden" for="inlineFormInputGroupUsername">Kasa Fişleri?</label>
                                <input type="text" class="form-control" wire:model.live.debounce.250ms="search" placeholder="Kasa Fişleri?">
                            </div>
                            <!--end col-->
                            <div class="col-12">
                                <div class="dropdown d-inline-block">
                                    <button class="btn btn-soft-secondary btn-md dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        İşlemler
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a wire:navigate href="{{ url('vault/fiche/create') }}" class="dropdown-item">Yeni Kasa Fişi</a></li>
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
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($vaultFiches as $fiche)
                                            <tr>
                                                <td>{{ $fiche->ficheno }}</td>
                                                <td>{{ $fiche->date_ }}</td>
                                                <td>{{ $fiche->description }}</td>
                                                <td>@if($fiche->sign == 1) {{ $fiche->total }} @endif</td>
                                                <td>@if($fiche->sign == 0) {{ $fiche->total }} @endif</td>
                                                <td>
                                                    <div class="dropdown d-inline-block">
                                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-fill align-middle"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <li><a wire:navigate href="{{ url('bank/fiche/' . $fiche->id . '/edit') }}" class="dropdown-item">Düzenle</a></li>
                                                            <li><a wire:click="confirmDelete({{ $fiche->id }})" class="dropdown-item">Sil</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                {{ $vaultFiches->links() }}
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

    <!-- Delete Confirmation -->
    @if($confirmingDelete)
        <div class="modal fade show d-block" tabindex="-1" style="background-color: rgba(0,0,0,0.5);">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Silme Onayı</h5>
                    </div>
                    <div class="modal-body">
                        <p>Bu kasa fişini silmek istediğinizden emin misiniz?</p>
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
            let modal = bootstrap.Modal.getInstance(document.getElementById('cardModal'));
            modal.hide();
        });

        window.addEventListener('modal-open', () => {
            let modal = new bootstrap.Modal(document.getElementById('cardModal'));
            modal.show();
        });
    </script>

</div>