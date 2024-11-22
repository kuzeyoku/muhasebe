@extends("admin.layouts.main")
@section("title", "Giderler")
@section("button")
    <button id="create_button" data-url="{{route("admin.expense.create")}}" class="btn btn-sm btn-blue">Gider Ekle
    </button>
@endsection
@section("content")
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
                    {{$expense->company->name}}
                </td>
                <td>
                    {{$expense->licence->number }}
                </td>
                <td>
                    {{$expense->type}}
                </td>
                <td>
                    {{$expense->amount}}
                </td>
                <td>
                    {{$expense->date}}
                </td>
                <td>
                    <strong class="text-{{$expense->status == "paid" ? "success" : "danger"}}">{{$expense->statusName}}</strong>
                </td>
                <td class=" text-end">
                    <button type="button" data-url="{{route("admin.expense.edit", $expense)}}"
                            class="btn btn-sm btn-blue edit_button"><i
                                class="las la-pen"></i></button>
                    {{html()->form("DELETE", route("admin.expense.destroy", $expense))->class("d-inline")->open()}}
                    <button type="button" class="btn btn-sm btn-danger delete_button"><i class="las la-trash-alt"></i>
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
@endsection
