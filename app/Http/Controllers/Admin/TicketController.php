<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Modules\Game\Models\LotteryNumber;
use Modules\Game\Models\Ticket;

class TicketController extends Controller
{
    public function index(Request $request, $pageSize = 10)
    {
        $userId = $request->get('user');
        $user = User::query()->select(['id', 'name'])->with('tickets.lotteryNumbers')->find($userId);
        $lists = [];
//return $user;
        $user->getRelationValue('tickets')->each(function (Ticket $ticket) use (&$lists) {
            $lists[$ticket['id']]['identificationType'] = $ticket['identificationType'];
            $lists[$ticket['id']]['identificationNumber'] = $ticket['identificationNumber'];
            $lists[$ticket['id']]['soldAt'] = $ticket['createdAt'];
            if (count($ticket->getRelation('lotteryNumbers'))) {
		foreach($ticket->getRelation('lotteryNumbers') as $key=>$lotteryNumber){
			$lists[$lotteryNumber['ticketId']]['numbers'][$key] = $lotteryNumber;
		}
//                $ticket->getRelation('lotteryNumbers')->each(function (LotteryNumber $lotteryNumber) use (&$lists) {
//		Arr::map(['first', 'second', 'third', 'fourth', 'fifth', 'sixth'], function ($key, $index) use (&$lists, $lotteryNumber) {
  //                      return $lists[$lotteryNumber['ticketId']]['numbers'][$key] = $lotteryNumber[$key];
    //                });
      //          });
            }
        });
//return $lists;
        return view('admin.tickets.index')->with(['lists' => $lists, 'user' => $user]);
    }
}
