<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Kullanıcı Ekle</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
        </div>
        {{html()->form()->route("user.store")->open()}}
        <div class="modal-body">
            <div class="mb-2">
                {{html()->label("Adı Soyadı", "name")->class("form-label")->for("name")}}
                {{html()->text("name")->class("form-control")->placeholder("Adı Soyadı")->required()}}
            </div>
            <div class="mb-2">
                {{html()->label("Email Adresi", "email")->class("form-label")->for("email")}}
                {{html()->email("email")->class("form-control")->placeholder("Email Adresi")->required()}}
            </div>
            <div class="mb-2">
                {{html()->label("Şifre", "password")->class("form-label")->for("password")}}
                {{html()->password("password")->class("form-control")->placeholder("Şifre")->required()}}
            </div>
            <div class="mb-2">
                {{html()->label("Şifre Tekrar", "password_confirmation")->class("form-label")->for("password_confirmation")}}
                {{html()->password("password_confirmation")->class("form-control")->placeholder("Şifre Tekrar")->required()}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                {{html()->submit("Kaydet")->class("btn btn-blue")}}
            </div>
        </div>
        {{html()->form()->close()}}
    </div>
</div>
