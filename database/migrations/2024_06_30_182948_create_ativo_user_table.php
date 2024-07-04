<?php

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
        Schema::create('ativo_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('ativo_id')
                ->nullable()
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('ativo_tipo_id')
                ->nullable()
                ->constant()
                ->onDelete('cascade');
            $table->integer('meta');
            $table->string('nome_ativo')->nullable();
            $table->decimal('quantidade');
            $table->decimal('valor_atual');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ativo_user');
    }
};
