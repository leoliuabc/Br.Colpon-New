<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Cache;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Store;
use App\Offer;

class StoreController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($titleslug,$id)
    {
        if ( !Cache::has('storeIndex'.$titleslug.$id) ) {
            $top_stores = Store::top_stores();
            $store = Store::find($id);
            $new_offers = Offer::new_offers();
            $data = ['top_stores' => $top_stores,'store' => $store,'new_offers' =>$new_offers];
            Cache::put('storeIndex'.$titleslug.$id, $data, 120);
        }
        return view('store',Cache::get('storeIndex'.$titleslug.$id));
    }

    public function map()
    {
        if ( !Cache::has('storeMap') ) {
            $initials = Store::initials();
            $stores = Store::all();
            $data = ['initials' => $initials,'stores' => $stores];
            Cache::put('storeMap', $data, 120);
        }
        return view('storemap',Cache::get('storeMap'));
    }
}
