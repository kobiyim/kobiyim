<div>
    <div class="container-lg">

        <!-- end page title -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Sistem İçi Yedeklemeler</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <div class="table-responsive table-card">
                                    <table class="table table-nowrap align-middle">
                                        <thead>
                                            <tr>
                                                <th>Dosya Adı</th>
                                                <th>Dizin</th>
                                                <th>Uzantısı</th>
                                                <th>Bulut Durumu</th>
                                                <th>Dosya Boyutu</th>
                                                <th>Oluşturulma</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($items as $item)
                                                <tr>
                                                    <td>{{ $item->filename }}</td>
                                                    <td>{{ $item->dir }}</td>
                                                    <td>{{ $item->type }}</td>
                                                    <td>{{ ($item->is_loaded == 1) ? 'Aktarıldı' : 'Yüklenmedi' }}</td>
                                                    <td>{{ formatBytes($model->size) }}</td>
                                                    <td>{{ $item->created_at->format('d.m.Y H:i') }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{ $items->links('components.partials.pagination') }}
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