window.onload = function() {
    console.log("loading shelves");
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/getBookList',
        type: 'POST',
        contentType: 'application/json',
        success: function(response) {
            console.log(response);
            for(var x=0;x<response.length;x++) {
                var table = document.getElementById('table');
                var tr = document.createElement("tr");
                var th1 = document.createElement("th");
                var th2 = document.createElement("th");
                var th3 = document.createElement("th");
                var th4 = document.createElement("th");
                var th5 = document.createElement("th");
                let data = response[x];
                th1.innerHTML = data.id;
                th2.innerHTML = data.book_name;
                th3.innerHTML = data.author;
                if(data.availability == 1) {
                    th4.innerHTML = "Yes";
                    var button = document.createElement("button");
                    button.innerHTML = "Borrow";
                    button.onclick = function() {
                        console.log(data);
                        $.ajax({
                            url: '/borrowBook',
                            type: 'POST',
                            contentType: 'application/json',
                            data: JSON.stringify({
                                id: data.id,
                            }),
                            success: function() {
                                location.reload();
                            },
                            error: function (xhr, status, error) {
                                console.log("error");
                            },
                        });
                    }
                    th5.append(button);
                } else {
                    th4.innerHTML = "No";
                }
                tr.append(th1);
                tr.append(th2);
                tr.append(th3);
                tr.append(th4);
                tr.append(th5);
                table.append(tr);
            }
        },
        error: function(xhr, status, error) {
                console.log("error");
        },
    });
}
