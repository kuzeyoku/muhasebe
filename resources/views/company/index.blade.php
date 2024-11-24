@extends("layouts.main")
@section("title", "Firmalar")
@section("button")
    <button data-url="{{route("company.create")}}" class="btn btn-sm btn-blue modal-action">Firma Ekle
    </button>
@endsection
@section("content")
    <table class="table table-striped">
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
                        <img src="{{$company->getFirstMediaUrl("image")}}" title="{{$company->name}}" height="40">
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
                    <button type="button" data-url="{{route("company.show", $company)}}"
                            class="btn btn-sm btn-success modal-action">
                        <i class="las la-lira-sign"></i>
                    </button>
                    <button type="button" data-url="{{route("company.edit", $company)}}"
                            class="btn btn-sm btn-blue modal-action">
                        <i class="las la-pen"></i>
                    </button>
                    {{html()->form("DELETE", route("company.destroy", $company))->class("d-inline")->open()}}
                    <button type="button" class="btn btn-sm btn-danger delete-button"><i class="las la-trash-alt"></i>
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
