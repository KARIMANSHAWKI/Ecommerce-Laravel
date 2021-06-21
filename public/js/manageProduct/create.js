$(document).ready(function () {
    $("#createForm").on("click", function (event) {
        event.preventDefault();

        $.ajax({
            url: "/addProduct",
            method: "POST",
            data: new FormData(document.getElementById("addProductForm")),
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
                    $("#product_table tbody").prepend(
                        `<tr><td>${response.data.id}</td><td>${response.data.name}</td>
                        <td>${response.data.descriptin}</td><td>${response.data.price}</td><td><img src="../../images/product/${response.data.image}" class="img-thumbnail" width="300"></td></tr>`
                    );
                    $("#productModel").modal("toggle");
                    $("#addProductForm")[0].reset();
                }
            },
        });
    });
});
