$(document).ready(function () {
    let isEditMode = false;

    $("#productModal").on("hidden.bs.modal", function () {
        isEditMode = false;
        $("#product_index").val("");
        $("#productModalLabel").text("Add Product");
    });

    $(document).on("click", ".btn-edit", function () {
        const product = $(this).data("product");
        const index = $(this).data("index");

        $("#productModalLabel").text("Edit Product");
        $("#idProduct").val(index);
        $('input[name="product_name"]').val(product.product_name);
        $('input[name="quantity"]').val(product.quantity);
        $('input[name="price"]').val(product.price);

        isEditMode = true;

        $("#productModal").modal("show");
    });

    $("#product-form").on("submit", function (e) {
        e.preventDefault();

        const $form = $(this);
        const $submitBtn = $form.find('button[type="submit"]');
        const url = isEditMode ? "/products/update" : "/products";

        $submitBtn.prop("disabled", true).text("Saving...");

        $.ajax({
            url: url,
            method: "POST",
            data: $form.serialize(),
            success: function (res) {
                $("#productModal").modal("hide");
                $("#productTbody").html(res.html);
                $form[0].reset();
                isEditMode = false;
                $("#productModalLabel").text("Add Product");
            },
            complete: function () {
                $submitBtn.prop("disabled", false).text("Save Product");
            },
        });
    });
});
