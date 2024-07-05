<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ativo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class AtivoController extends Controller
{
    public function index(Request $request)
    {
        return Ativo::query()
            ->select('id', 'nome')
            ->when(
                $request->search,
                fn (Builder $query) => $query->where('nome', 'like', "%{$request->search}%"))
            ->when(
                $request->exists('selected'),
                fn (Builder $query) => $query->whereIn('id', $request->input('selected', [])),
                fn (Builder $query) => $query->limit(5)
            )
            ->orderBy('nome')
            ->get()
            //->map(function (Ativo $ativo) {})
            ;
    }
}
