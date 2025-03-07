<!DOCTYPE html>
<html lang="en">

<head>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <title>What's Ganap?</title>
        <!-- Favicon-->
        <link rel="icon" href="https://th.bing.com/th?id=OIF.6nvTvr%2fTIZgh84SldKBO1w&w=202&h=203&c=7&r=0&o=5&dpr=1.3&pid=1.7" type="image/x-icon">
        
        <!-- Favicon for other sizes (optional) -->
        <link rel="icon" href="https://th.bing.com/th?id=OIF.6nvTvr%2fTIZgh84SldKBO1w&w=202&h=203&c=7&r=0&o=5&dpr=1.3&pid=1.7" sizes="32x32">
        <link rel="icon" href="https://th.bing.com/th?id=OIF.6nvTvr%2fTIZgh84SldKBO1w&w=202&h=203&c=7&r=0&o=5&dpr=1.3&pid=1.7" sizes="16x16">
        
        <!-- Favicon for mobile -->
        <link rel="apple-touch-icon" href="{{ asset('images/favicon.ico') }}">
    
        <!-- Stylesheets -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    </head>


</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">

                <a class="navbar-brand" href="/home"><img
                        src="https://th.bing.com/th?id=OIF.6nvTvr%2fTIZgh84SldKBO1w&w=202&h=203&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt=""
                        class="rounded-circle" style="width: 25px;"> What's Ganap?</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                @if (Route::has('login'))
                                @auth
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/profile">Profile</a> <!-- Replace '/profile' with the actual route -->
                                    </li>
                                    <li class="nav-item">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button class="nav-link btn btn-link" type="submit">Logout</button>
                                        </form>
                                    </li>
                                @else
                                    @if (Route::currentRouteName() !== 'register')
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                                        </li>
                                    @endif
                            
                                    @if (Route::currentRouteName() === 'register')
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                                        </li>
                                    @endif
                                @endauth
                            @endif
                            
                            </ul>
                        </div>
                        
                        
            </div>
        </nav>

        @yield('content')


    </main>
   
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    @yield('scripts')
    {{-- <script>
        function CopyToClipboard(id, btn) {
            var r = document.createRange();
            r.selectNode(document.getElementById(id));
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(r);
            document.execCommand('copy');
            window.getSelection().removeAllRanges();
            document.getElementById(btn).value = "Copied";

        }

        function message($text = '', $msg_type = '') {
            swal($text, {
                icon: $msg_type,
            }).then((confirmed) => {
                window.location.reload();

            });
        }

        function msg($text = '', $msg_type = '') {
            swal($text, {
                icon: $msg_type,
            });
        }
    </script> --}}
   
</body>

</html>

