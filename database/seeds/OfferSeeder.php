<?php

use Illuminate\Database\Seeder;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('offers')->delete();

        for ($i=0; $i < 20; $i++){
            \App\Offer::create([
                'store_id'    => rand(1,20),
                'type'        => chr(ord('C')+rand(0,1)),
                'name'        => 'Offer Name '.$i,
                'description' => 'Offer Description '.$i,
                'link'        => 'https://www.google.com/',
                'code'        => 'Code'.$i,
                'status'      => 1,
                'confirm_at'  => date("Y-m-d h:i:s"),
                'end'         => date("Y-m-d h:i:s"),
            ]);
        }
    }
}
