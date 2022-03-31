<?php

namespace Database\Seeders;
use App\Models\State;
use Illuminate\Database\Seeder;

class Stateseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        State::create([
            'id' => 3 ,
            'name' => 'madhya pradesh',
        ]);
        State::create([
            'id' => 4 ,
            'name' => 'rajasthan',
        ]);
    }
}
