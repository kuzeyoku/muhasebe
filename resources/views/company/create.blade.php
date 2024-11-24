<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Firma Ekle</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
        </div>
        {{html()->form()->route("company.store")->acceptsFiles()->open()}}
        <div class="modal-body">
            <div class="mb-2">
                {{html()->label("Firma Ünvanı", "name")->class("form-label")->for("name")}}
                {{html()->text("name")->class("form-control")->placeholder("Firma Ünvanı")->required()}}
            </div>
            <div class="mb-2">
                {{html()->label("Logo", "image")->class("form-label")->for("image")}}
                {{html()->file("image")->class("form-control")}}
            </div>
            <div class="mb-2">
                {{html()->label("Yetkilisi", "authorized")->class("form-label")->for("authorized")}}
                {{html()->text("authorized")->class("form-control")->placeholder("Yetkilisi")}}
            </div>
            <div class="row mb-2">
                <div class="col-lg-6">
                    {{html()->label("E-Posta", "email")->class("form-label")->for("email")}}
                    {{html()->email("email")->class("form-control")->placeholder("E-Posta")}}
                </div>
                <div class="col-lg-6">
                    {{html()->label("Telefon", "phone")->class("form-label")->for("phone")}}
                    {{html()->text("phone")->class("form-control")->placeholder("Telefon")}}
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-6">
                    {{html()->label("İl", "city")->class("form-label")->for("city")}}
                    {{html()->select("city", $cities)->class("form-control")->id("city-select")->placeholder("Seçiniz")}}
                </div>
                <div class="col-lg-6">
                    {{html()->label("İlçe (Önce İl Seçiniz)", "district")->class("form-label")->for("district")}}
                    {{html()->select("district")->class("form-control")->id("district-select")->placeholder("İl Seçiniz")}}
                </div>
            </div>
            <div class="mb-2">
                {{html()->label("Adres", "address")->class("form-label")->for("address")}}
                {{html()->textarea("address")->class("form-control")->placeholder("Adres")}}
            </div>
            <div class="row mb-2">
                <div class="col-lg-6">
                    {{html()->label("Vergi Numarası", "tax_number")->class("form-label")->for("tax_number")}}
                    {{html()->number("tax_number")->class("form-control")->placeholder("Vergi Numarası")}}
                </div>
                <div class="col-lg-6">
                    {{html()->label("Vergi Dairesi", "tax_office")->class("form-label")->for("tax_office")}}
                    {{html()->text("tax_office")->class("form-control")->placeholder("Vergi Dairesi")}}
                </div>
            </div>
            <div class="mb-2">
                {{html()->label("Açıklama", "description")->class("form-label")->for("description")}}
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
