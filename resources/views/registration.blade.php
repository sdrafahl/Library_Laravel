<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script type="text/javascript" src="{{ URL::asset('js/jquery.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/registration.js') }}"></script>
    </head>
    <body>
        Username <input type="text" id="username">
        <br>
        Password <input type="text" id="password">
        <br>
        Confirm Password <input type="text" id="password2">
        <br>
        Email <input type="text" id="email">
        <br>
        Phone Number <input type="text" id="phoneNumber">
        <br>
        <input id="checkBox" type="checkbox"> Librarian
        <br>
        <button type="button" id="cancel">Cancel</button>
        <button type="button" onclick="validate()" id="signUp">register</button>
    </body>

</html>
