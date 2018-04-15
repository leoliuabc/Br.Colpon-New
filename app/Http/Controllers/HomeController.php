<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Cache;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Store;
use App\Offer;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ( !Cache::has('homeIndex') ) {
            $top_stores = Store::top_stores();
            $new_offers = Offer::new_offers();
            $data = ['top_stores' => $top_stores,'new_offers' => $new_offers];
            Cache::put('homeIndex', $data, 120);
        }
        return view('home',Cache::get('homeIndex'));
    }
}
