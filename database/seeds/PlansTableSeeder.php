<?php

use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{

    private $plans = ['Bronze'=>45,'Silver'=>65,'Gold'=>85,'Platinum'=>200];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        (new \App\Plan())->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        foreach ($this->plans as $packageName => $price) {
            DB::table('plans')->insert([

                'package_name' => $packageName,
                'price' => $price,

            ]);
        }


    }
}
