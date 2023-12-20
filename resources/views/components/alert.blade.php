<div>
    @foreach ($errors->all() as $error)
        <p class="alert alert-danger" role="alert">{{ $error }}</p>
    @endforeach
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
</div>
