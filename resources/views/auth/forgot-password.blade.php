<x-layouts.app>
    <div class="row mt-5">
        <div class="col-6 offset-3">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="my-5">
                <h1 class="h2 text-secondary">Reset password</h1>
            </div>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" required name="email" class="form-control" id="email" aria-describedby="emailHelp">
                    @error('email')
                    <label class="form-label">
                        <small class="text-danger">{{ $message }}</small>
                    </label>
                    @enderror
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Send password link</button>
                </div>
            </form>
        </div>
    </div>

</x-layouts.app>
