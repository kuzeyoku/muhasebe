<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @property mixed $company
 */
class Contract extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        "title",
        'company_id',
        "licence_id",
        'start_date',
        'end_date',
        'status',
        'description',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function licence(): BelongsTo
    {
        return $this->belongsTo(Licence::class);
    }
}
