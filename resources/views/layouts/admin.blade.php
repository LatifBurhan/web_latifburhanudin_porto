<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 dark:bg-gray-900">

    <div class="flex h-screen overflow-hidden">
        @include('partials.admin.sidebar')

        <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden">
            @include('partials.admin.navbar')

            <main class="w-full grow p-6">
                @yield('content')
            </main>
        </div>
    </div>

</body>
</html>
