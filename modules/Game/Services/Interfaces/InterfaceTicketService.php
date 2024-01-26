<?php

namespace Modules\Game\Services\Interfaces;

use Modules\Game\DTO\TicketData;
use Modules\Game\Models\Ticket;

interface InterfaceTicketService
{
    public function show(Ticket $ticket, array $columns = ['*'], $pageSize = 10): static;

    public function create(TicketData $ticketData): static;

    public function createManyLotteryNumbers(array $lotteryNumbersRowWithType);

    public function getTicketModel(bool $withNumbers): Ticket;

    public function setTicketModel(Ticket $ticket): void;
}
