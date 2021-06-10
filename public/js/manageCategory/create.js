$(document).ready(function () {
    $("#create").on("click", function (event) {
        event.preventDefault();

        $.ajax({
            url: " /add-category ",
            method: "POST",
            data: new FormData(document.getElementById("category")),
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                $("#category_table tbody").prepend(
                    `<tr><td>${response.id}</td><td>${response.name}</td>
                                <td><img src="images/category/${response.image}" width="120"
                                height="120"/></td> /></tr>`
                );
                $("#categoryModel").modal("toggle");
                $("#category")[0].reset();
            },
        });
    });
});
