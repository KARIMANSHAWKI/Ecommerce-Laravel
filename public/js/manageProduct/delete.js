function deleteProduct(id) {
    if (confirm("Do you really want to delete this Product ?!")) {
        $.ajax({
            url: "/product/" + id,
            type: "DELETE",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                $("#sid" + id).fadeOut(500);
            },
        });
    }
}