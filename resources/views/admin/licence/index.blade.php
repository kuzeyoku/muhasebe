@extends("admin.layouts.main")
@section("title", "Ruhsatlar")
@section("button")
    <button id="create_button" data-url="{{route("admin.licence.create")}}" class="btn btn-sm btn-blue">Ruhsat Ekle
    </button>
@endsection
@section("content")
    <table class="table table-striped border">
        <thead class="table-light">
        <tr>
            <th>Resim</th>
            <th>Firma Ünvanı</th>
            <th>İli</th>
            <th>İlçesi</th>
            <th>Ruhsat Numarası</th>
            <th>Ruhsat Grubu</th>
            <th>Ruhsat Durumu</th>
            <th class="text-end">İşlemler</th>
        </tr>
        </thead>
        <tbody>
        @foreach($licences as $licence)
            <tr>
                <td>
                    <img src="{{$licence->getFirstMediaUrl("image")}}" title="{{$licence->number}}" alt="">
                </td>
                <td>
                    {{$licence->company->name}}
                </td>
                <td>
                    {{$licence->number}}
                </td>
                <td>
                    {{$licence->city->name}}
                </td>
                <td>
                    {{$licence->district->name}}
                </td>
                <td>
                    {{$licence->group}}
                </td>
                <td>
                    {{$licence->status}}
                </td>
                <td class="text-end">
                    <button type="button" data-url="{{route("admin.licence.edit", $licence)}}"
                            class="btn btn-sm btn-blue edit_button"><i
                            class="las la-pen"></i></button>
                    {{html()->form("DELETE", route("admin.licence.destroy", $licence))->class("d-inline")->open()}}
                    <button type="button" class="btn btn-sm btn-danger delete_button"><i class="las la-trash-alt"></i>
                    </button>
                    {{html()->form()->close()}}
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
    <div class="float-end">
        {{$licences->links("pagination::bootstrap-4")}}
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
        });
    </script>
@endpush
