<?php

use App\Models\Lancamento;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.app')] class extends Component
{
    public $lancamentos = [];

    public function mount()
    {
        $this->lancamentos =
            auth()
            ->user()
            ->lancamentos()
            ->with([
                'ativo_user:id,ativo_id' => [
                    'ativo:id,ativo_tipo_id,nome' => [
                        'ativo_tipo:id,nome'
                    ]
                ]
            ])->get();
    }
}; ?>

<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lançamentos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Ativo
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tipo
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Quantidade
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Valor Compra
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Data Compra
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($lancamentos as $lancamento)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$lancamento->ativo_user->ativo->nome}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$lancamento->ativo_user->ativo->ativo_tipo->nome}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$lancamento->quantidade}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$lancamento->valor_compra}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$lancamento->data_compra}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>