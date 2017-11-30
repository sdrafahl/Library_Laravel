function deleteBook() {
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var name = document.getElementById('name').value;
    $.ajax({
        url: '/deleteBook',
        type: 'POST',
        contentType: 'application/json',
        data: JSON.stringify({
            'name': name,
        }),
        success: function(response) {
            console.log("success");
        },
        error: function(xhr, status, error) {
                console.log("error");
        },
    });
}
