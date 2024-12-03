<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Invoice extends Model implements HasMedia
{
    use InteractsWithMedia;

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

    public function scopePaid($query)
    {
        return $query->where("status", "paid");
    }

    public function scopeIncome($query)
    {
        return $query->where("type", "income");
    }

    public function scopeExpense($query)
    {
        return $query->where("type", "expense");
    }

    public function scopeUnpaid($query)
    {
        return $query->where("status", "unpaid");
    }

    public function scopeBetweenDueDate($query, $day)
    {
        return $query->whereBetween("due_date", [now(), now()->addDays($day)]);
    }
}
