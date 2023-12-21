<section class="content">
    <div class="body_scroll">
        <x-breadcrumb title="Permissions"/>
        <div class="container-fluid">
            <!-- Hover Rows -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <x-alert-success/>
                        <div class="header">
                            <h2><strong>List</strong> Permissions</h2>
                        </div>
                        @can("create $pageHandler")
                            <button
                                type="button"
                                class="btn btn-default waves-effect m-r-20 float-right"
                                wire:click="add">
                                Add Permission
                            </button>
                        @endcan
                        {{--                        <livewire:admin.permissions.permission-modal />--}}
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
                                    @if($permissions->isNotEmpty())
                                        @foreach($permissions as $permission)
                                            <tr wire:key="{{ $permission->id }}">
                                                <th scope="row">{{ $permission->id }}</th>
                                                <td>{{ $permission->name }}</td>
                                                <td>{{ $permission->created_at->diffForHumans() }}</td>
                                                <td>
                                                    @can("delete $pageHandler")
                                                        <button
                                                            class="btn btn-danger btn-icon float-left"
                                                            type="button"
                                                            wire:click="delete({{$permission->id}})"
                                                            wire:confirm="Are you sure?"
                                                        >
                                                            <i class="zmdi zmdi-delete"></i></i>
                                                        </button>
                                                    @endcan
                                                    @can("update $pageHandler")
                                                        <button type="button"
                                                                class="btn btn-secondary btn-icon float-left"
                                                                wire:click="edit({{$permission->id}})">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4">Not data found.</td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td colspan="4">
                                            {{ $permissions->links('livewire::bootstrap') }}
                                        </td>
                                    </tr>
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

    @include("livewire.admin.permissions.permission-modal")
</section>

