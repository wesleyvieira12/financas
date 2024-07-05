<?php

use App\Enums\LancamentoTipoEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lancamentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ativo_user_id')->constrained()->onDelete('cascade');
            $table->decimal('quantidade');
            $table->decimal('valor_compra');
            $table->date('data_compra');
            $table->string('tipo')->default(LancamentoTipoEnum::COMPRA);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lancamentos');
    }
};
