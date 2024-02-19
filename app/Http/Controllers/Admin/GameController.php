<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Draw;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Game\DTO\GameData;
use Modules\Game\DTO\GetGameParamData;
use Modules\Game\Models\Game;
use Modules\Game\Services\Interfaces\InterfaceGameService;

class GameController extends Controller
{
    public function __construct(protected InterfaceGameService $gameService)
    {
    }

    public function index(Request $request): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $data['from'] = $request->get('from');
        $data['to'] = $request->get('to');
        $data['orderByColumn'] = $request->get('orderByColumn');
        $data['orderByDirection'] = $request->get('orderByDirection');
        $params = new GetGameParamData(
            withCount: ['lotteryNumbers'],
            from: $data['from'],
            to: $data['to'],
            orderByColumn: $data['orderByColumn'],
            orderDirection: $data['orderByDirection']
        );
        $data['lists'] = $this->gameService->getBuilderOrPaginator($params);

        return view('admin.games.index', $data);
    }

    public function create(): View|Factory|Application
    {
        return view('admin.games.store');
    }

    public function store(GameData $gameData): string|RedirectResponse
    {
        try {
            $this->gameService->create($gameData);

            return redirect()->route('admin.games.index');
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function storeLottery(Request $request)
    {
        $gameId = $request->get('gameId');
        if ($game = $this->gameService->findById($gameId)) {
            $winningNumbers = $request->get('winningNumbers');
            $attributes = collect(['first', 'second', 'third', 'fourth', 'fifth', 'sixth'])
                ->combine($winningNumbers)
                ->merge(['gameId' => $game->id])
                ->toArray();

            Draw::query()->create($attributes);

            return redirect()->route('admin.games.index')->with('success', 'Task Completed.');
        }

        return redirect()->route('admin.games.index')->withErrors(['error' => 'Sorry task failed.']);
    }

    public static function show(Game $game, $field = null)
    {
        return $game;
    }

    public function edit(Game $game): View|Factory|Application
    {
        return view('admin.games.edit')->with('game', $game);
    }

    public function update(Game $game, GameData $gameData)
    {
        try {
            Game::query()->update($gameData->all());

            return redirect()->route('admin.games.index')->with('success', 'Update successful.');
        } catch (\Exception $exception) {
            return redirect()->route('admin.games.index')->withInput()->withErrors(['errors' => 'Update fail.']);
        }
    }

    public function destroy(Game $game)
    {
        if ($game->delete()) {
            return redirect()->route('admin.games.index');
        }
    }
}
