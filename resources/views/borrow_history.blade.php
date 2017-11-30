<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script type="text/javascript" src="{{ URL::asset('js/jquery.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/deletebooks.js') }}"></script>
    </head>
    <body>
        @foreach (DB::table('loans')->get() as $loan)
            User ID: {{$loan->user_id}}
            Book ID: {{$loan->book_id}}
            Due Date: {{$loan->due_date}}
            Returned Date: {{$loan->returned_date}}
            <br>
        @endforeach
    </body>

</html>
