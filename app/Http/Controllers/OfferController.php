<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Cache;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Store;
use App\Offer;

class OfferController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($store_id,$id)
    {
        if ( !Cache::has('offerIndex'.$store_id.$id) ) {
            $top_stores = Store::top_stores();
            $new_offers = Offer::new_offers();
            $offer = Offer::find($id);
            $store = Store::find($store_id);
            $data = ['top_stores' => $top_stores,'offer' => $offer,'store' => $store,'new_offers' => $new_offers];
            Cache::put('offerIndex'.$store_id.$id, $data, 120);
        }
        return view('offer',Cache::get('offerIndex'.$store_id.$id));
    }

    public function new_offers()
    {
        if ( !Cache::has('offerNew_offers') ) {
            $top_stores = Store::top_stores();
            $new_offers = Offer::new_offers();
            $data = ['top_stores' => $top_stores,'new_offers' => $new_offers];
            Cache::put('offerNew_offers', $data, 120);
        }
        return view('newoffer',Cache::get('offerNew_offers'));
    }
}
