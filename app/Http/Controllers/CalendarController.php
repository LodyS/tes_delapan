<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\EventList;

class CalendarController extends Controller
{
    public function index()
    {   
        return view('calender');
    }
    public function calendarEvents(Request $request)
    {
        $eventList = EventList::get();
        return response()->json(['acara'=>$eventList]);
    }
}