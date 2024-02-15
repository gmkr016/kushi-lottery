<?php

namespace Modules\Game\Services;

use Illuminate\Contracts\Pagination\Paginator;
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

    public function getTicketModel(bool $withLotteryNumbers = false): Ticket
    {
        if ($withLotteryNumbers) {
            $this->ticket->load('lotteryNumbers');
        }

        return $this->ticket;
    }

    public function totalCount(): int
    {
        return $this->ticket->newQuery()->count();
    }

    public function setTicketModel(Ticket $ticket): static
    {
        $this->ticket = $ticket;
        return $this;
    }

    public function listTicketsWithLotteryNumberCountByGame(array $columns =['*'], int $page = 10): Paginator
    {
        return Ticket::query()
            ->select($columns)
            ->with(['game' => fn($query) => $query->select(['id', 'title', 'startDate', 'endDate', 'drawDate'])])
            ->withCount('lotteryNumbers')
            ->simplePaginate($page);
    }
}
