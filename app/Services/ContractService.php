<?php

namespace App\Services;
use App\Models\Contract;

class ContractService extends BaseService
{
    public function __construct(Contract $model)
    {
        parent::__construct($model);
    }

}
