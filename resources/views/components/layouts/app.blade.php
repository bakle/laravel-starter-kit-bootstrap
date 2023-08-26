<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    >
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $title ?? config('app.name') }}</title>
</head>
<body>
<section class="container" id="app">
    <x-navbar/>
    {{ $slot }}

    @if(session()->has('success'))
        <div class="position-absolute bottom-0 end-5">
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
                <a href="#" class="btn-close ms-3" data-bs-dismiss="alert" aria-label="Close"></a>
            </div>
        </div>
    @endif
</section>
</body>
</html>
