<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invoices extends Model
{
    const UPDATED_AT = false;

    public function items(): HasMany{
        return $this->hasMany(InvoiceItem::class);
    }
}
