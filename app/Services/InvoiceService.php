<?php

namespace App\Services;
use App\Models\Invoice;

class InvoiceService extends BaseService
{
    public function __construct(Invoice $model)
    {
        parent::__construct($model);
    }
}
