<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script type="text/javascript" src="{{ URL::asset('js/jquery.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/login.js') }}"></script>
    </head>
    <body>
        <b> Login </b>
        Username <input type="text" id="username">
        <br>
        Password <input type="text" id="password">
        <br>
        <button type="button" id="cancel">Cancel</button>
        <button type="button" onclick="login()" id="login">Login</button>
    </body>

</html>
