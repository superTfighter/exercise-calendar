<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Your Exercise calendar</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;700;900&display=swap"
        rel="stylesheet">

    {{-- <link href="css/bootstrap.min.css" rel="stylesheet"> --}}
    {{-- <link href="css/bootstrap-icons.css" rel="stylesheet"> --}}

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
    <!--

TemplateMo 567 Nomad Force

https://templatemo.com/tm-567-nomad-force

-->
</head>

<body>

    <main>
        <nav class="navbar navbar-expand-lg bg-light shadow-lg">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <strong>Your Exercise calendar</strong>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                @include('layout.header._login')
        </nav>

        @yield('content')

        
    </main>

    <footer class="site-footer">
        <div class="container">
            <div class="row">

                <div class="col-12">

                </div>

                <div class="col-6">
                    <small class="copyright-text mb-0">Copyright © Nomad Force 2021<small>

                            <br><br>Design: <a href="https://templatemo.com/page/1"
                                target="_parent">TemplateMo</a><br><br>

                            Distributed By: <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
                            </p>

                </div>

                <div class="col-lg-3 col-5 ms-auto">
                    <ul class="social-icon">
                        <li><a href="#" class="social-icon-link bi-facebook"></a></li>

                        <li><a href="#" class="social-icon-link bi-twitter"></a></li>

                        <li><a href="#" class="social-icon-link bi-whatsapp"></a></li>

                        <li><a href="#" class="social-icon-link bi-instagram"></a></li>

                        <li><a href="#" class="social-icon-link bi-youtube"></a></li>
                    </ul>
                </div>

            </div>
            </section>
    </footer>

    <script>
       
    </script>

    <!-- JAVASCRIPT FILES -->

    @section('scripts')
        
    @endsection


</body>

</html>
