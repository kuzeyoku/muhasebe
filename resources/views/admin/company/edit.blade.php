<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Firma Düzenle</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
        </div>
        {{html()->form("PUT")->route("admin.company.update",$company)->acceptsFiles()->open()}}
        <div class="modal-body">
            <div class="mb-2">
                {{html()->label("Firma Ünvanı", "name")->class("form-label")->for("name")}}
                {{html()->text("name",$company->name)->class("form-control")->placeholder("Firma Ünvanı")->required()}}
            </div>
            <div class="mb-2">
                {{html()->label("Logo", "image")->class("form-label")->for("image")}}
                {{html()->file("image")->class("form-control")}}
            </div>
            <div class="mb-2">
                {{html()->label("Yetkilisi", "authorized")->class("form-label")->for("authorized")}}
                {{html()->text("authorized",$company->authorized)->class("form-control")->placeholder("Yetkilisi")}}
            </div>
            <div class="mb-2">
                {{html()->label("E-Posta", "email")->class("form-label")->for("email")}}
                {{html()->email("email",$company->email)->class("form-control")->placeholder("E-Posta")}}
            </div>
            <div class="mb-2">
                {{html()->label("Telefon", "phone")->class("form-label")->for("phone")}}
                {{html()->text("phone",$company->phone)->class("form-control")->placeholder("Telefon")}}
            </div>
            <div class="row mb-2">
                <div class="col-lg-6">
                    {{html()->label("İl", "city")->class("form-label")->for("city")}}
                    {{html()->select("city", $cities, $company->city_id)->class("form-control")->id("city_select")->placeholder("Seçiniz")}}
                </div>
                <div class="col-lg-6">
                    {{html()->label("İlçe", "district")->class("form-label")->for("district")}}
                    {{html()->select("district", $districts, $company->district_id)->class("form-control")->id("district_select")->placeholder("Seçiniz")}}
                </div>
            </div>
            <div class="mb-2">
                {{html()->label("Adres", "address")->class("form-label")->for("address")}}
                {{html()->textarea("address",$company->address)->class("form-control")->placeholder("Adres")}}
            </div>
            <div class="row mb-2">
                <div class="col-lg-6">
                    {{html()->label("Vergi Numarası", "tax_number")->class("form-label")->for("tax_number")}}
                    {{html()->number("tax_number",$company->tax_number)->class("form-control")->placeholder("Vergi Numarası")}}
                </div>
                <div class="col-lg-6">
                    {{html()->label("Vergi Dairesi", "tax_office")->class("form-label")->for("tax_office")}}
                    {{html()->text("tax_office",$company->tax_office)->class("form-control")->placeholder("Vergi Dairesi")}}
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
