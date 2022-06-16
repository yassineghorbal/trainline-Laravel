<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Trainline</title>
</head>

<body class="mb-48">
    <nav class="flex justify-between items-center mb-4 bg-gray-900 p-5 text-white">
        <a href="/" class="text-2xl">Trainline</a>
        <ul class="flex space-x-6 mr-6 text-lg">
            @auth
                <li class="text-sm">
                    <span class="uppercase">
                        Welcome, {{ auth()->user()->name }}
                    </span>
                </li>
                <li class="text-sm">
                    <a href="/tickets" class="hover:text-laravel"><i class="fa-solid fa-gear"></i>
                        Manage Tickets</a>
                </li>
                <li class="text-sm">
                    <form class="inline" method="POST" action="/logout">
                        @csrf
                        <button type="submit"><i class="fa-solid fa-sign-out-alt"></i>
                            Logout</button>
                    </form>
                </li>
            @else
                <li class="text-sm">
                    <a href="/register"><i class="fa-solid fa-user-plus"></i> Register</a>
                </li>
                <li class="text-sm">
                    <a href="/login"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login</a>
                </li>
            @endauth
        </ul>
    </nav>
    {{ $slot }}

    {{-- flash message --}}
    <x-flash-message />
</body>

</html>
