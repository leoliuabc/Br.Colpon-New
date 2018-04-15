<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Offer extends Model
{
	public static function new_offers()
    {
        $new_offers = DB::table('offers')
        		->join('stores','offers.store_id','=','stores.id')
        		->select('offers.*','stores.name as store_name','stores.titleslug as store_titleslug')
                ->orderBy('id', 'desc')
                ->limit(24)
        		->get();
        return $new_offers;
    }
}
