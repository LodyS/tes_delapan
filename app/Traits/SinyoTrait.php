<?php
namespace App\Traits;
use App\Item;
use DB;

trait SinyoTrait {

    public function index()
    {
        $data = collect(DB::select('select transaction_number, item_number, cost, quantity from item group by transaction_number'));
        $data[0]->transaction_number =100;

        return view('item/index', compact('data'));
    }

    public function subTotal()
    {
        $items = Item::all();

        return view ('item/subtotal', compact('items'));
    }

    public function total ()
    {
        $items = Item::all();

        return view('item/total', compact('items'));
    }

    public function main ()
    {
        $items = Item::all();

        return view('item/main', compact('items'));
    }
}
