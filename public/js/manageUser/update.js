$(document).ready(function () {
    // &&&&&&&&&&&&&&&&&&&  Update User Form &&&&&&&&&&&&&&& //
    $("#updateUserBtn").on("click", function (e) {
        e.preventDefault();
        let formData = new FormData(document.getElementById("userEditForm"));
        for (var pair of formData.entries()) {
            console.log(pair[0] + ", " + pair[1]);
        }
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        formData.append("_method", "PUT");
        $.ajax({
            url: "/update-user",
            type: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                console.log(response);
                $("#sid" + response.id + " td:nth-child(1)").text(response.id);
                $("#sid" + response.id + " td:nth-child(2)").text(
                    response.name
                );
                $("#sid" + response.id + " td:nth-child(3)").text(
                    response.email
                );
                // $("#sid" + response.id + "td:nth-child(4)").text(response.name);
                $("#store_image").html(
                    `<img src="{{ asset('../../images/user/${response.image}') }}" width="100" style="border-radius:50%">`
                );

                $("#userUpdateModel").modal("toggle");
                $("#userEditForm")[0].reset();
            },
        });
    });

    // &&&&&&&&&&&&&&& Click image update &&&&&&&&&&&&&&&/
    $(document).on("click", "#change_picture_btn", function () {
        $("#imageUser").click();
    });
});

// &&&&&&&&&&&&&&&&& Get User Data In Form To Be Updated &&&&&&&&&&&&& //
function editUser(id) {
    $.get("/user/" + id, function (user) {
        $("#idUser").val(user.id);
        $("#nameUser").val(user.name);
        $("#emailUser").val(user.email);
        $("#store_image").html(
            `<img src="{{ asset('images/user/${user.image}') }}" width="100" style="border-radius:50%">`
        );
        $("#userUpdateModel").modal("toggle");
    });
}
