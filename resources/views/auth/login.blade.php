<x-layouts.app>
    <div class="row mt-5">
        <div class="col-6 offset-3">
            <div class="my-5">
                <h1 class="h2 text-secondary">Log in</h1>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
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
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" name="remember" id="remember_me">
                    <label class="form-check-label" for="remember_me">Remember me</label>
                </div>
                <button type="submit" class="btn btn-primary">Log in</button>
            </form>
        </div>
    </div>

</x-layouts.app>
