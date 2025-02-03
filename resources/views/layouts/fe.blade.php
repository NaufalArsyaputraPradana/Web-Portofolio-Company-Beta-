<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Techarea - Digital Solutions</title>

    {{-- Style --}}
    @include('includes.fe.style')

</head>

<body>

    <!-- Navigation-->
    @include('includes.fe.navbar')
    <div class="site-container">
        <!-- Main Content -->
        @yield('content')

        <!-- Footer-->
        @include('includes.fe.footer')
    </div>

    @include('includes.fe.script')
    @yield('script')

</body>

</html>
