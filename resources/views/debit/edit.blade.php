<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Borç Ekle</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
        </div>
        {{html()->form("PUT")->route("debit.update",$debit)->open()}}
        <div class="modal-body">
            <div class="mb-2">
                {{html()->label("Alacaklı Ünvanı", "name")->class("form-label")->for("name")}}
                {{html()->text("name",$debit->name)->class("form-control")->placeholder("Alacaklı Ünvanı")->required()}}
            </div>
            <div class="mb-2">
                {{html()->label("Borç Tutarı", "amount")->class("form-label")->for("amount")}}
                {{html()->number("amount",$debit->amount)->class("form-control")->placeholder("Borç Tutarı")->required()}}
            </div>
            <div class="mb-2">
                {{html()->label("Borç Vadesi", "end_date")->class("form-label")->for("end_date")}}
                {{html()->date("due_date",$debit->due_date)->class("form-control")->placeholder("Borç Vadesi")->required()}}
            </div>
            <div class="mb-2">
                {{html()->label("Açıklama")->class("form-label")->for("description")}}
                {{html()->textarea("description",$debit->description)->class("form-control")->placeholder("Açıklama")}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                {{html()->submit("Kaydet")->class("btn btn-blue")}}
            </div>
        </div>
        {{html()->form()->close()}}
    </div>
</div>
