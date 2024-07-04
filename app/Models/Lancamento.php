<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Lancamento extends Model
{
    use HasFactory;

    public function ativo_user(): BelongsTo
    {
        return $this->belongsTo(AtivoUser::class);
    }
}
