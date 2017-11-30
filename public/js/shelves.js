window.onload = function() {
    console.log("loading shelves");
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/getListOfShelves',
        type: 'POST',
        contentType: 'application/json',
        success: function(response) {
            //console.log(response);
            var div = document.getElementById("shelfDiv");
            for(var x=0;x<response.length;x++) {
                link = document.createElement("a");
                link.innerHTML = response[x].name;
                console.log(response[x]);
                let temp = response[x].id;
                link.onclick = function() {
                    $.ajax({
                        url: '/setShelf',
                        type: 'POST',
                        contentType: 'application/json',
                        data: JSON.stringify({
                            'shelfId': temp,
                        }),
                        success: function() {
                            window.location.href = '/books';
                        },
                        error: function(xhr, status, error) {
                            console.log("error");
                        },
                    });
                }
                link.href = "";
                div.append(link);
                var line = document.createElement("br");
                div.append(line);
            }
        },
        error: function(xhr, status, error) {
                console.log("error");
        },
    });
}
