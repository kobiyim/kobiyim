<div>
    <div class="container-lg">

        <!-- end page title -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Kullanıcı </h4>
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
                                        <li><a href="{{ url('system/user/create') }}" wire:navigate class="dropdown-item">+ Yeni</a></li>
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
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Ad</th>
                                            <th>Email</th>
                                            <th>Roller</th>
                                            <th>İşlem</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>
                                                @foreach ($user->roles as $role)
                                                    <span class="badge bg-secondary">{{ $role->name }}</span>
                                                @endforeach
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary" wire:click="dispatch('openModal', ['system.user.edit-modal', [{{ $user->id }}]])">Düzenle</button>
                                                <button class="btn btn-sm btn-danger" wire:click="delete({{ $user->id }})" onclick="confirm('Silmek istediğinizden emin misiniz?') || event.stopImmediatePropagation()">Sil</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                {{ $users->links() }}
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