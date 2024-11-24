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

    public
    function delete(Model $model): bool
    {
        return $model->delete();
    }
}
