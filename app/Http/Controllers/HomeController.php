<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\ApiController as Api;
use App\Models\LotteryCategory as Lcat;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Modules\Game\Models\Ticket;

class HomeController extends Controller
{
    private $totalSale;

    private $nextDraw;

    private $lcat;

    public function __construct()
    {
        $this->totalSale = Api::currentTotalEarning();
        $allFutureDraw = Api::getAllFutureDraw();
        if ($allFutureDraw) {
            $nextDrawUnix = $allFutureDraw[0]->draw_date;
        } else {
            $nextDrawUnix = null;
        }
        $this->nextDraw = gmdate('m/d/Y', $nextDrawUnix);
        $this->lcat = Lcat::all();
    }

    public function index()
    {
        $title = 'home';

        return view('frontend.index')->with(['title' => $title, 'lcat' => $this->lcat, 'totalSale' => $this->totalSale, 'nextDraw' => $this->nextDraw]);
    }

    public function about()
    {
        $title = 'about';

        return view('frontend.about')->with(['title' => $title, 'totalSale' => $this->totalSale, 'nextDraw' => $this->nextDraw]);
    }

    public function blog()
    {
        $title = 'blog';

        return view('frontend.blog')->with(['title' => $title, 'totalSale' => $this->totalSale, 'nextDraw' => $this->nextDraw]);
    }

    public function contact()
    {
        $title = 'contact';

        return view('frontend.contact')->with(['title' => $title, 'totalSale' => $this->totalSale, 'nextDraw' => $this->nextDraw]);
    }

    public function resultpage()
    {
        $title = 'results';

        return view('frontend.result')->with(['title' => $title, 'lcat' => $this->lcat, 'totalSale' => $this->totalSale, 'nextDraw' => $this->nextDraw]);
    }

    public function faq()
    {
        $title = 'faq';

        return view('frontend.faq')->with(['title' => $title, 'totalSale' => $this->totalSale, 'nextDraw' => $this->nextDraw]);
    }

    public function viewTicket(Ticket $ticket): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $title = 'View Ticket';
        return view('frontend.view-ticket')->with('ticket', $ticket);
    }
}
