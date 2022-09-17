<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Trainline | Admin</title>
</head>

<body class="mb-48">
    <nav class="flex justify-between items-center mb-4 bg-gray-900 p-5 text-white">
        <a href="/trips" class="text-2xl">Trainline</a>
        <ul class="flex space-x-6 mr-6 text-lg">
            <li>
                <a href="/trips/create"><i class="fa-solid fa-user-plus"></i> Create trip</a>
            </li>
        </ul>
    </nav>
    {{ $slot }}
</body>

</html>
