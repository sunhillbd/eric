<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    private $categories = ['Press','Leading Role','Major Significance','Critical Role','High Compensation','Major Commercial Success'];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        foreach ($this->categories as $category) {
            DB::table('categories')->insert([

                'category_name' => $category,

            ]);
        }


    }
}
