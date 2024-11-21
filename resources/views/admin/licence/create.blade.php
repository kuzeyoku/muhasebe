<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ruhsat Ekle</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
        </div>
        {{html()->form()->route("admin.licence.store")->acceptsFiles()->open()}}
        <div class="modal-body">
            <div class="mb-2">
                {{html()->label("Resim", "image")->class("form-label")->for("image")}}
                {{html()->file("image")->class("form-control")->required()}}
            </div>
            <div class=" mb-2">
                {{html()->label("Firma", "company")->class("form-label")->for("company")}}
                {{html()->select("company_id", $companies)->class("form-control")->placeholder("Firma Seçiniz")->required()}}
            </div>
            <div class="row mb-2">
                <div class="col-lg-6">
                    {{html()->label("İl", "city")->class("form-label")->for("city")}}
                    {{html()->select("city_id", $cities)->class("form-control")->id("city_select")->placeholder("Seçiniz")}}
                </div>
                <div class="col-lg-6">
                    {{html()->label("İlçe (Önce İl Seçiniz)", "district")->class("form-label")->for("district")}}
                    {{html()->select("district_id")->class("form-control")->id("district_select")->placeholder("Seçiniz")}}
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-6">
                    {{html()->label("Ruhsat Numarası", "number")->class("form-label")->for("number")}}
                    {{html()->number("number")->class("form-control")->placeholder("Ruhsat Numarası")->required()}}
                </div>
                <div class="col-lg-6">
                    {{html()->label("Erişim Numarası", "access_number")->class("form-label")->for("access_number")}}
                    {{html()->number("access_number")->class("form-control")->placeholder("Erişim Numarası")->required()}}
                </div>
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
