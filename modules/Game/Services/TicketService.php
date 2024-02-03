<?php

namespace Modules\Game\Services;

use Modules\Game\DTO\LotteryNumberData;
use Modules\Game\DTO\TicketData;
use Modules\Game\Models\Ticket;
use Modules\Game\Services\Interfaces\InterfaceLotteryNumberService;
use Modules\Game\Services\Interfaces\InterfaceTicketService;

class TicketService implements InterfaceTicketService
{
    public function __construct(protected ?Ticket $ticket, protected InterfaceLotteryNumberService $lotteryNumberService)
    {

    }

    public function show(Ticket $ticket, array $columns = ['*']): array
    {
        return $ticket->only($columns);
    }

    public function create(TicketData $ticketData): static
    {
        $this->ticket = (new Ticket)
            ->forceFill($ticketData->toArray());
        $this->ticket->save();

        return $this;
    }

    public function createManyLotteryNumbers(array $lotteryNumbersRowWithType): static
    {
        array_walk($lotteryNumbersRowWithType, function ($rowWithType) {
            $lotteryNumberData = LotteryNumberData::from($rowWithType + ['ticketId' => $this->ticket->getAttribute('id')]);
            $this->lotteryNumberService->create($lotteryNumberData);
        });
        $this->ticket->load('lotteryNumbers');

        return $this;
    }

    public function getTicketModel(Ticket $ticket, bool $withLotteryNumbers = false): Ticket
    {
        if ($withLotteryNumbers) {
            $ticket->load('lotteryNumbers');
        }

        return $ticket;
    }

}
