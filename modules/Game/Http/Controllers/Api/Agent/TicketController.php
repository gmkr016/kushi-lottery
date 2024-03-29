<?php

namespace Modules\Game\Http\Controllers\Api\Agent;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Modules\Game\DTO\TicketData;
use Modules\Game\Http\Requests\Agent\CreateTicketRequest;
use Modules\Game\Models\Ticket;
use Modules\Game\Services\Interfaces\InterfaceLotteryNumberService;
use Modules\Game\Services\Interfaces\InterfaceTicketService;

class TicketController
{
    public function __construct(protected InterfaceTicketService $ticketService, protected InterfaceLotteryNumberService $lotteryNumberService)
    {
    }

    public function store(CreateTicketRequest $request)
    {
        $validated = $request->validated();
        DB::beginTransaction();
        try {
            $ticketData = TicketData::from($validated);
            $lotteryNumbersRowWithType = $this->lotteryNumberService->prepareRowArray($validated['lotteryNumbers']);
            $this->ticketService->create($ticketData)->createManyLotteryNumbers($lotteryNumbersRowWithType);
            DB::commit();
            $responseData['data'] = $this->ticketService->getTicketModel();
            $responseData['data']['infoText'] = config('lottery.ticketInfoText');
            $responseData['data']['dueDate'] = Carbon::now()->addYear()->format('Y-m-d');
            return response()->success($responseData);

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error(sprintf('class: %s, method: %s, message: %s', __CLASS__, __METHOD__, $exception->getMessage()));

            return response()->fail(['data' => $exception->getMessage()]);
        }
    }

    public function show(Ticket $ticket)
    {
        try {
//            $this->ticketService->setTicketModel($ticket);
            $response = $ticket->load('lotteryNumbers');

            return response()->success(['data' => $response]);
        } catch (\Exception $exception) {
            return response()->success(['data' => $exception->getMessage()]);
        }
    }
}
