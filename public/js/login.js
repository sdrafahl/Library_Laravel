function login() {
    var user = document.getElementById('username').value;
    var pass = document.getElementById('password').value;
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/loginRequest',
        type: 'POST',
        contentType: 'application/json',
        data: JSON.stringify ({
            username: user,
            password: pass,
        }),
        success: function(json) {
            if(json.success == 'true') {
                console.log("success");
                window.location.href = '/menu';
            }
        },
        error: function(xhr, status, error) {
            console.log("error");
        },
    });
}
