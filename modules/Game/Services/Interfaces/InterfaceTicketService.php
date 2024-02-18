<?php

namespace Modules\Game\Services\Interfaces;

use Illuminate\Contracts\Pagination\Paginator;
use Modules\Game\DTO\TicketData;
use Modules\Game\Models\Ticket;

interface InterfaceTicketService
{
    public function show(Ticket $ticket, array $columns = ['*']): array;

    public function create(TicketData $ticketData): static;

    public function createManyLotteryNumbers(array $lotteryNumbersRowWithType);

    public function getTicketModel(bool $withLotteryNumbers = false): Ticket;

    public function totalCount(): int;

    public function setTicketModel(Ticket $ticket): static;

    public function listTicketsWithLotteryNumberCountByGame(array $columns = ['*']): Paginator;
}
