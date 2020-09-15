$(document).ready(function() {
    $("#submit_sort").click(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/sort/submit',
            method: 'post',
            data: { "sort":'submission_date' },
            success: function (data)
            {
                console.log(data)
                $("#ticket_container").empty();
                data.forEach(ticket => {
                    $("#ticket_container").append(
                    "<div class='card my-4'>"+
                        "<div class='card-header'>"+
                        "<h5 class='font-weight-bold'>Username: " + ticket.name + " </h5>"+
                    "</div>"+
                    "<div class='card-body'>"+
                        "<p><b>Subject: </b>"+ ticket.subject +"</p>"+
                    "<hr>"+
                        "<p style='white-space: pre-line'><b> Description:</b> "+ ticket.description +"</p>"+
                    "<hr>"+
                        "<div>"+
                            "<p style='padding: 0; margin: 0'><b>Submitted at: </b>"+ ticket.submission_date +"</p><br>"+
                            "<p style='padding: 0; margin: 0'><b>Due date at: </b> "+ ticket.due_date +"</p>"+
                        "</div>"+
                    "</div>"+
                    "</div>"
                    )
                });
            },
            error: function (data)
            {
                console.log('Error:', data.responseText);
            }
        });
    });

    $("#due_sort").click(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/sort/due',
            method: 'post',
            data: { "sort":'due_date' },
            success: function (data)
            {
                console.log(data)
                $("#ticket_container").empty();
                data.forEach(ticket => {
                    $("#ticket_container").append(
                        "<div class='card my-4'>"+
                        "<div class='card-header'>"+
                        "<h5 class='font-weight-bold'>Username: " + ticket.name + " </h5>"+
                        "</div>"+
                        "<div class='card-body'>"+
                        "<p><b>Subject: </b>"+ ticket.subject +"</p>"+
                        "<hr>"+
                        "<p style='white-space: pre-line'><b> Description:</b> "+ ticket.description +"</p>"+
                        "<hr>"+
                        "<div>"+
                        "<p style='padding: 0; margin: 0'><b>Submitted at: </b>"+ ticket.submission_date +"</p><br>"+
                        "<p style='padding: 0; margin: 0'><b>Due date at: </b> "+ ticket.due_date +"</p>"+
                        "</div>"+
                        "</div>"+
                        "</div>"
                    )
                });
            },
            error: function (data)
            {
                console.log('Error:', data.responseText);
            }
        });
    });


    $(".customer").click(function() {
        var customer_id = this.value;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/customer',
            method: 'post',
            data: { "customer": customer_id },
            success: function (data)
            {
                console.log(data)
                $("#ticket_container").empty();
                data.forEach(ticket => {
                    $("#ticket_container").append(
                        "<div class='card my-4'>"+
                        "<div class='card-header'>"+
                        "<h5 class='font-weight-bold'>Username: " + ticket.name + "</h5>"+
                        "</div>"+
                        "<div class='card-body'>"+
                        "<p><b>Subject: </b>"+ ticket.subject +"</p>"+
                        "<hr>"+
                        "<p style='white-space: pre-line'><b> Description:</b> "+ ticket.description +"</p>"+
                        "<hr>"+
                        "<div>"+
                        "<p style='padding: 0; margin: 0'><b>Submitted at: </b>"+ ticket.submission_date +"</p><br>"+
                        "<p style='padding: 0; margin: 0'><b>Due date at: </b> "+ ticket.due_date +"</p>"+
                        "</div>"+
                        "</div>"+
                        "</div>"
                    )
                });
            },
            error: function (data)
            {
                console.log('Error:', data.responseText);
            }
        });
    });
})
