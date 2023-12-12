<?php
namespace App\Http\Controllers;
use DB;
use App\WildLifePopulations;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function show ()
    {
        $population = WildLifePopulations::selectRaw('year(created_at) as year, sum(bears) as bears, sum(dolphins) as dolphins')
        ->orderby(DB::raw("(year(created_at))"))
        ->groupBy(DB::raw("(year(created_at))"))
        ->get();

        $res[] = ['Years', 'bears', 'dolphins'];

        foreach($population as $key =>$val)
        {
            $res[++$key] = [$val->year, (int)$val->bears, (int)$val->dolphins];
        }

        return view('line-chart')->with('population', json_encode($res));
    }
}
