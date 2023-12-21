<section class="content">
    <div class="body_scroll">
        <x-breadcrumb title="Pages"/>
        <div class="container-fluid">
            <!-- Hover Rows -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <x-alert-success/>
                        <div class="header">
                            <h2><strong>List</strong> Pages</h2>
                        </div>

                        <button
                            type="button"
                            class="btn btn-default waves-effect m-r-20 float-right"
                            wire:click="add">
                            Add Page
                        </button>
                        {{--                        <livewire:admin.pages.page-modal />--}}
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Handle</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($pages->isNotEmpty())
                                        @foreach($pages as $page)
                                            <tr wire:key="{{ $page->id }}">
                                                <th scope="row">{{ $page->id }}</th>
                                                <td>{{ $page->name }}</td>
                                                <td>{{ $page->handle }}</td>
                                                <td>{{ $page->created_at->diffForHumans() }}</td>
                                                <td>
                                                    <button
                                                        class="btn btn-danger btn-icon float-left"
                                                        type="button"
                                                        wire:click="delete({{$page->id}})"
                                                        wire:confirm="Are you sure?"
                                                    >
                                                        <i class="zmdi zmdi-delete"></i></i>
                                                    </button>
                                                    <button type="button"
                                                            class="btn btn-secondary btn-icon float-left"
                                                            wire:click="edit({{$page->id}})">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5">Not data found.</td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td colspan="4">
                                            {{ $pages->links('livewire::bootstrap') }}
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

    @include("livewire.admin.pages.page-modal", ['title' => 'Page'])
</section>

