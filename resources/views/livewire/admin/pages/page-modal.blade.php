<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="new_user_form" wire:submit.prevent="upsert">
                <div class="modal-body">
                    <div class="card">
                        <div class="header">
                            <h2><strong>{{ $editId ? 'Update' : 'New' }}</strong> {{ $title }}</h2>
                        </div>
                        <div class="body">
                            <div class="form-group form-float">
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Name*"
                                    wire:model="name"/>
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
                                    placeholder="Handle*"
                                    wire:model="handle"/>
                                @error('handle')
                                <label id="handle-error" class="error" for="handle">
                                    {{ $message }}
                                </label>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default btn-round waves-effect">
                        {{ $editId ? 'UPDATE' : 'SAVE' }}
                    </button>
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                        CLOSE
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
