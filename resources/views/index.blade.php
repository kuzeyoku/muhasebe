@extends("layouts.main")
@section("title", "Dashboard")
@section("content")
    <div class="row">
        <div class="col-lg-4">
            <div class="card bg-corner-img">
                <div class="card-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col-9">
                            <p class="text-muted text-uppercase mb-0 fw-normal fs-13">Toplam Şirket</p>
                            <h4 class="mt-1 mb-0 fw-medium">{{$companies->count()}}</h4>
                        </div>
                        <div class="col-3 align-self-center">
                            <div
                                class="d-flex justify-content-center align-items-center thumb-md border-dashed border-primary rounded mx-auto">
                                <i class="iconoir-building fs-22 align-self-center mb-0 text-primary"></i>
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
                            <p class="text-muted text-uppercase mb-0 fw-normal fs-13">Toplam Ruhsat</p>
                            <h4 class="mt-1 mb-0 fw-medium">{{$licences->count()}}</h4>
                        </div>
                        <div class="col-3 align-self-center">
                            <div
                                class="d-flex justify-content-center align-items-center thumb-md border-dashed border-primary rounded mx-auto">
                                <i class="iconoir-page fs-22 align-self-center mb-0 text-primary"></i>
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
                            <p class="text-muted text-uppercase mb-0 fw-normal fs-13">Toplam Kesilen Fatura</p>
                            <h4 class="mt-1 mb-0 fw-medium">{{$invoices->count()}}</h4>
                        </div>
                        <div class="col-3 align-self-center">
                            <div
                                class="d-flex justify-content-center align-items-center thumb-md border-dashed border-primary rounded mx-auto">
                                <i class="iconoir-cash fs-22 align-self-center mb-0 text-primary"></i>
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
                            <p class="text-muted text-uppercase mb-0 fw-normal fs-13">Toplam Fatura Tutarı</p>
                            <h4 class="mt-1 mb-0 fw-medium">{{$invoices->sum("amount")}}</h4>
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
                            <p class="text-muted text-uppercase mb-0 fw-normal fs-13">Toplam Gelir</p>
                            <h4 class="mt-1 mb-0 fw-medium">{{$incomes->sum("amount")}}</h4>
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
                            <p class="text-muted text-uppercase mb-0 fw-normal fs-13">Toplam Gider</p>
                            <h4 class="mt-1 mb-0 fw-medium">{{$expenses->sum("amount")}}</h4>
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
    <div class="row">
        <div class="col-lg-6">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <td colspan="2">Gelirler</td>
                </tr>
                </thead>
                @foreach(\App\Enums\IncomeTypeEnum::cases() as $type)
                    <tr>
                        <td>{{$type->label()}}</td>
                        <td>{{$incomes->where("type", $type->value)->sum("amount")}} <i class="las la-lira-sign"></i>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="col-lg-6">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <td colspan="2">Giderler</td>
                </tr>
                </thead>
                @foreach(\App\Enums\ExpenseTypeEnum::cases() as $type)
                    <tr>
                        <td>{{$type->label()}}</td>
                        <td>{{$expenses->where("type", $type->value)->sum("amount")}} <i class="las la-lira-sign"></i>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection