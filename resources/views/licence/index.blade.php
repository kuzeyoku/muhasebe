@extends("layouts.main")
@section("title", "Ruhsatlar")
@section("button")
    <button data-url="{{route("licence.create")}}" class="btn btn-sm btn-blue modal-action">Ruhsat Ekle
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
                    @if($licence->hasMedia("image"))
                        <img src="{{$licence->getFirstMediaUrl("image")}}" title="{{$licence->number}}" alt=""
                             width="100">
                    @endif
                </td>
                <td>
                    {{$licence->company?->name}}
                </td>
                <td>
                    {{$licence->city?->name}}
                </td>
                <td>
                    {{$licence->district?->name}}
                </td>
                <td>
                    {{$licence->number}}
                </td>
                <td>
                    {{$licence->group}}
                </td>
                <td>
                    {{\App\Enums\LicenceTypeEnum::getLabel($licence->type)}}
                </td>
                <td class="text-end">
                    <a href="{{route("licence.files", $licence)}}" class="btn btn-sm btn-secondary"><i
                                class="las la-file"></i></a>
                    <button type="button" data-url="{{route("licence.edit", $licence)}}"
                            class="btn btn-sm btn-blue modal-action"><i
                                class="las la-pen"></i></button>
                    {{html()->form("DELETE", route("licence.destroy", $licence))->class("d-inline")->open()}}
                    <button type="button" class="btn btn-sm btn-danger delete-button"><i class="las la-trash-alt"></i>
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
