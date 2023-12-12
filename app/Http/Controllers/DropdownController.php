<?php

namespace App\Http\Controllers;
use App\Models\Country;
Use App\Models\City;
Use App\Models\State;
use Illuminate\Http\Request;

class DropdownController extends Controller
{
    public function country()
    {
        $data = Country::all();

        return response()->json($data);
    }

    public function state($country_id)
    {
        $data = State::where('country_id', $country_id)->get();

        return response()->json($data);
    }

    public function city($state_id)
    {
        $data = City::where('city_id', $state_id)->get();

        return response()->json($data);
    }
}
