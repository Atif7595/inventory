//Add Exam ajax
$("#addCategory").submit(function(e) {
    e.preventDefault();
    var formData = $(this).serialize();
    const url = window.location.origin + '/add-category'
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
$(".editCategoryButton").click(function() {
    var id = $(this).attr('data-id');
    const url = window.location.origin + '/get-category-data/' + id;
    $.ajax({
        type: "GET",
        url: url,
        data: id,
        success: function(response) {
            if (response.success == true) {
                $("#idEdit").val(response.data.id);
                $("#categoryNameEdit").val(response.data.name);
                $("#categoryStatusEdit").val(response.data.status);

            } else {
                alert(response.message)
            }

        }
    });
});
$("#editCategory").submit(function(e) {
    e.preventDefault();
    var formData = $(this).serialize();
    const url = window.location.origin + '/edit-category';
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
$(".categoryExam").click(function() {
    var id = $(this).attr('data-id');
    $("#categoryIdDelete").val(id);
});

$("#deleteCategoryId").submit(function(e) {
    e.preventDefault();
    var formData = $(this).serialize();
    const url = window.location.origin + '/delete-category';
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
