<section class="content">
    <div class="body_scroll">
        <x-breadcrumb title="Roles"/>
        <div class="container-fluid">
            <!-- Hover Rows -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <x-alert-success />
                        <div class="header">
                            <h2><strong>List</strong> Roles</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($roles)
                                        @foreach($roles as $role)
                                            <tr wire:key="{{ $role->id }}">
                                                <th scope="row">{{ $role->id }}</th>
                                                <td>{{ $role->name }}</td>
                                                <td>{{ $role->created_at->diffForHumans() }}</td>
                                                <td>
                                                    <a
                                                        class="btn btn-info btn-icon float-left"
                                                        title="assign permissions"
                                                        href="{{ route('assign-permissions', $role->id) }}"
                                                    >
                                                        <i class="zmdi zmdi-assignment"></i>
                                                    </a>
                                                    <a
                                                        class="btn btn-danger btn-icon float-left"
                                                        type="button"
                                                        title="delete role"
                                                        wire:click="delete({{$role->id}})"
                                                        wire:confirm="Are you sure?"
                                                    >
                                                        <i class="zmdi zmdi-delete"></i></i>
                                                    </a>
                                                    <a
                                                        class="btn btn-secondary btn-icon float-left"
                                                        title="edit role"
                                                        wire:navigate
                                                        href="{{ route('edit-role', $role->id) }}"
                                                    >
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="4">
                                                {{ $roles->links('livewire::bootstrap') }}
                                            </td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td colspan="4">Not data found.</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Hover Rows -->
        </div>
    </div>
</section>
