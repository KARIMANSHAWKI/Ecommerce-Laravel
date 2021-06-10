function deleteCategory(id) {
    if (confirm("Do you really want to delete this category ?!")) {
        $.ajax({
            url: "/category/" + id,
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
