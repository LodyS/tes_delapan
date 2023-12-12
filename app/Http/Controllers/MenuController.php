<?php

namespace App\Http\Controllers;
use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function getMenu ()
    {
        $menu = new Menu;
        $menuList = $menu->tree();

        return view('menu/index')->with('menulist', $menuList);
    }
}
