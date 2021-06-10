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
            beforeSend: function () {
                $(document).find("span.error-text").text("");
            },
            success: function (response) {
                if (response.status==0) {
                    $.each(response.error, function (prefix, val) {
                        $("span." + prefix + "_error").text(val[0]);
                    });
                }else{
                $("#sid" + response.data.id + " td:nth-child(1)").text(response.data.id);
                $("#sid" + response.data.id + " td:nth-child(2)").text(
                    response.data.name
                );
                $("#sid" + response.data.id + " td:nth-child(3)").text(
                    response.data.email
                );
                // $("#sid" + response.id + "td:nth-child(4)").text(response.name);
                $("#store_image").html(
                    `<img src="{{ asset('../../images/user/${response.data.image}') }}" width="100" style="border-radius:50%">`
                );

                $("#userUpdateModel").modal("toggle");
                $("#userEditForm")[0].reset();
            }
            }
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
