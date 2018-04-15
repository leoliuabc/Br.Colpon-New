<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Store;
use App\Offer;
use DB;

class SearchController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $store_name = $request->input('q');
        $top_stores = Store::top_stores();
        $store_id = DB::table('stores')->where('name', 'like', $store_name.'%')->value('id');
        $store = Store::find($store_id);
        $new_offers = Offer::new_offers();
        if (empty($store)) {
            return view('nofound',['store_name' => $store_name]);
        } else {
            return view('store',['top_stores' => $top_stores,'store' => $store,'new_offers' =>$new_offers]);
        }
    }
}
