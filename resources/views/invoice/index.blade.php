@extends("layouts.main")
@section("title", "Faturalar")
@section("button")
    <button data-url="{{route("invoice.create")}}" class="btn btn-sm btn-blue modal-action">Fatura Ekle
    </button>
@endsection
@section("content")
    <div class="table-responsive">
        <table class="table table-striped border">
            <thead class="table-light">
            <tr>
                <th>Firma Ünvanı</th>
                <th>Firma Telefon</th>
                <th>Fatura Numarası</th>
                <th>Fatura Tarihi</th>
                <th>Fatura Tutarı</th>
                <th>Fatura Tipi</th>
                <th>Son Ödeme Tarihi</th>
                <th>Fatura Durumu</th>
                <th class="text-end">İşlemler</th>
            </tr>
            </thead>
            <tbody>
            @foreach($invoices as $invoice)
                <tr class="bg-{{$invoice->type == "income" ? "soft-success":"soft-danger"}}">
                    <td>
                        {{$invoice->company?->name ?: "-"}}
                    </td>
                    <td>
                        {{$invoice->company?->phone ?: "-"}}
                    </td>
                    <td>
                        {{$invoice->number}}
                    </td>
                    <td>
                        {{$invoice->date}}
                    </td>
                    <td>
                        {{$invoice->amount}} <i class="las la-lira-sign"></i>
                    </td>
                    <td>
                        {{$invoice->typeName}}
                    </td>
                    <td>
                        {{$invoice->due_date ?? "-"}}
                    </td>
                    <td>
                        <strong
                            class="text-{{$invoice->status == "paid" ? "success" : "danger"}}">{{$invoice->statusName}}</strong>
                    </td>
                    <td class="text-end">
                        <a class="btn btn-sm btn-success" href="{{route("invoice.files",$invoice)}}">
                            <i class="las la-file"></i>
                        </a>
                        <button type="button" data-url="{{route("invoice.edit", $invoice)}}"
                                class="btn btn-sm btn-blue modal-action"><i
                                class="las la-pen"></i></button>
                        {{html()->form("DELETE", route("invoice.destroy", $invoice))->class("d-inline")->open()}}
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
            {{$invoices->links("pagination::bootstrap-4")}}
        </div>
    </div>
@endsection
