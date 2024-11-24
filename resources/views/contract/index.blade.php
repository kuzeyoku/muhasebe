@extends("layouts.main")
@section("title", "Sözleşmeler")
@section("button")
    <button data-url="{{route("contract.create")}}" class="btn btn-sm btn-blue modal-action">Sözleşme Ekle
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
                    {{$contract->company?->name}}
                </td>
                <td>
                    {{$contract->licence?->number ?? "-"}}
                </td>
                <td>
                    {{$contract->title}}
                </td>
                <td>
                    {{$contract->end_date}}
                </td>
                <td>
                    {{\App\Enums\StatusEnum::getLabel($contract->status)}}
                </td>
                <td class="text-end">
                    <a href="{{route("contract.files", $contract)}}" class="btn btn-sm btn-secondary"><i
                            class="las la-file"></i></a>
                    <button type="button" data-url="{{route("contract.edit", $contract)}}"
                            class="btn btn-sm btn-blue modal-action"><i
                            class="las la-pen"></i></button>
                    {{html()->form("DELETE", route("contract.destroy", $contract))->class("d-inline")->open()}}
                    <button type="button" class="btn btn-sm btn-danger delete-button"><i class="las la-trash-alt"></i>
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
