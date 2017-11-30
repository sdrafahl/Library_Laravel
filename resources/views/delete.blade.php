<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script type="text/javascript" src="{{ URL::asset('js/jquery.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/deletebooks.js') }}"></script>
    </head>
    <body>
        @if(Session::has('name'))
            <input type="text" id="name" name="name" placeholder="Name">
            <button type="button" onclick="deleteBook()">Delete Book</button>
        @endif
    </body>

</html>
