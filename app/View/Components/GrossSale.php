<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Modules\Statistics\Services\Interfaces\InterfaceStatisticService;

class GrossSale extends Component
{
    public function __construct(public InterfaceStatisticService $statisticService)
    {

    }

    public function render(): View|Closure|string
    {
        $response = $this->statisticService->grossSaleByCurrentGame();
        $data['grossCurrentSale'] = $response['grossCurrentSale'];
        $response = $this->statisticService->grossSale();
        $data['grossSale'] = $response['grossSale'];
        return view('components.gross-sale', $data);
    }
}
