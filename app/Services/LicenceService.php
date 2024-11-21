<?php

namespace App\Services;

use App\Models\Licence;

class LicenceService extends BaseService
{
    public function __construct(Licence $model)
    {
        parent::__construct($model);
    }
}
