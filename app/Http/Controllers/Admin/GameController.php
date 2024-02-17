<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Game\DTO\GameData;
use Modules\Game\Models\Game;
use Modules\Game\Services\Interfaces\InterfaceGameService;

class GameController extends Controller
{
    public function __construct(protected InterfaceGameService $gameService)
    {
    }

    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $lists = $this->gameService->get(withLotteryNumberCount: true);

        return view('admin.games.index')->with('lists', $lists);
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
        return $this->gameService->findById($gameId);
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
