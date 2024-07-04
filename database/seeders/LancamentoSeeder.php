<?php

namespace Database\Seeders;

use App\Enums\AtivoTipoEnum;
use App\Models\Ativo;
use App\Models\AtivoTipo;
use App\Models\AtivoUser;
use App\Models\Lancamento;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class LancamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Criar Usuario
        $user = User::factory()->create([
            'id' => 1,
            'name' => 'Wesley Vieira',
            'email' => 'wesleyvieira12@gmail.com',
            'password' => Hash::make('12345678')
        ]);

        //Criar tipos de ativos
        $acao = AtivoTipo::create([
            'nome' => AtivoTipoEnum::ACAO
        ]);
        $fii = AtivoTipo::create([
            'nome' => AtivoTipoEnum::FII
        ]);
        $bdr = AtivoTipo::create([
            'nome' => AtivoTipoEnum::BDR
        ]);

        //Criar ativos
        $ativoGOAU3 = Ativo::create([
            'api_id' => 1,
            'fonte' => 'brapi',
            'nome' => 'GOAU3',
            'valor_atual' => 10.50,
            'ativo_tipo_id' => $acao->id       
        ]);

        $ativoMXRF11 = Ativo::create([
            'api_id' => 1,
            'fonte' => 'brapi',
            'nome' => 'MXFR11',
            'valor_atual' => 11.50,
            'ativo_tipo_id' => $fii->id        
        ]);

        $ativoTSLA34 = Ativo::create([
            'api_id' => 1,
            'fonte' => 'brapi',
            'nome' => 'TLSA34',
            'valor_atual' => 120.50,
            'ativo_tipo_id' => $bdr->id        
        ]);

        //Criar AtivoUsers
        $ativoUsuarioGOAU3 = $user->ativo_user()->create([
            'ativo_id' => $ativoGOAU3->id,
            'meta' => 20,
            'quantidade' => 30,
            'valor_atual' => 30 * 10.50
        ]);

        $ativoUsuarioMXRF11 = $user->ativo_user()->create([
            'ativo_id' => $ativoMXRF11->id,
            'meta' => 30,
            'quantidade' => 1,
            'valor_atual' => 11.50
        ]);

        $ativoUsuarioTSLA34 = $user->ativo_user()->create([
            'ativo_id' => $ativoTSLA34->id,
            'meta' => 50,
            'quantidade' => 1,
            'valor_atual' => 120.50
        ]);

        //criar lançamentos
        Lancamento::create([
            'ativo_user_id' => $ativoUsuarioGOAU3->id,
            'quantidade' => 10,
            'valor_compra' => 10.50,
            'data_compra' => now()
        ]);

        Lancamento::create([
            'ativo_user_id' => $ativoUsuarioGOAU3->id,
            'quantidade' => 20,
            'valor_compra' => 10.50,
            'data_compra' => now()
        ]);

        Lancamento::create([
            'ativo_user_id' => $ativoUsuarioMXRF11->id,
            'quantidade' => 1,
            'valor_compra' => 11.50,
            'data_compra' => now()
        ]);

        Lancamento::create([
            'ativo_user_id' => $ativoUsuarioTSLA34->id,
            'quantidade' => 1,
            'valor_compra' => 120.50,
            'data_compra' => now()
        ]);

    }
}
