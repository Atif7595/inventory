//Add Exam ajax
$("#addInventory").submit(function(e) {
    e.preventDefault();
    var formData = $(this).serialize();
    const url = window.location.origin + '/add-inventory'
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
$(".editStockButton").click(function() {
    var id = $(this).attr('data-id');
    const url = window.location.origin + '/get-inventory-data/' + id;
    $.ajax({
        type: "GET",
        url: url,
        data: id,
        success: function(response) {
            if (response.success == true) {
                $("#idEdit").val(response.data.id);
                $("#nameEdit").val(response.data.item_name);
                $("#descriptionEdit").val(response.data.description);
                $("#quantityEdit").val(response.data.quantity);
                $("#priceEdit").val(response.data.price);
                $("#localEdit").val(response.data.local);
                $("#categoryEdit").val(response.data.category_id);
                $("#statusEdit").val(response.data.status);
                $("#dateEdit").val(response.data.date);
                $("#stockEdit").val(response.data.id);

            } else {
                alert(response.message)
            }

        }
    });
});
$("#editInventory").submit(function(e) {
    e.preventDefault();
    var formData = $(this).serialize();
    const url = window.location.origin + '/edit-inventory';
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
$(".deleteInventory").click(function() {
    var id = $(this).attr('data-id');
    $("#InventoryIdDelete").val(id);
});

$("#deleteInventoryId").submit(function(e) {
    e.preventDefault();
    var formData = $(this).serialize();
    const url = window.location.origin + '/delete-inventory';
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
