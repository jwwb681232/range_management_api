<?php

namespace App\Api\Exports;

use App\Api\Transformers\Admin\Card\IndexTransformer;
use App\Models\Card;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class CardExport implements FromView,WithColumnWidths
{
    public function view(): View
    {
        return view('export.api.cards', [
            'cards' => $this->cards()
        ]);
    }

    public function columnWidths(): array
    {
        return [
            'A' => 30,
            'B' => 30,
            'C' => 30,
            'D' => 30,
        ];
    }

    public function cards()
    {
        $keyword = request()->input('keyword');
        $unit    = request()->input('unit');
        $mode    = request()->input('mode');

        $cards = Card::when($keyword, fn($query) => $query->where('number', 'LIKE', "%$keyword%"))
            ->when($unit, fn($query) => $query->whereHas('user', fn($subQuery) => $subQuery->where('unit_id', $unit)))
            ->when($mode, fn($query) => $query->whereHas('user', fn($userQuery) => $userQuery->whereHas('modes', fn($modesQuery) => $modesQuery->where('id', $mode))))
            ->with([
                'user'=>fn($query)=>$query->with(['unit:id,name','modes:id,name'])->select(['id','name','unit_id','card_id'])
            ])
            ->get();

        return IndexTransformer::transform($cards);
    }
}
