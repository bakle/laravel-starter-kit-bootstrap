<x-layouts.app>
    <div class="row mt-5">
        <div class="col-6 offset-3">
            <div class="my-5">
                <h1 class="h2 text-secondary">Register</h1>
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" value="{{ old('name') }}" name="name" class="form-control" id="name" aria-describedby="nameHelp">
                    @error('name')
                    <label class="form-label">
                        <small class="text-danger">{{ $message }}</small>
                    </label>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" value="{{ old('email') }}" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                    @error('email')
                    <label class="form-label">
                        <small class="text-danger">{{ $message }}</small>
                    </label>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                    @error('password')
                    <label class="form-label">
                        <small class="text-danger">{{ $message }}</small>
                    </label>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                    @error('password_confirmation')
                    <label class="form-label">
                        <small class="text-danger">{{ $message }}</small>
                    </label>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>

</x-layouts.app>
