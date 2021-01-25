<?php

namespace Modules\Game\Http\Controllers\Api\Agent;

use Illuminate\Http\JsonResponse;
use Modules\Game\DTO\GameData;
use Modules\Game\Http\Requests\Agent\CreateGameRequest;
use Modules\Game\Services\Interfaces\IGameService;
use Symfony\Component\HttpFoundation\Response;

class GameController
{
    public function __construct(protected IGameService $gameService)
    {
    }

    public function store(CreateGameRequest $request): JsonResponse|Response
    {
        $data = GameData::from($request->validated());
        $response = GameData::from($this->gameService->create($data))->toArray();

        return response()->success(['data' => $response]);
    }

    public function index()
    {
        $response = GameData::collection($this->gameService->get());

        return response()->success(['data' => $response]);
    }
}
