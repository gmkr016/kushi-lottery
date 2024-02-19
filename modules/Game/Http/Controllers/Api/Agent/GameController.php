<?php

namespace Modules\Game\Http\Controllers\Api\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Modules\Game\DTO\GameData;
use Modules\Game\DTO\GetGameParamData;
use Modules\Game\Http\Requests\Agent\CreateGameRequest;
use Modules\Game\Services\Interfaces\InterfaceGameService;
use Symfony\Component\HttpFoundation\Response;

class GameController extends Controller
{
    public function __construct(protected InterfaceGameService $gameService)
    {
    }

    public function store(CreateGameRequest $request): JsonResponse|Response
    {
        try {
            $data = GameData::from($request->validated());
            $response = GameData::from($this->gameService->create($data))->toArray();

            return response()->success(['data' => $response]);
        } catch (\Exception $exception) {
            Log::error(sprintf('class: %s, method: %s, message: %s', __CLASS__, __METHOD__, $exception->getMessage()));

            return response()->fail(['data' => 'Game creation fail.']);
        }
    }

    public function index()
    {
        $response = GameData::collection($this->gameService->getBuilderOrPaginator(new GetGameParamData));

        return response()->success(['data' => $response]);
    }
}
