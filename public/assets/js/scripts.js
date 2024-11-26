$(document).ready(function () {
    $(".modal-action").click(function () {
        const url = $(this).data("url");
        $.ajax({
            url: url,
            type: "GET",
            dataType: "html",
            success: function (response) {
                $("#commonModal").html(response);
                $("#commonModal").modal("show");
            }
        });
    });

    $(document).on("change", "#company-select", function () {
        const companyId = $(this).val();
        $.ajax({
            url: "/muhasebe/getLicences",
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
                $("#licence-select").html(html);
            }
        });
    });

    $(document).on("change", "#city-select", function () {
        const cityId = $(this).val();
        $.ajax({
            url: "/muhasebe/getDistricts",
            type: "POST",
            data: {
                city_id: cityId,
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
                $("#district-select").html(html);
            }
        });
    });

    $(".delete-button").click(function () {
        if (confirm("Silmek istediğinize emin misiniz?")) {
            $(this).closest("form").submit();
        } else {
            return false;
        }
    });

    $(".view-file").on("click", function () {
        let url = $(this).data("url");
        let type = $(this).data("type");
        if (type === "application/pdf") {
            $("#fileModal").find(".modal-body").html(`<iframe src="${url}" style="width: 100%; height: 500px;"></iframe>`);
        } else if (type === "image/jpeg" || type === "image/png" || type === "image/jpg" || type === "image/gif") {
            $("#fileModal").find(".modal-body").html(`<img src="${url}" style="width: 100%;">`);
        } else {
            $("#fileModal").find(".modal-body").html(`<div class="alert alert-danger">Dosya Görüntülenemiyor.</div>`);
        }
        $("#fileModal").modal("show");
    });

    $("#report-form").on("change", "input,select", function () {
            $("#report-form").submit();
        }
    );

    $(document).on("change", "#invoice_file", function (event) {
        let fileInput = $(this);
        let file = fileInput[0].files[0];
        let url = fileInput.data("url");

        if (file && url) {
            let form = fileInput.closest("form");
            let csrfToken = form.find('input[name="_token"]').val();

            let formData = new FormData();
            formData.append("file", file);

            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    "X-CSRF-TOKEN": csrfToken
                },
                success: function (data) {
                    $('input[name="number"]').val(data.invoice_number);
                    $('input[name="amount"]').val(data.invoice_amount);
                    $('input[name="date"]').val(data.invoice_date);
                    Swal.fire({
                        icon: "success",
                        title: "Fatura Bilgileri Alındı",
                        showConfirmButton: false,
                        timer: 1500
                    });
                },
                error: function (error) {
                    Swal.fire({
                        icon: "error",
                        title: "Fatura Bilgileri Alınamadı",
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
        }
    });
});
