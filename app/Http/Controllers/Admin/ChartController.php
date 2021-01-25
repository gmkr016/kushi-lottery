<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ChartController extends Controller
{
    //
    /**
     * Get Data of agentwise sale
     */
    public function agentWiseSale()
    {
        return view('admin.charts.agentWiseSale');
    }

    /**
     * Get District Wise Sale
     */
    public function districtWiseSale()
    {
        return view('admin.charts.districtWiseSale');
    }

    /**
     * Get Province wise sale
     */
    public function provinceWiseSale()
    {
        return view('admin.charts.provinceWiseSale');
    }

    public function drawWiseSale()
    {
        return view('admin.charts.drawWiseSale');
    }
}
