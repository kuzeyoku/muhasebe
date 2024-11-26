@extends("layouts.main")
@section("title", "Gider Kayıtları")
@section("button")
    <button data-url="{{route("expense.create")}}" class="btn btn-sm btn-blue modal-action">Gider Ekle
    </button>
@endsection
@section("content")
    <div class="accordion mb-2" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne">
                    <i class="las la-filter"></i>Filtreler
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                 data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    {{html()->form()->route("expense.report")->id("report-form")->open()}}
                    <div class="row mb-3">
                        <div class="col-md-2">
                            {{html()->label("Firma Ünvanı")->for("company_id")}}
                            {{html()->select("company_id", $companies, request("company_id"))->class("form-control")->placeholder("Firma Ünvanı")->required()}}
                        </div>
                        <div class="col-md-2">
                            {{html()->label("Ruhsat Numarası")->for("licence_id")}}
                            {{html()->select("licence_id", $licences ?? [], request("licence_id"))->class("form-control")->placeholder("Ruhsat Numarası")->required()}}
                        </div>
                        <div class="col-md-2">
                            {{html()->label("Harcama Tipi")->for("type")}}
                            {{html()->select("type", \App\Enums\ExpenseTypeEnum::toArray(), request("type"))->class("form-control")->placeholder("Gider Tipi")->required()}}
                        </div>
                        <div class="col-md-2">
                            {{html()->label("Tarih")->for("date")}}
                            {{html()->date("start_date",request("start_date"))->class("form-control")->placeholder("Tarih")->required()}}
                        </div>
                        <div class="col-md-2">
                            {{html()->label("Tarih")->for("date")}}
                            {{html()->date("end_date", request("end_date"))->class("form-control")->placeholder("Tarih")->required()}}
                        </div>
                        <div class="col-md-2">
                            {{html()->label("Toplam Tutar")->for("total_amount")}}
                            {!! html()->text("total_amount", $total_amount ?? 0)->class("form-control")->placeholder("Toplam Tutar")->required() !!}
                        </div>
                    </div>
                    {{html()->form()->close()}}
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped border">
            <thead class="table-light">
            <tr>
                <th>Firma Ünvanı</th>
                <th>Ruhsat Numarası</th>
                <th>Harcama Tipi</th>
                <th>Harcama Tutarı</th>
                <th>Harcama Tarihi</th>
                <th>Harcama Açıklaması</th>
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
                    <td>
                        {{$expense->description}}
                    </td>
                    <td class="text-end">
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
            @if($expenses instanceof \Illuminate\Pagination\LengthAwarePaginator && $expenses->hasPages())
                {{$expenses->links("pagination::bootstrap-4")}}
            @endif
        </div>
    </div>
@endsection
@push("script")
    <script>
        $(document).ready(function () {
            $("#report-form").on("change", "input,select", function () {
                    $("#report-form").submit();
                }
            );
        });
    </script>
@endpush
