<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class AgentController extends Controller
{
    public function index()
    {
        $lists = User::query()
            ->select(['id', 'name', 'email', 'created_at'])
            ->withCount(['tickets', 'lotteryNumbers'])
            ->paginate(10);

        return view('admin.agents.index')->with('lists', $lists);
    }
}
