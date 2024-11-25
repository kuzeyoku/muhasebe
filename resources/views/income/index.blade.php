@extends("layouts.main")
@section("title", "Gelir Kayıtları")
@section("button")
    <button data-url="{{route("income.create")}}" class="btn btn-sm btn-blue modal-action">Gelir Ekle
    </button>
@endsection
@section("content")
    <div class="table-responsive">
        <table class="table table-striped border">
            <thead class="table-light">
            <tr>
                <th>Firma Ünvanı</th>
                <th>Ruhsat Numarası</th>
                <th>Gelir Tipi</th>
                <th>Tutar</th>
                <th>Tarih</th>
                <th class="text-end">İşlemler</th>
            </tr>
            </thead>
            <tbody>
            @foreach($incomes as $income)
                <tr>
                    <td>
                        {{$income->company?->name ?: "-"}}
                    </td>
                    <td>
                        {{$income->licence?->number ?: "-"}}
                    </td>
                    <td>
                        {{\App\Enums\IncomeTypeEnum::getLabel($income->type)}}
                    </td>
                    <td>
                        {{$income->amount}}
                    </td>
                    <td>
                        {{$income->date}}
                    </td>
                    <td class=" text-end">
                        <a class="btn btn-sm btn-success" href="{{route("income.files",$income)}}">
                            <i class="las la-file"></i>
                        </a>
                        <button type="button" data-url="{{route("income.edit", $income)}}"
                                class="btn btn-sm btn-blue modal-action"><i
                                class="las la-pen"></i></button>
                        {{html()->form("DELETE", route("income.destroy", $income))->class("d-inline")->open()}}
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
            {{$incomes->links("pagination::bootstrap-4")}}
        </div>
    </div>
@endsection
