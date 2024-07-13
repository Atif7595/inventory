//Add Exam ajax
$("#addUser").submit(function(e) {
    e.preventDefault();
    var formData = $(this).serialize();
    const url = window.location.origin + '/add-user'
    $.ajax({
        type: "POST",
        url: url,
        data: formData,
        success: function(response) {
            if (response.success == true) {
                location.reload();
            } else {
                alert(response.message);
            }
        }
    });

});
//Edit Exam
$(".editUserButton").click(function() {
    var id = $(this).attr('data-id');
    const url = window.location.origin + '/get-user-data/' + id;
    $.ajax({
        type: "GET",
        url: url,
        data: id,
        success: function(response) {
            if (response.success == true) {
                $("#userId").val(response.data.id);
                $("#name").val(response.data.name);
                $("#email").val(response.data.email);
                $("#status").val(response.data.status);

            } else {
                alert(response.message)
            }

        }
    });
});
$("#updateUser").submit(function(e) {
    e.preventDefault();
    var formData = $(this).serialize();
    const url = window.location.origin + '/update-user';
    $.ajax({
        type: "POST",
        url: url,
        data: formData,
        success: function(response) {
            if (response.success == true) {
                location.reload();
            } else {
                alert(response.message);
            }
        }
    });
});
//Delete Exam
$(".deleteUser").click(function() {
    var id = $(this).attr('data-id');
    $("#UserIdDelete").val(id);
});

$("#deleteUserData").submit(function(e) {
    e.preventDefault();
    var formData = $(this).serialize();
    const url = window.location.origin + '/delete-user';
    $.ajax({
        type: "POST",
        url: url,
        data: formData,
        success: function(response) {
            if (response.success == true) {
                location.reload();

            } else {
                alert(response.message);
            }

        }
    });

});
