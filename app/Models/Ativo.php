<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ativo extends Model
{
    use HasFactory;

    public function ativo_tipo(): BelongsTo
    {
        return $this->belongsTo(AtivoTipo::class);
    }
}
