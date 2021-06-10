$(document).ready(function () {
    $("#addForm").on("click", function (event) {
        event.preventDefault();

        $.ajax({
            url: "/adduser",
            method: "POST",
            data: new FormData(document.getElementById("addUserForm")),
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                alert(response.image);
                $("#user_table tbody").prepend(
                    `<tr><td>${response.id}</td><td>${response.name}</td>
                        <td>${response.email}</td><td><img src="../../images/user/${response.image}" class="img-thumbnail" width="300"></td></tr>`
                );
                $("#userModel").modal("toggle");
                $("#addUserForm")[0].reset();
            },
        });
    });
});
