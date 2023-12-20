<section class="content">
    <div class="body_scroll">
        <x-breadcrumb title="Edit User"/>

        <div class="container-fluid">
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <x-alert-success />
                        <div class="header">
                            <h2><strong>Edit</strong> User</h2>
                        </div>
                        <div class="body">
                            <form id="new_user_form" wire:submit.prevent="update">
                                <div class="form-group form-float">
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Name*"
                                        wire:model="name"
                                        name="name"/>
                                    @error('name')
                                    <label id="name-error" class="error" for="name">
                                        {{ $message }}
                                    </label>
                                    @enderror
                                </div>
                                <div class="form-group form-float">
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Email*"
                                        autocomplete="off"
                                        wire:model="email"
                                        name="email"/>
                                    @error('email')
                                    <label id="name-error" class="error" for="name">
                                        {{ $message }}
                                    </label>
                                    @enderror
                                </div>
                                <div class="form-group form-float">
                                    <input
                                        disabled
                                        type="password"
                                        class="form-control"
                                        placeholder="Password*"
                                        autocomplete="off"
                                        wire:model="password"
                                        name="password"/>
                                    @error('password')
                                    <label id="name-error" class="error" for="name">
                                        {{ $message }}
                                    </label>
                                    @enderror
                                </div>
                                <button
                                    class="btn btn-raised btn-primary waves-effect"
                                    type="submit">
                                    Update
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
