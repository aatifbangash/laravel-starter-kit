<section class="content">
    <div class="body_scroll">
        <x-breadcrumb title="Users"/>
        <div class="container-fluid">
            <!-- Hover Rows -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <x-alert-success />
                        <div class="header">
                            <h2><strong>List</strong> Users</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
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
                                                <td>{{ $user->created_at->diffForHumans() }}</td>
                                                <td>
                                                    <a
                                                        class="btn btn-danger btn-icon float-right"
                                                        type="button"
                                                        wire:click="delete({{$user->id}})"
                                                        wire:confirm="Are you sure?"
                                                    >
                                                        <i class="zmdi zmdi-delete"></i></i>
                                                    </a>
                                                    <a
                                                        class="btn btn-secondary btn-icon float-right"
                                                        wire:navigate
                                                        href="{{ route('edit-user', $user->id) }}"
                                                    >
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </a>
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
                                            {{ $users->links('livewire::bootstrap') }}
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
</section>
