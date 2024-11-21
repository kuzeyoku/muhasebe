<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Company extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public $fillable = [
        "name",
        "authorized",
        "email",
        "phone",
        "website",
        "address",
        "city_id",
        "district_id",
        "description"
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function getDistrictNameAttribute(): string
    {
        return $this->district()->first()->name;
    }

    public function getCityNameAttribute(): string
    {
        return $this->city()->first()->name;
    }

    public function licences(): HasMany
    {
        return $this->hasMany(Licence::class);
    }

    public function contracts(): HasMany
    {
        return $this->hasMany(Contract::class);
    }

    public function Invoices(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }

    public function incomes(): HasMany
    {
        return $this->hasMany(Income::class);
    }

    public function expenses(): HasMany
    {
        return $this->hasMany(Expense::class);
    }

}
