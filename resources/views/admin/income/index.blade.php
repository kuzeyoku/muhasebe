@extends("admin.layouts.main")
@section("title", "Gelirler")
@section("button")
    <button id="create_button" data-url="{{route("admin.income.create")}}" class="btn btn-sm btn-blue">Gelir Ekle
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
        @foreach($incomes as $income)
            <tr>
                <td>
                    {{$income->company?->name}}
                </td>
                <td>
                    {{$income->licence?->number }}
                </td>
                <td>
                    {{$income->type}}
                </td>
                <td>
                    {{$income->amount}}
                </td>
                <td>
                    {{$income->date}}
                </td>
                <td class=" text-end">
                    <a class="btn btn-sm btn-success" href="{{route("admin.income.files",$income)}}">
                        <i class="las la-file"></i>
                    </a>
                    <button type="button" data-url="{{route("admin.income.edit", $income)}}"
                            class="btn btn-sm btn-blue edit_button"><i
                            class="las la-pen"></i></button>
                    {{html()->form("DELETE", route("admin.income.destroy", $income))->class("d-inline")->open()}}
                    <button type="button" class="btn btn-sm btn-danger delete_button"><i class="las la-trash-alt"></i>
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
@endsection
