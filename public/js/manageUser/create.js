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
            beforeSend: function () {
                $(document).find("span.error-text").text("");
            },
            success: function (response) {
                if (response.status==0) {
                    $.each(response.error, function (prefix, val) {
                        $("span." + prefix + "_error").text(val[0]);
                    });
                } else {
                    $("#user_table tbody").prepend(
                        `<tr><td>${response.data.id}</td><td>${response.data.name}</td>
                        <td>${response.data.email}</td><td><img src="../../images/user/${response.data.image}" class="img-thumbnail" width="300"></td></tr>`
                    );
                    $("#userModel").modal("toggle");
                    $("#addUserForm")[0].reset();
                }
            },
        });
    });
});
