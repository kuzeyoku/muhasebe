<?php

namespace App\Services;

use App\Models\Expense;

class ExpenseService extends BaseService
{
    public function __construct(Expense $model)
    {
        parent::__construct($model);
    }
}
