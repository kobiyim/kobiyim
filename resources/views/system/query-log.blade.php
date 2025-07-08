<div>
    <div class="container-lg">

        <!-- end page title -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Sistem İçi Hareketler</h4>
                        <div class="row row-cols-lg-auto g-3 align-items-center">
                            <div class="col-12">
                                <label class="visually-hidden" for="inlineFormInputGroupUsername">Arama?</label>
                                <input type="text" class="form-control" wire:model.live.debounce.250ms="search" placeholder="Arama?">
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
                                                <th>Tarih</th>
                                                <th>İşlem Türü</th>
                                                <th>İşlemi Yapan Kullanıcı</th>
                                                <th>İşlem Yapılan Tablo</th>
                                                <th>İşlem Yapılan ID</th>
                                                <th>Detay</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($items as $item)
                                                <tr>
                                                    <td>{{ $item->created_at->format('d.m.Y H:i') }}</td>
                                                    <td>{{ $item->type }}</td>
                                                    <td>{{ $item->user->name }}</td>
                                                    <td>{{ $item->subject_type }}</td>
                                                    <td>{{ $item->subject_id }}</td>
                                                    <td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{ $items->links() }}
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