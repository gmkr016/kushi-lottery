<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Modules\Game\Models\Game;
use Modules\Game\Services\Interfaces\InterfaceGameService;

class HeaderTop extends Component
{
    public function __construct(protected InterfaceGameService $gameService, public ?Game $game, public int $totalSale = 0)
    {
        //
    }

    public function getCurrentDraw(): void
    {
        $this->game = $this->gameService->getCurrentGame();
        if ($this->game != null) {
            $this->totalSale = $this->gameService->getSalesCount($this->game);
        }
    }

    public function render(): View|Closure|string
    {
        $this->getCurrentDraw();

        return view('components.header-top');
    }
}
