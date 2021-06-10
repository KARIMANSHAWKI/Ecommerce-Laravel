$(document).ready(function () {
    // &&&&&&&&&&&&&&&&&& Udate Category &&&&&&&&&&&&&&&&&&& //
    $("#categoryEditForm").on("submit", function (e) {
        e.preventDefault();

        let formData = new FormData(document.getElementById("categoryEditForm"));

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        formData.append("_method", "PUT");

        $.ajax({
            url: "/updateCategory",
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
                $("#store_image").html(
                    `<img src="{{ asset('../../images/category/${response.image}') }}" width="100" style="border-radius:50%">`
                );
                $("#categoryEditModel").modal("toggle");
                $("#categoryEditForm")[0].reset();
            },
        });
    });
});

// &&&&&&&&&&&&&&&& Get Data To Form To Be updated &&&&&&&&&&&&&&&&&&&
function editCategory(id) {
    $.get("/category/" + id, function (category) {
        $("#id").val(category.id);
        $("#name2").val(category.name);
        $("#categoryEdit").modal("toggle");
    });
}
