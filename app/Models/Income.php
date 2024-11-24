<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @method static paginate(int $int)
 * @property mixed $company
 */
class Income extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'company_id',
        'licence_id',
        'type',
        'amount',
        'date',
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
