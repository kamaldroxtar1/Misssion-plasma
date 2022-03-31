<?php

namespace Database\Seeders;
use App\Models\City;
use Illuminate\Database\Seeder;

class Cityseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::create([
            'id' => 2 ,
            'name' => 'patna',
            'state_id'=> 1,
        ]);
        City::create([
            'id' => 3 ,
            'name' => 'ara',
            'state_id'=> 1,
        ]);
        City::create([
            'id' => 4 ,
            'name' => 'gya',
            'state_id'=> 1,
        ]);
        City::create([
            'id' => 5 ,
            'name' => 'banaras',
            'state_id'=> 2,
        ]);
        City::create([
            'id' => 6 ,
            'name' => 'gorakhpur',
            'state_id'=> 2,
        ]);
        City::create([
            'id' => 7 ,
            'name' => 'bhopal',
            'state_id'=> 3,
        ]);
        City::create([
            'id' => 8 ,
            'name' => 'sehore',
            'state_id'=> 3,
        ]);
        City::create([
            'id' => 9 ,
            'name' => 'kota',
            'state_id'=> 4,
        ]);
        City::create([
            'id' => 10 ,
            'name' => 'bundi',
            'state_id'=> 4,
        ]);
    }
}
