<?php

namespace App\Services;

use App\Models\Company;
use Illuminate\Database\Eloquent\Model;

class CompanyService extends BaseService
{
    public function __construct(Company $model)
    {
        parent::__construct($model);
    }

    public function delete(Model $company): bool
    {
        if ($company->licences()->exists())
            $company->licences()->delete();
        if ($company->contracts()->exists())
            $company->contracts()->delete();
        return $company->delete();
    }
}
