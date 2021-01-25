<?php

namespace Modules\Game\Http\Controllers\Api\Agent;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Modules\Game\DTO\TicketData;
use Modules\Game\Http\Requests\Agent\CreateTicketRequest;
use Modules\Game\Models\Ticket;
use Modules\Game\Services\Interfaces\ILotteryNumberService;
use Modules\Game\Services\Interfaces\ITicketService;

class TicketController
{
    public function __construct(protected ITicketService $ticketService, protected ILotteryNumberService $lotteryNumberService)
    {
    }

    public function store(CreateTicketRequest $request)
    {
        $validated = $request->validated();
        DB::beginTransaction();
        try {
            $ticketData = TicketData::from($validated);
            $lotteryNumbersWithType = $this->lotteryNumberService->prepareRowArray($validated['lotteryNumbers']);
            $this->ticketService->create($ticketData)->createManyLotteryNumbers($lotteryNumbersWithType);
            DB::commit();

            return response()->success(['data' => $this->ticketService->getTicketModel()]);

        } catch (\Exception $exception) {
            DB::rollBack();

            return response()->fail(['data' => $exception->getMessage()]);
        }
    }

    public function show(Ticket $ticket)
    {
        $this->ticketService->setTicketModel($ticket);
        $response = $this->ticketService->getTicketModel(true);

        return response()->success(['data' => $response]);
    }
}
