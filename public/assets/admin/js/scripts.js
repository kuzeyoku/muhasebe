$(document).ready(function () {
    $("#create_button").click(function () {
        const url = $(this).data("url");
        $.ajax({
            url: url,
            type: "GET",
            dataType: "html",
            success: function (response) {
                $("#createModal").html(response);
                $("#createModal").modal("show");
            }
        });
    });

    $(".edit_button").on("click", function () {
        const url = $(this).data("url");
        $.ajax({
            url: url,
            type: "GET",
            dataType: "html",
            success: function (response) {
                $("#editModal").html(response);
                $("#editModal").modal("show");
            }
        });
    });

    $(document).on("change", "#company_select", function () {
        const companyId = $(this).val();
        $.ajax({
            url: "/admin/getLicences",
            type: "POST",
            data: {
                company_id: companyId,
                _token: $("input[name='_token']").val()
            },
            dataType: "json",
            success: function (response) {
                let html = "<option value=''>Seçiniz</option>";
                for (const id in response) {
                    if (response.hasOwnProperty(id)) {
                        const name = response[id];
                        html += `<option value="${id}">${name}</option>`;
                    }
                }
                $("#licence_select").html(html);
            }
        });
    });

    $(".delete_button").click(function () {
        if (confirm("Silmek istediğinize emin misiniz?")) {
            $(this).closest("form").submit();
        } else {
            return false;
        }
    });

    $(document).on("click", ".image-delete-button", function () {
        $(this).closest("#image").html('<span>Resmi Kaldırmak İçin Kaydedin</span><input type="hidden" name="delete_image" value="1">');
    });

});
