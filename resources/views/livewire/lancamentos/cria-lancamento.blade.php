<?php

use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new class extends Component {

    #[Validate('required', message: 'Ativo é obrigatório')]
    public int $ativo_id;
    
    #[Validate('required', message: 'Quantidade é obrigatória')]
    #[Validate('gt:1', message: 'Deve ser maior que 0')] 
    public int $quantidade;
    
    #[Validate('required', message: 'Valor é obrigatório')]
    public float $valor;

    #[Validate('required', message: 'Data da compra é obrigatória')]
    public string $data;

    public function salvar()
    {
        $this->validate();
    }
}; ?>

<div>
    <form wire:submit="salvar">
        <x-select
            label="Ativo"
            placeholder="Selecione o ativo"
            :async-data="route('api.ativos')"
            option-label="nome"
            option-value="id"
            wire:model="ativo_id"/>
        <x-number 
            label="Quantidade" 
            wire:model="quantidade"/>
        <x-maskable
            label="Valor da ação"
            :mask="['#.##', '##.##', '###.##', '####.##', '#####.##', '######.##', '#######.##']"
            wire:model="valor"/>
        <x-datetime-picker
            label="Data da compra"
            without-time="true"
            wire:model.live="data"/>

        <button type="submit">Salvar</button>
    </form>
</div>
