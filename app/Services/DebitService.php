<?php

namespace App\Services;

use App\Models\Debit;

class DebitService extends BaseService
{
    public function __construct(Debit $model)
    {
        parent::__construct($model);
    }
}
