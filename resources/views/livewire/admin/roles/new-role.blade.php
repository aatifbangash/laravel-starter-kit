<section class="content">
    <div class="body_scroll">
        <x-breadcrumb title="New Role"/>

        <div class="container-fluid">
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <x-alert-success />
                        <div class="header">
                            <h2><strong>New</strong> Role</h2>
                        </div>
                        <div class="body">
                            <form id="new_user_form" wire:submit.prevent="save">
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
                                <button
                                    class="btn btn-raised btn-primary waves-effect"
                                    type="submit">
                                    Add
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
