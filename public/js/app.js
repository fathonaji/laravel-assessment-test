$(document).ready(function () {
    $("#product-form").on("submit", function (e) {
        e.preventDefault();

        const form = $(this);
        const submitBtn = form.find('button[type="submit"]');

        submitBtn.prop("disabled", true).text("Saving...");

        $.ajax({
            url: "/products",
            method: "POST",
            data: form.serialize(),
            success: function (res) {
                $("#productModal").modal("hide");
                $("#productTbody").html(res.html);
                form[0].reset();
                $("#productModalLabel").text("Add Product");
            },
            complete: function () {
                submitBtn.prop("disabled", false).text("Save Product");
            },
        });
    });
});
