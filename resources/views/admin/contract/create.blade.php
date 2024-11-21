<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Sözleşme Ekle</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
        </div>
        {{html()->form()->route("admin.contract.store")->acceptsFiles()->open()}}
        <div class="modal-body">
            <div class="mb-2">
                {{html()->label("Resim", "image")->class("form-label")->for("image")}}
                {{html()->file("image")->class("form-control")->required()}}
            </div>
            <div class="mb-2">
                {{html()->label("Firma", "company")->class("form-label")->for("company")}}
                {{html()->select("company_id", $companies)->class("form-control")->id("company_select")->placeholder("Firma Seçiniz")->required()}}
            </div>
            <div class="mb-2">
                {{html()->label("Ruhsat (Önce Firma Seçin)", "licence")->class("form-label")->for("licence")}}
                {{html()->select("licence_id")->class("form-control")->placeholder("Ruhsat Seçiniz")->required()}}
            </div>
            <div class="row mb-2">
                <div class="col-lg-6">
                    {{html()->label("Başlangıç Tarihi", "start_date")->class("form-label")->for("start_date")}}
                    {{html()->date("start_date")->class("form-control")->placeholder("Başlangıç Tarihi")->required()}}
                </div>
                <div class="col-lg-6">
                    {{html()->label("Bitiş Tarihi", "end_date")->class("form-label")->for("end_date")}}
                    {{html()->date("end_date")->class("form-control")->placeholder("Bitiş Tarihi")->required()}}
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-6">
                    {{html()->label("Ruhsat Grubu", "group")->class("form-label")->for("group")}}
                    {{html()->text("group")->class("form-control")->placeholder("Ruhsat Grubu")->required()}}
                </div>
                <div class="col-lg-6">
                    {{html()->label("Ruhsat Durumu", "status")->class("form-label")->for("status")}}
                    {{html()->text("status")->class("form-control")->placeholder("Ruhsat Durumu")->required()}}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                {{html()->submit("Kaydet")->class("btn btn-blue")}}
            </div>
        </div>
        {{html()->form()->close()}}
    </div>
</div>
