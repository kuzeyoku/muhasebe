<?php

namespace App\Services;

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
        return $item;
    }

    public function update(array $data, Model $item): Model
    {
        $item->update($data);
        if (request()->hasFile("image") && request()->file("image")->isValid()) {
            $item->clearMediaCollection("image");
            $item->addMediaFromRequest("image")->usingFileName(Str::random(8) . "." . request()->file("image")->extension())->toMediaCollection("image");
        }
        return $item;
    }


    public function delete(Model $model): bool
    {
        return $model->delete();
    }
}
