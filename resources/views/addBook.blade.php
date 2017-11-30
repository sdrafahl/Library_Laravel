<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script type="text/javascript" src="{{ URL::asset('js/jquery.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/addbooks.js') }}"></script>
    </head>
    <body>
        @if(Session::has('name'))
            <input type="text" id="name" name="name" placeholder="Name">
            <input type="text" id="author" name="author" placeholder="Author">
            <input type="text" id="shelf" name="shelf" placeholder="Shelf Name">
            <button type="button" onclick="addBook()">Add Books</button>
        @endif
    </body>

</html>
