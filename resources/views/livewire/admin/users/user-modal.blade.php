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
                                    type="password"
                                    class="form-control"
                                    placeholder="Password*"
                                    autocomplete="off"
                                    {{ $editId ? "disabled" : "" }}
                                    wire:model="password"
                                    name="password"/>
                                @error('password')
                                <label id="name-error" class="error" for="name">
                                    {{ $message }}
                                </label>
                                @enderror
                            </div>
                            <div class="form-group form-float">
                                <select
                                    name="role"
                                    wire:model="role"
                                    class="form-control show-tick">
                                    <option value="">Select Role*</option>
                                    @if($roles->isNotEmpty())
                                        @foreach($roles as $role)
                                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('role')
                                <label id="role-error" class="error" for="role">
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
