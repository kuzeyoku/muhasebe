<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static paginate(int $int)
 */
class Debit extends Model
{
    protected $fillable = ["name", "description", "amount", "due_date"];

    public function scopeBetweenDueDate($query, $maturity)
    {
        return $query->whereBetween("due_date", [now(), now()->addDays($maturity)]);
    }

    public function scopeOverDue($query)
    {
        return $query->where("due_date", "<", now());
    }
}


