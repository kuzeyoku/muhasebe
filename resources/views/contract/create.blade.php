<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Sözleşme Ekle</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
        </div>
        {{html()->form()->route("contract.store")->open()}}
        <div class="modal-body">
            <div class="mb-2">
                {{html()->label("Sözleşme Başlığı", "title")->class("form-label")->for("title")}}
                {{html()->text("title")->class("form-control")->placeholder("Sözleşme Başlığı")->required()}}
            </div>
            <div class="mb-2">
                {{html()->label("Firma", "company")->class("form-label")->for("company")}}
                {{html()->select("company_id", $companies)->class("form-control")->id("company-select")->placeholder("Firma Seçiniz")->required()}}
            </div>
            <div class="mb-2">
                {{html()->label("Ruhsat (Önce Firma Seçin)", "licence")->class("form-label")->for("licence")}}
                {{html()->select("licence_id")->class("form-control")->id("licence-select")->placeholder("Firma Seçiniz")}}
            </div>
            <div class="row mb-2">
                <div class="col-lg-6">
                    {{html()->label("Başlangıç Tarihi", "start_date")->class("form-label")->for("start_date")}}
                    {{html()->date("start_date")->class("form-control")->placeholder("Başlangıç Tarihi")}}
                </div>
                <div class="col-lg-6">
                    {{html()->label("Bitiş Tarihi", "end_date")->class("form-label")->for("end_date")}}
                    {{html()->date("end_date")->class("form-control")->placeholder("Bitiş Tarihi")}}
                </div>
            </div>
            <div class="mb-2">
                {{html()->label("Açıklama")->class("form-label")->for("description")}}
                {{html()->textarea("description")->class("form-control")->placeholder("Açıklama")}}
            </div>
            <div class="mb-2">
                {{html()->label("Durum", "status")->class("form-label")->for("status")}}
                {{html()->select("status", \App\Enums\StatusEnum::toSelectArray())->class("form-control")->placeholder("Durum Seçiniz")->required()}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                {{html()->submit("Kaydet")->class("btn btn-blue")}}
            </div>
        </div>
        {{html()->form()->close()}}
    </div>
</div>
