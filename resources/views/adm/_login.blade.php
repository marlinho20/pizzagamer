<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ghost Gamer | Admin</title>

    <!-- App Style -->
    <link rel="stylesheet" href="{{ url(mix('assets/css/adm/app.css')) }}">
</head>
<body id="login_body">
    @include('adm.includes.ajax_load')

    <main>
        <area class="cover">
        <div class="area-form">
            <form action="{{ route('admin.login') }}" method="post">
                @csrf

                <h1>Ghost Gamer Adm</h1>
                
                <div class="ajax_response"></div>

                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" placeholder="seu-email@exemplo.com" value="ghostgamer@gmail.com">
    
                <label for="password">Senha</label>
                <input type="password" name="password" id="password" placeholder="********" value="123456789">
    
                <div class="remember">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Lembre de mim</label>
                </div>
    
                <input type="submit" value="Entrar">
            </form>
        </div>
    </main>

    <!-- JQuery -->
    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
    <!-- JQuery Ui -->
    <script src="{{ url('assets/js/jquery-ui.js') }}"></script>
    <!-- App Script -->
    <script src="{{ url(mix('assets/js/adm/login.js')) }}"></script>
</body>
</html>