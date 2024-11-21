@extends("admin.layouts.main")
@section("title", "Sözleşmeler")
@section("button")
    <button id="create_button" data-url="{{route("admin.contract.create")}}" class="btn btn-sm btn-blue">Sözleşme Ekle
    </button>
@endsection
@section("content")
    <table class="table table-striped border">
        <thead class="table-light">
        <tr>
            <th>Firma Ünvanı</th>
            <th>Ruhsat Numarası</th>
            <th>Sözleşme Başlığı</th>
            <th>Sözleşme Bitiş Tarihi</th>
            <th>Sözleşme Durumu</th>
            <th class="text-end">İşlemler</th>
        </tr>
        </thead>
        <tbody>
        @foreach($contracts as $contract)
            <tr>
                <td>
                    {{$contract->company->name}}
                </td>
                <td>
                    {{$contract->licence->number}}
                </td>
                <td>
                    {{$contract->title}}
                </td>
                <td>
                    {{$contract->end_date}}
                </td>
                <td>
                    {{$contract->status}}
                </td>
                <td class="text-end">
                    <button type="button" data-url="{{route("admin.contract.edit", $contract)}}"
                            class="btn btn-sm btn-blue edit_button"><i
                            class="las la-pen"></i></button>
                    {{html()->form("DELETE", route("admin.contract.destroy", $contract))->class("d-inline")->open()}}
                    <button type="button" class="btn btn-sm btn-danger delete_button"><i class="las la-trash-alt"></i>
                    </button>
                    {{html()->form()->close()}}
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
    <div class="float-end">
        {{$contracts->links("pagination::bootstrap-4")}}
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
                    url: "{{route("admin.getLicences")}}",
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
        });
    </script>
@endpush
