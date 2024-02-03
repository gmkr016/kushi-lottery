<?php

namespace Modules\Game\Services\Interfaces;

use Modules\Game\DTO\TicketData;
use Modules\Game\Models\Ticket;

interface InterfaceTicketService
{
    public function show(Ticket $ticket, array $columns = ['*']):array;

    public function create(TicketData $ticketData): static;

    public function createManyLotteryNumbers(array $lotteryNumbersRowWithType);

    public function getTicketModel(Ticket $ticket, bool $withLotteryNumbers = false): Ticket;
}
