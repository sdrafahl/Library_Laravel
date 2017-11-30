<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script type="text/javascript" src="{{ URL::asset('js/jquery.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/books.js') }}"></script>
        <style>
            th {size: 200}
        </style>
    </head>
    <body>
        @if(Session::has('name'))
        <table id="table" style="width:100%">
          <tr>
            <th>Book Id</th>
            <th>Book Name</th>
            <th>Author</th>
            <th>Availibility</th>
            <th>Borrow?</th>
          </tr>
        </table>
        @endif
    </body>

</html>
