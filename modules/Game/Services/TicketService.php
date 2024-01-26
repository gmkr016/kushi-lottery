<?php

namespace Modules\Game\Services;

use Modules\Game\DTO\LotteryNumberData;
use Modules\Game\DTO\TicketData;
use Modules\Game\Models\Ticket;
use Modules\Game\Services\Interfaces\InterfaceLotteryNumberService;
use Modules\Game\Services\Interfaces\InterfaceTicketService;

class TicketService implements InterfaceTicketService
{
    public function __construct(private ?Ticket $ticket, protected InterfaceLotteryNumberService $lotteryNumberService)
    {

    }

    public function show(Ticket $ticket, array $columns = ['*'], $pageSize = 10): static
    {
        $this->ticket = $ticket;

        return $this;
    }

    public function create(TicketData $ticketData): static
    {
        $ticket = $this->ticket
            ->forceFill($ticketData->toArray());
        $ticket->save();

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

    public function getTicketModel(bool $withNumbers = false): Ticket
    {
        if ($withNumbers) {
            $this->ticket->load('lotteryNumbers');
        }

        return $this->ticket;
    }

    public function setTicketModel(Ticket $ticket): void
    {
        $this->ticket = $ticket;
    }
}
