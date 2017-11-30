function addBook() {
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var name = document.getElementById('name').value;
    var author = document.getElementById('author').value;
    var shelf = document.getElementById('shelf').value;
    console.log(name);
    $.ajax({
        url: '/addBook',
        type: 'POST',
        contentType: 'application/json',
        data: JSON.stringify({
            'book_name': name,
            'author': author,
            'shelf': shelf,
        }),
        success: function(response) {
            console.log("success");
        },
        error: function(xhr, status, error) {
                console.log("error");
        },
    });
}
