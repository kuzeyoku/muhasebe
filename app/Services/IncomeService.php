<?php

namespace App\Services;

use App\Models\Income;
class IncomeService extends BaseService
{
    public function __construct(Income $model)
    {
        parent::__construct($model);
    }
}
