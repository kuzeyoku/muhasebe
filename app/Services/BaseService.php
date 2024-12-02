<?php

namespace App\Services;

use App\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BaseService
{
    public function __construct(private readonly Model $model)
    {
    }

    public function create(array $data): Model
    {
        $item = $this->model->create($data);
        if (request()->hasFile("image") && request()->file("image")->isValid())
            $item->addMediaFromRequest("image")->usingFileName(Str::random(8) . "." . request()->file("image")->extension())->toMediaCollection("image");
        if (request()->hasFile("file") && request()->file("file")->isValid())
            $item->addMediaFromRequest("file")->usingFileName(Str::random(8) . "." . request()->file("file")->extension())->toMediaCollection("files");
        return $item;
    }

    public function update(array $data, Model $item): Model
    {
        $item->update($data);
        if (request()->hasFile("image") && request()->file("image")->isValid()) {
            $item->clearMediaCollection("image");
            $item->addMediaFromRequest("image")->usingFileName(Str::random(8) . "." . request()->file("image")->extension())->toMediaCollection("image");
        }
        if (request()->has("delete_image"))
            $item->clearMediaCollection("image");
        return $item;
    }

    public function fileUpload(array $request, Model $model): void
    {
        foreach ($request["files"] as $file) {
            $model->addMedia($file)->usingFileName(Str::random(8) . "." . $file->extension())->toMediaCollection("files");
        }
    }

    public function delete(Model $model): bool
    {
        return $model->delete();
    }

    public function report(array $request): array
    {
        $query = $this->model->query();
        $licences = [];
        if (array_key_exists("company_id", $request)) {
            $company = Company::findOrFail($request["company_id"]);
            $licences = $company->licences->pluck('number', 'id');
            $query->where("company_id", $request["company_id"]);
        }
        if (array_key_exists("licence_id", $request))
            $query->where("licence_id", $request["licence_id"]);
        if (array_key_exists("start_date", $request) || array_key_exists("end_date", $request))
            $query->whereBetween("date", [$request["start_date"], $request["end_date"] ?? now()]);
        if (array_key_exists("type", $request))
            $query->where("type", $request["type"]);
        $items = $query->get();
        $total_amount = $items->sum("amount") . " ₺";
        $companies = \App\Models\Company::all()->pluck('name', 'id');
        return compact("items", 'companies', 'licences', 'total_amount');
    }
}
