<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invoice extends Model
{
    protected $fillable = [
        'number',
        "type",
        'company_id',
        'licence_id',
        'amount',
        'date',
        'due_date',
        'status',
        "description"
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function licence(): BelongsTo
    {
        return $this->belongsTo(Licence::class);
    }

    public function getTypeNameAttribute(): string
    {
        return match ($this->type) {
            "income" => 'Gelir Faturası',
            "expense" => 'Gider Faturası',
        };
    }

    public function getStatusNameAttribute(): string
    {
        return match ($this->status) {
            "paid" => 'Ödendi',
            "unpaid" => 'Ödenmedi',
        };
    }
}
