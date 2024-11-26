<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Firma Detayları</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
        </div>
        <div class="modal-body">
            @if($unpaidInvoices->count() > 0)
                <div class="alert alert-warning shadow-sm border-theme-white-2" role="alert">
                    <div
                        class="d-inline-flex justify-content-center align-items-center thumb-xs bg-warning rounded-circle mx-auto me-1">
                        <i class="fas fa-exclamation align-self-center mb-0 text-white "></i>
                    </div>
                    <strong>Dikkat !</strong> Firma tarafından 7 gün içerisinde ödenmesi
                    gereken <strong>{{$unpaidInvoices->count()}}</strong> adet fatura bulunuyor.
                </div>
            @endif
            <div class="row">
                <div class="col-lg-4">
                    <div class="card bg-corner-img">
                        <div class="card-body">
                            <div class="row d-flex justify-content-center">
                                <div class="col-9">
                                    <p class="text-muted text-uppercase mb-0 fw-normal fs-13">Toplam Fatura Tutarı</p>
                                    <h4 class="mt-1 mb-0 fw-medium">{{$company->invoices()->sum("amount")}}</h4>
                                </div>
                                <div class="col-3 align-self-center">
                                    <div
                                        class="d-flex justify-content-center align-items-center thumb-md border-dashed border-primary rounded mx-auto">
                                        <i class="las la-lira-sign fs-22 align-self-center mb-0 text-primary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card bg-corner-img">
                        <div class="card-body">
                            <div class="row d-flex justify-content-center">
                                <div class="col-9">
                                    <p class="text-muted text-uppercase mb-0 fw-normal fs-13">Toplam Tahsil Edilmiş
                                        Tutar</p>
                                    <h4 class="mt-1 mb-0 fw-medium text-success">{{$company->incomes->sum("amount")}}</h4>
                                </div>
                                <div class="col-3 align-self-center">
                                    <div
                                        class="d-flex justify-content-center align-items-center thumb-md border-dashed border-primary rounded mx-auto">
                                        <i class="las la-lira-sign fs-22 align-self-center mb-0 text-primary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card bg-corner-img">
                        <div class="card-body">
                            <div class="row d-flex justify-content-center">
                                <div class="col-9">
                                    <p class="text-muted text-uppercase mb-0 fw-normal fs-13">Tahsil Edilecek Tutar</p>
                                    <h4 class="mt-1 mb-0 fw-medium text-warning">{{$company->invoices()->sum("amount")}}</h4>
                                </div>
                                <div class="col-3 align-self-center">
                                    <div
                                        class="d-flex justify-content-center align-items-center thumb-md border-dashed border-primary rounded mx-auto">
                                        <i class="las la-lira-sign fs-22 align-self-center mb-0 text-primary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card bg-corner-img">
                        <div class="card-body">
                            <div class="row d-flex justify-content-center">
                                <div class="col-9">
                                    <p class="text-muted text-uppercase mb-0 fw-normal fs-13">Toplam Gider</p>
                                    <h4 class="mt-1 mb-0 fw-medium">{{$company->expenses->sum("amount")}}</h4>
                                </div>
                                <div class="col-3 align-self-center">
                                    <div
                                        class="d-flex justify-content-center align-items-center thumb-md border-dashed border-primary rounded mx-auto">
                                        <i class="las la-lira-sign fs-22 align-self-center mb-0 text-primary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card bg-corner-img">
                        <div class="card-body">
                            <div class="row d-flex justify-content-center">
                                <div class="col-9">
                                    <p class="text-muted text-uppercase mb-0 fw-normal fs-13">Toplam Kazanç</p>
                                    <h4 class="mt-1 mb-0 fw-medium">{{$company->incomes->sum("amount")-$company->expenses->sum("amount")}}</h4>
                                </div>
                                <div class="col-3 align-self-center">
                                    <div
                                        class="d-flex justify-content-center align-items-center thumb-md border-dashed border-primary rounded mx-auto">
                                        <i class="las la-lira-sign fs-22 align-self-center mb-0 text-primary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <table class="table table-striped table-bordered">
                <tbody>
                <tr>
                    <td>Logo</td>
                    <td>
                        @if($company->hasMedia("image"))
                            <img src="{{$company->getFirstMediaUrl("image")}}" title="{{$company->name}}" height="50">
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Firma Ünvanı</td>
                    <td>{{$company->name}}</td>
                </tr>
                <tr>
                    <td>Yetkilisi</td>
                    <td>{{$company->authorized}}</td>
                </tr>
                <tr>
                    <td>E-Posta</td>
                    <td>{{$company->email}}</td>
                </tr>
                <tr>
                    <td>Telefon</td>
                    <td>{{$company->phone}}</td>
                </tr>
                <tr>
                    <td>İl</td>
                    <td>{{$company->cityName}}</td>
                </tr>
                <tr>
                    <td>İlçe</td>
                    <td>{{$company->districtName}}</td>
                </tr>
                <tr>
                    <td>Adres</td>
                    <td>{{$company->address}}</td>
                </tr>
                <tr>
                    <td>Vergi Dairesi</td>
                    <td>{{$company->tax_office}}</td>
                </tr>
                <tr>
                    <td>Vergi Numarası</td>
                    <td>{{$company->tax_number}}</td>
                </tr>

                </tbody>
            </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
            <button type="submit" class="btn btn-primary">Kaydet</button>
        </div>
    </div>
</div>
