<?php

namespace Modules\Game\Services;

use Illuminate\Support\Arr;

class WinningPositionSelector
{
    public function __construct(
        private readonly array $draw,
        private readonly array $lotteryNumbers,
        private array $winners = [
            'fifth' => [
                'position' => 5,
                'intersection' => 3,
                'lotteryNumbers' => [],
            ],
            'fourth' => [
                'position' => 4,
                'intersection' => 4,
                'lotteryNumbers' => [],
            ],
            'third' => [
                'position' => 3,
                'intersection' => 5,
                'lotteryNumbers' => [],
            ],
            'second' => [
                'position' => 2,
                'intersection' => 5,
                'lotteryNumbers' => [],
            ],
            'first' => [
                'position' => 1,
                'intersection' => 6,
                'lotteryNumbers' => [],
            ],
        ],
        private readonly array $columns = ['first', 'second', 'third', 'fourth', 'fifth', 'sixth']
    ) {
        collect($this->winners)->keys()->each(fn ($position) => $this->setWinners($position));
    }

    public function getWinners(?string $position = null): array
    {
        if (is_null($position)) {
            return $this->winners;
        } elseif (in_array($position, $this->columns)) {
            return $this->winners[$position];
        } else {
            throw new \Error(sprintf('Only %s positions allowed.', Arr::join($this->columns, ',')));
        }
    }

    public function setWinners(string $position): void
    {
        if (! in_array($position, $this->columns)) {
            throw new \Error(sprintf('Only %s positions allowed.', Arr::join($this->columns, ',')));
        }
        $this->winners[$position]['lotteryNumbers'] = $this->getWinnersOf($this->winners[$position]['intersection']);
    }

    public function getDraw(): array
    {
        return $this->draw;
    }

    public function getLotteryNumbers(): array
    {
        return $this->lotteryNumbers;
    }

    private function getWinnersOf(int $intersection): array
    {
        return collect($this->lotteryNumbers)->filter(function ($numbers) use ($intersection) {
            $drawNumbers = collect($this->draw)->only($this->columns)->toArray();
            $intersected = array_intersect($numbers, $drawNumbers);

            return count($intersected) == $intersection;
        })->toArray();
    }
}
