@extends("admin.layouts.main")
@section("title", "Firmalar")
@section("button")
    <button id="create_button" data-url="{{route("admin.company.create")}}" class="btn btn-sm btn-blue">Firma Ekle
    </button>
@endsection
@section("content")
    <table class="table table-striped border">
        <thead class="table-light">
        <tr>
            <th>Logo</th>
            <th>Firma Ünvanı</th>
            <th>Yetkilisi</th>
            <th>E-Posta</th>
            <th>Telefon</th>
            <th class="text-end">İşlemler</th>
        </tr>
        </thead>
        <tbody>
        @foreach($companies as $company)
            <tr>
                <td>
                    @if($company->hasMedia("image"))
                        <img src="{{$company->getFirstMediaUrl("image")}}" title="{{$company->name}}" width="100px">
                    @endif
                </td>
                <td>
                    {{$company->name}}
                </td>
                <td>
                    {{$company->authorized}}
                </td>
                <td>
                    {{$company->email}}
                </td>
                <td>
                    {{$company->phone}}
                </td>
                <td class="text-end">
                    <button type="button" data-url="{{route("admin.company.edit", $company)}}"
                            class="btn btn-sm btn-blue edit_button"><i
                                class="las la-pen"></i></button>
                    {{html()->form("DELETE", route("admin.company.destroy", $company))->class("d-inline")->open()}}
                    <button type="button" class="btn btn-sm btn-danger delete_button"><i class="las la-trash-alt"></i>
                    </button>
                    {{html()->form()->close()}}
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
    <div class="float-end">
        {{$companies->links("pagination::bootstrap-4")}}
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
            $(document).on("change", "#city_select", function () {
                const cityId = $(this).val();
                $.ajax({
                    url: "{{route("admin.getDistricts")}}",
                    type: "POST",
                    data: {
                        city_id: cityId,
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
                        $("#district_select").html(html);
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
