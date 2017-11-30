<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script type="text/javascript" src="{{ URL::asset('js/jquery.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/shelves.js') }}"></script>
    </head>
    <body>
        Shelf <input type="text" id="username">
        <br>
        <button type="button" id="cancel" onclick="addShelf()">Add Shelf</button>
        <br>
        @if(Session::has('name'))
        <br>
        <div id="shelfDiv">
        </div>
        @endif
    </body>

</html>
