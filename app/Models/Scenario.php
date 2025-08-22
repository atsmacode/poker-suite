<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Scenario extends Model
{
    public function hand(): BelongsTo
    {
        return $this->belongsTo(Hand::class);
    }
}
