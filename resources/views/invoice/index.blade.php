@extends("layouts.main")
@section("title", "Faturalar")
@section("button")
    <button data-url="{{route("invoice.create")}}" class="btn btn-sm btn-blue modal-action">Fatura Ekle
    </button>
@endsection
@section("content")
    <table class="table table-striped border">
        <thead class="table-light">
        <tr>
            <th>Firma Ünvanı</th>
            <th>Firma Telefon</th>
            <th>Fatura Numarası</th>
            <th>Fatura Tarihi</th>
            <th>Fatura Tutarı</th>
            <th>Fatura Tipi</th>
            <th>Son Ödeme Tarihi</th>
            <th>Fatura Durumu</th>
            <th class="text-end">İşlemler</th>
        </tr>
        </thead>
        <tbody>
        @foreach($invoices as $invoice)
            <tr class="bg-{{$invoice->type == "income" ? "soft-success":"soft-danger"}}">
                <td>
                    {{$invoice->company->name}}
                </td>
                <td>
                    {{$invoice->company->phone}}
                </td>
                <td>
                    {{$invoice->number}}
                </td>
                <td>
                    {{$invoice->date}}
                </td>
                <td>
                    {{$invoice->amount}}
                </td>
                <td>
                    {{$invoice->typeName}}
                </td>
                <td>
                    {{$invoice->due_date ?? "-"}}
                </td>
                <td>
                    <strong
                        class="text-{{$invoice->status == "paid" ? "success" : "danger"}}">{{$invoice->statusName}}</strong>
                </td>
                <td class=" text-end">
                    <button type="button" data-url="{{route("invoice.edit", $invoice)}}"
                            class="btn btn-sm btn-blue modal-action"><i
                            class="las la-pen"></i></button>
                    {{html()->form("DELETE", route("invoice.destroy", $invoice))->class("d-inline")->open()}}
                    <button type="button" class="btn btn-sm btn-danger delete-button"><i class="las la-trash-alt"></i>
                    </button>
                    {{html()->form()->close()}}
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
    <div class="float-end">
        {{$invoices->links("pagination::bootstrap-4")}}
    </div>
@endsection
@push("script")
    <script>
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
            $(document).on("change", "#company_select", function () {
                const companyId = $(this).val();
                $.ajax({
                    url: "{{route("getLicences")}}",
                    type: "POST",
                    data: {
                        company_id: companyId,
                        _token: "{{csrf_token()}}"
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
    </script>
@endpush