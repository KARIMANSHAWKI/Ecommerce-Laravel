function deleteUser(id) {
    if (confirm("Do you really want to delete this user ?!")) {
        $.ajax({
            url: "/user/" + id,
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
