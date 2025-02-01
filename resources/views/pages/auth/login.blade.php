<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!--
        Include Style
    -->
    @include('includes.editor.style')

</head>

<body class="bg-gradient-primary">

    <!--
        Kontainer Utama
    -->
    <div class="container">
        <center>
            <!--
                Kartu Login
            -->
            <div class="card o-hidden border-0 shadow-lg my-5 col-lg-5 center">
                <div class="card-body p-0">
                    <!--
                        Nested Row dalam Card Body
                    -->
                    <div class="p-5">
                        <!--
                            Judul dan Deskripsi
                        -->
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                        </div>

                        <!--
                            Form Login
                        -->
                        <form method="POST" class="user" action="{{ route('login.auth') }}">
                            @csrf
                            <!--
                                Input Username
                            -->
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="username"
                                    placeholder="Enter username">
                            </div>

                            <!--
                                Input Password
                            -->
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" name="password"
                                    placeholder="Password">
                            </div>

                            <!--
                                Tombol Login
                            -->
                            <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </center>

    </div>

    <!--
        Include Script
    -->
    @include('includes.editor.script')

    <!--
        Pesan Error Login
    -->
    @if (session()->has('LoginError'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('LoginError') }}',
            });
        </script>
    @endif
</body>

</html>
