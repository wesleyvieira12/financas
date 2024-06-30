<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Ativo extends Model
{
    use HasFactory;

    public function ativo_tipo(): HasOne
    {
        return $this->hasOne(AtivoTipo::class);
    }
}
