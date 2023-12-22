<section class="content">
    <div class="body_scroll">
        <x-breadcrumb title="{{$pageTitle}}"/>
        <div class="container-fluid">
            <!-- Hover Rows -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <x-alert-success/>
                        <div class="header">
                            <h2><strong>List</strong> {{$pageTitle}}</h2>
                        </div>
                        @can("create $pageHandler")
                            <button
                                type="button"
                                class="btn btn-default waves-effect m-r-20 float-right"
                                wire:click="add">
                                Add {{$pageTitle}}
                            </button>
                        @endcan
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($users)
                                        @foreach($users as $user)
                                            <tr wire:key="{{ $user->id }}">
                                                <th scope="row">{{ $user->id }}</th>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->roles->first()?->name }}</td>
                                                <td>{{ $user->created_at->diffForHumans() }}</td>
                                                <td>
                                                    @can("delete $pageHandler")
                                                        <button
                                                            class="btn btn-danger btn-icon float-left"
                                                            type="button"
                                                            wire:click="delete({{$user->id}})"
                                                            wire:confirm="Are you sure?">
                                                            <i class="zmdi zmdi-delete"></i></i>
                                                        </button>
                                                    @endcan
                                                    @can("update $pageHandler")
                                                        <button type="button"
                                                                class="btn btn-secondary btn-icon float-left"
                                                                wire:click="edit({{$user->id}})">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="4">
                                                {{ $users->links('livewire::bootstrap') }}
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
    @include("livewire.admin.users.user-modal", ['title' => $pageTitle])
</section>
