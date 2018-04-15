<?php

use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::tabele('stores')->delete();
        for ($i=0; $i < 20; $i++){
            $initials = chr(ord('A')+$i);
            \App\Store::create([
                'initials'     => $initials,
                'name'         => $initials.'Name'.$i,
                'description'  => $initials.'Description'.$i,
                'link'         => 'https://www.google.com/',
                'titleslug'    => strtolower($initials.'Name'.$i),
            ]);
        }
    }
}
