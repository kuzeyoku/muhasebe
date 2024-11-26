@extends("layouts.main")
@section("title", "Borçlar")
@section("button")
    <button data-url="{{route("debit.create")}}" class="btn btn-sm btn-blue modal-action">Borç Ekle
    </button>
@endsection
@section("content")
    <div class="table-responsive">
        <table class="table table-striped border">
            <thead class="table-light">
            <tr>
                <th>Alacaklı Ünvanı</th>
                <th>Borç Tutarı</th>
                <th>Borç Vadesi</th>
                <th>Açıklama</th>
                <th class="text-end">İşlemler</th>
            </tr>
            </thead>
            <tbody>
            @foreach($debits as $debit)
                <tr>
                    <td>
                        {{$debit->name}}
                    </td>
                    <td>
                        {{$debit->amount}}
                    </td>
                    <td>
                        {{$debit->due_date}}
                    </td>
                    <td>
                        {{$debit->description}}
                    </td>
                    <td class="text-end">
                        <button type="button" data-url="{{route("debit.edit", $debit)}}"
                                class="btn btn-sm btn-blue modal-action"><i
                                class="las la-pen"></i></button>
                        {{html()->form("DELETE", route("debit.destroy", $debit))->class("d-inline")->open()}}
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
            {{$debits->links("pagination::bootstrap-4")}}
        </div>
    </div>
@endsection
