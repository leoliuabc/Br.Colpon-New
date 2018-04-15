<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Store extends Model
{
	public function offers()
    {
        return $this->hasMany('App\Offer')->where('status',1);
    }
    public static function initials()
    {
        $initials = DB::table('stores')
                ->select('initials')
        		->distinct()
                ->orderBy('initials', 'asc')
        		->get();
        return $initials;
    }
    public static function top_stores()
    {
        $top_stores = DB::table('stores')
            ->whereIn('id',[41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52])
            ->get();
        return $top_stores;
    }
}
