<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Fatura Düzenle</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
        </div>
        {{html()->form("PUT")->route("invoice.update",$invoice)->acceptsFiles()->open()}}
        <div class="modal-body">
            <div class="mb-2">
                {{html()->label("Firma", "company")->class("form-label")->for("company")}}
                {{html()->select("company_id",$companies,$invoice->company_id)->class("form-control")->id("company-select")->placeholder("Firma Seçiniz")}}
            </div>
            <div class="mb-2">
                {{html()->label("Ruhsat (Önce Firma Seçin)", "licence")->class("form-label")->for("licence")}}
                {{html()->select("licence_id",$licences,$invoice->licence_id)->class("form-control")->id("company-select")->placeholder("Firma Seçiniz")}}
            </div>
            <div class="row mb-2">
                <div class="col-lg-6">
                    {{html()->label("Fatura Tipi", "type")->class("form-label")->for("type")}}
                    {{html()->select("type",["income"=>"Gelir Faturası","expense"=>"Gider Faturası"],$invoice->type)->class("form-control")->placeholder("Fatura Tipi")->required()}}
                </div>
                <div class="col-lg-6">
                    {{html()->label("Fatura No", "invoice_no")->class("form-label")->for("invoice_no")}}
                    {{html()->text("number",$invoice->number)->class("form-control")->placeholder("Fatura No")->required()}}
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-6">
                    {{html()->label("Fatura Tarihi", "date")->class("form-label")->for("date")}}
                    {{html()->date("date",$invoice->date)->class("form-control")->placeholder("Fatura Tarihi")->required()}}
                </div>
                <div class="col-lg-6">
                    {{html()->label("Son Ödeme Tarihi", "due_date")->class("form-label")->for("due_date")}}
                    {{html()->date("due_date",$invoice->due_date)->class("form-control")->placeholder("Son Ödeme Tarihi")}}
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-6">
                    {{html()->label("Tutar", "amount")->class("form-label")->for("amount")}}
                    {{html()->number("amount",$invoice->amount)->class("form-control")->placeholder("Tutar")->required()}}
                </div>
                <div class="col-lg-6">
                    {{html()->label("Durum", "status")->class("form-label")->for("status")}}
                    {{html()->select("status",["unpaid" => "Ödenmedi","paid" => "Ödendi"],$invoice->status)->class("form-control")->placeholder("Seçiniz")->required()}}
                </div>
            </div>
            <div class="mb-2">
                {{html()->label("Açıklama")->class("form-label")->for("description")}}
                {{html()->textarea("description",$invoice->description)->class("form-control")->placeholder("Açıklama")}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                {{html()->submit("Kaydet")->class("btn btn-blue")}}
            </div>
        </div>
        {{html()->form()->close()}}
    </div>
</div>
