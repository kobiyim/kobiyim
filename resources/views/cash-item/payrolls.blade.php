<div>
    <div class="container-lg">

        <!-- end page title -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Cari Hesaplar</h4>
                        <div class="row row-cols-lg-auto g-3 align-items-center">
                            <div class="col-12">
                                <label class="visually-hidden" for="inlineFormInputGroupUsername">Cariler?</label>
                                <input type="text" class="form-control" wire:model.live.debounce.250ms="search" placeholder="Cariler?">
                            </div>
                            <!--end col-->
                            <div class="col-12">
                                <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                                <select class="form-select" aria-label=".form-select-sm example" wire:model.live.change="active">
                                    <option selected="" value="2">Hepsi</option>
                                    <option value="1">Aktif</option>
                                    <option value="0">Pasif</option>
                                </select>
                            </div>
                            <!--end col-->
                            <div class="col-12">
                                <div class="dropdown d-inline-block">
                                    <button class="btn btn-soft-secondary btn-md dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        İşlemler
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a wire:click="resetForm" data-bs-toggle="modal" data-bs-target="#cardModal" class="dropdown-item">Yeni Cari Hesap</a></li>
                                        <li><a wire:click="changeDetail" class="dropdown-item">Detaylı İncele</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <div class="table-responsive table-card">
                                    <table class="table table-nowrap align-middle">
                                        <thead>
                                            <tr>
                                                <th scope="col">Kod</th>
                                                <th scope="col">Ad</th>
                                                <th scope="col" width="5%">İşlemler</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($payrolls as $payroll)
                                                <tr>
                                                    <td>{{ $payroll->fiche_no }}</td>
                                                    <td>{{ $payroll->date_ }}</td>
                                                    <td>{{ $payroll->transaction }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{ $payrolls->links() }}
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