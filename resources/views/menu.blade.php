<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script type="text/javascript" src="{{ URL::asset('js/jquery.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/menu.js') }}"></script>
    </head>
    <body>
        @if(Session::has('name'))
            <div class="alert alert-danger">
            Welcome {{ Session::get('name') }}
            </div>
        @endif
        <br>
        @if(Session::has('lib'))
            @if(Session::get('lib') == '0')
                <div class="alert alert-danger">
                Student View
                </div>
            @endif
            @if(Session::get('lib') == 1)
                <div class="alert alert-danger">
                Librarian View
                </div>
                <a href="/add_books">Add Books</a>
                <br>
                <a href="/delete_books">Delete Books</a>
                <br>
                <a href="/view_all_shelves">View All Shelves</a>
                <br>
            @endif
        @endif
        <a href="/shelves">View all Shelves</a>
    </body>

</html>
