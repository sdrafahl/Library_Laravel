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
            } else {
                wrongLogin();
            }
        },
        error: function(xhr, status, error) {
            wrongLogin();
        },
    });
}

function wrongLogin() {
    var div = document.getElementById('error');
    var p = document.createElement('p');
    p.innerHTML = "error";
    div.appendChild(p);
}
