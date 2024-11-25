@extends("layouts.main")
@section("title", "Gider Kayıtları")
@section("button")
    <button data-url="{{route("expense.create")}}" class="btn btn-sm btn-blue modal-action">Gider Ekle
    </button>
@endsection
@section("content")
    <div class="table-responsive">
        <table class="table table-striped border">
            <thead class="table-light">
            <tr>
                <th>Firma Ünvanı</th>
                <th>Ruhsat Numarası</th>
                <th>Harcama Tipi</th>
                <th>Harcama Tutarı</th>
                <th>Harcama Tarihi</th>
                <th class="text-end">İşlemler</th>
            </tr>
            </thead>
            <tbody>
            @foreach($expenses as $expense)
                <tr>
                    <td>
                        {{$expense->company?->name ?: "-"}}
                    </td>
                    <td>
                        {{$expense->licence?->number ?: "-"}}
                    </td>
                    <td>
                        {{\App\Enums\ExpenseTypeEnum::getLabel($expense->type)}}
                    </td>
                    <td>
                        {{$expense->amount}} <i class="las la-lira-sign"></i>
                    </td>
                    <td>
                        {{$expense->date}}
                    </td>
                    <td class=" text-end">
                        <a class="btn btn-sm btn-success" href="{{route("expense.files",$expense)}}">
                            <i class="las la-file"></i>
                        </a>
                        <button type="button" data-url="{{route("expense.edit", $expense)}}"
                                class="btn btn-sm btn-blue modal-action"><i
                                class="las la-pen"></i></button>
                        {{html()->form("DELETE", route("expense.destroy", $expense))->class("d-inline")->open()}}
                        <button type="button" class="btn btn-sm btn-danger delete-button"><i
                                class="las la-trash-alt"></i>
                        </button>
                        {{html()->form()->close()}}
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
        <div class="float-end">
            {{$expenses->links("pagination::bootstrap-4")}}
        </div>
    </div>
@endsection
