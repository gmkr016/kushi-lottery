<?php

namespace Modules\Game\Services;

use Modules\Game\DTO\TicketData;
use Modules\Game\Models\Ticket;
use Modules\Game\Services\Interfaces\ILotteryNumberService;
use Modules\Game\Services\Interfaces\ITicketService;

class TicketService implements ITicketService
{
    public function __construct(private ?Ticket $ticket)
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

    public function createManyLotteryNumbers(array $lotteryNumbers): static
    {
        $this->ticket->lotteryNumbers()->createMany($lotteryNumbers);

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
