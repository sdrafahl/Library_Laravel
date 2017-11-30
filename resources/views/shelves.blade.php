<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script type="text/javascript" src="{{ URL::asset('js/jquery.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/shelves.js') }}"></script>
    </head>
    <body>
        @if(Session::has('name'))
        <div id="shelfDiv">

        </div>
        @endif
    </body>

</html>
