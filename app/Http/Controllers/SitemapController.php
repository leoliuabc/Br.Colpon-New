<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Cache;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Category;
use App\Store;
use App\Offer;

class SitemapController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ( !Cache::has('sitemapIndex') ) {
            $stores = Store::all();
            $offers = Offer::where('status',1)->get();
            $data = ['stores' => $stores, 'offers' => $offers];
            Cache::put('sitemapIndex', $data, 120);
        }
        return view('sitemap',Cache::get('sitemapIndex'));
    }
}
