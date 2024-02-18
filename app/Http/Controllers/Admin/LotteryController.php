<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Modules\Game\Services\Interfaces\InterfaceGameService;

class LotteryController extends Controller
{
    public function __construct(protected InterfaceGameService $gameService)
    {
    }

    public function index()
    {
        $lists = User::query()
            ->select(['id', 'name', 'email', 'created_at'])
            ->withCount(['tickets', 'lotteryNumbers'])
            ->paginate(10);

        return view('admin.agents.index')->with('lists', $lists);
    }
}
