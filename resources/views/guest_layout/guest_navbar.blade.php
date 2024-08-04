<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
</head>

<body class="bg-slate-300">
    <div class="min-h-full">
        <nav class="bg-gradient-to-r from-blue-500 to-purple-500 sticky top-0">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <a href="/"
                                class="text-xl font-extrabold text-red-600 underline decoration-double">LISTRIK<span
                                    class="text-emerald-400">JETREK</span></a>
                        </div>
                        <div class="hidden md:block">

                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">

                            <!-- Log out -->
                            <div class="relative ml-3">
                                <div>
                                    <a href="/login"
                                        class="relative flex max-w-xs items-center bg-light hover:bg-black-700 hover:text-white"><i
                                            data-feather="log-in"></i>Masuk</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <div class="md:hidden" id="mobile-menu">
                <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <a href="/registrasiuser"
                        class="block rounded-md px-3 py-2 text-base font-medium text-black-300 hover:bg-black-700 hover:text-white">Login</a>
                </div>
            </div>
        </nav>

        <div>
            @yield('isi')
        </div>
    </div>

    <script>
        feather.replace();
    </script>
</body>
