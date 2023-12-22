<section class="content">
    <div class="body_scroll">
        <x-breadcrumb title="{{ $title }}"/>
        <div class="container-fluid">
            <!-- Hover Rows -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <x-alert-success/>
                        <div class="header">
                            <h2>{{ $title }} to <strong>{{ $role->name }}</strong></h2>
                        </div>
                        <a wire:navigate class="btn btn-primary float-right" href="{{ route("list-roles") }}">Back</a>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Page Name</th>
                                        <th>Create</th>
                                        <th>Read</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($pages)
                                        <form wire:submit.prevent="update">
                                            @foreach($pages as $page)
                                                <tr wire:key="{{ $page->id }}">
                                                    <th scope="row">{{ $page->id }}</th>
                                                    <th>{{ $page->name }}</th>
                                                    <td>
                                                        <input
                                                            type="checkbox"
                                                            wire:model="permissions.{{ $page->handle }}.create"
                                                            name="create"/>
                                                    </td>
                                                    <td>
                                                        <input
                                                            type="checkbox"
                                                            wire:model="permissions.{{ $page->handle }}.read"
                                                            name="read"/>
                                                    </td>
                                                    <td>
                                                        <input
                                                            type="checkbox"
                                                            wire:model="permissions.{{ $page->handle }}.update"
                                                            name="update"/>
                                                    </td>
                                                    <td>
                                                        <input
                                                            type="checkbox"
                                                            wire:model="permissions.{{ $page->handle }}.delete"
                                                            name="delete"/>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="6">
                                                    <button
                                                        class="btn btn-raised btn-primary waves-effect"
                                                        type="submit">
                                                        Update
                                                    </button>
                                                </td>
                                            </tr>
                                        </form>
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
