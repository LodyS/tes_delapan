<?php

namespace App\Http\Controllers;
Use App\BrowserStat;
use Illuminate\Http\Request;

class BrowserController extends Controller
{
    public function index ()
    {
        $browsers = BrowserStat::all();

        $datapoints = [];

        foreach ($browsers as $browser)
        {
            $datapoints[] = [
                'name'=>$browser['name'],
                'y'=>floatval($browser['total_usage'])
            ];
        }

        return view ('pie-chart', ['data'=>json_encode($datapoints)]);
    }
}
