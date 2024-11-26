<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Gelir Düzenle</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
        </div>
        {{html()->form("PUT")->route("income.update",$income)->open()}}
        <div class="modal-body">
            <div class="mb-2">
                {{html()->label("Firma", "company")->class("form-label")->for("company")}}
                {{html()->select("company_id",$companies,$income->company_id)->class("form-control")->id("company-select")->placeholder("Firma Seçiniz")}}
            </div>
            <div class="mb-2">
                {{html()->label("Ruhsat (Önce Firma Seçin)", "licence")->class("form-label")->for("licence")}}
                {{html()->select("licence_id",$licences,$income->licence_id)->class("form-control")->id("company-select")->placeholder("Firma Seçiniz")}}
            </div>
            <div class="mb-2">
                {{html()->label("Gelir Tipi", "type")->class("form-label")->for("type")}}
                {{html()->select("type",\App\Enums\IncomeTypeEnum::toArray(),$income->type)->class("form-control")->placeholder("Gelir Tipi")->required()}}
            </div>
            <div class="row mb-2">
                <div class="col-lg-6">
                    {{html()->label("Tutar", "amount")->class("form-label")->for("amount")}}
                    {{html()->number("amount",$income->amount)->class("form-control")->placeholder("Tutar")->required()}}
                </div>
                <div class="col-lg-6">
                    {{html()->label("Tarih", "date")->class("form-label")->for("date")}}
                    {{html()->date("date",$income->date)->class("form-control")->placeholder("Tarih")->required()}}
                </div>
            </div>
            <div class="mb-2">
                {{html()->label("Açıklama")->class("form-label")->for("description")}}
                {{html()->textarea("description",$income->description)->class("form-control")->placeholder("Açıklama")}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                {{html()->submit("Kaydet")->class("btn btn-blue")}}
            </div>
        </div>
        {{html()->form()->close()}}
    </div>
</div>
