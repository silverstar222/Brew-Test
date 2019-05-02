<?php

use Illuminate\Database\Seeder;
use App\Tank;

class TanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tank1 = new Tank();
        $tank1->name = 'Tank1';
        $tank1->save();

        $tank2 = new Tank();
        $tank2->name = 'Tank2';
        $tank2->save();

        $tank3 = new Tank();
        $tank3->name = 'Tank3';
        $tank3->save();

        $tank4 = new Tank();
        $tank4->name = 'Tank4';
        $tank4->save();

        $tank5 = new Tank();
        $tank5->name = 'Tank5';
        $tank5->save();
    }
}
