<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['budget_id', 'name', 'amount', 'category'])]
class Expense extends Model
{
    use SoftDeletes;

    public function budget()
    {
        return $this->belongsTo(Budget::class);
    }
}
