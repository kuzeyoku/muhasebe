<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Fatura Ekle</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
        </div>
        {{html()->form()->route("invoice.store")->acceptsFiles()->open()}}
        <div class="modal-body">
            <div class="mb-2">
                {{html()->label("Fatura")->class("form-label")->for("file")}}
                {{html()->file("file")->class("form-control")->id("invoice_file")->attribute("data-url",route("invoice.pdfParser"))->accept(".pdf")->required()}}
            </div>
            <div class="mb-2">
                {{html()->label("Firma", "company")->class("form-label")->for("company")}}
                {{html()->select("company_id",$companies)->class("form-control")->id("company-select")->placeholder("Firma Seçiniz")}}
            </div>
            <div class="mb-2">
                {{html()->label("Ruhsat (Önce Firma Seçin)", "licence")->class("form-label")->for("licence")}}
                {{html()->select("licence_id")->class("form-control")->id("licence-select")->placeholder("Firma Seçiniz")}}
            </div>
            <div class="row mb-2">
                <div class="col-lg-6">
                    {{html()->label("Fatura Tipi", "type")->class("form-label")->for("type")}}
                    {{html()->select("type",["income"=>"Gelir Faturası","expense"=>"Gider Faturası"])->class("form-control")->placeholder("Fatura Tipi")->required()}}
                </div>
                <div class="col-lg-6">
                    {{html()->label("Fatura No", "invoice_no")->class("form-label")->for("invoice_no")}}
                    {{html()->text("number")->class("form-control")->placeholder("Fatura No")->required()}}
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-6">
                    {{html()->label("Fatura Tarihi", "date")->class("form-label")->for("date")}}
                    {{html()->date("date")->class("form-control")->placeholder("Fatura Tarihi")->required()}}
                </div>
                <div class="col-lg-6">
                    {{html()->label("Son Ödeme Tarihi", "due_date")->class("form-label")->for("due_date")}}
                    {{html()->date("due_date")->class("form-control")->placeholder("Son Ödeme Tarihi")}}
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-6">
                    {{html()->label("Tutar", "amount")->class("form-label")->for("amount")}}
                    {{html()->number("amount")->class("form-control")->placeholder("Tutar")->required()}}
                </div>
                <div class="col-lg-6">
                    {{html()->label("Durum", "status")->class("form-label")->for("status")}}
                    {{html()->select("status",["unpaid"=>"Ödenmedi","paid"=>"Ödendi"])->class("form-control")->placeholder("Seçiniz")->required()}}
                </div>
            </div>
            <div class="mb-2">
                {{html()->label("Açıklama")->class("form-label")->for("description")}}
                {{html()->textarea("description")->class("form-control")->placeholder("Açıklama")}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                {{html()->submit("Kaydet")->class("btn btn-blue")}}
            </div>
        </div>
        {{html()->form()->close()}}
    </div>
</div>
